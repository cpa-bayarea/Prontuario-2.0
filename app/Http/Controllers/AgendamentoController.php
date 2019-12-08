<?php

namespace App\Http\Controllers;

use App\Models\{AgendamentoStatus, Agendamento, Aluno, Paciente};
use Illuminate\Support\Facades\{DB, Session};
use Illuminate\Http\Request;
use Exception;

class AgendamentoController extends Controller
{
    /**A
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendamentos = Agendamento::all();
        $terapeutas = Aluno::all();
        $pacientes = Paciente::orderBy('tx_nome', 'asc')->get();
        return view('agendamento.index', compact('agendamentos', 'terapeutas', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if (!empty($request['id'])) {
                if (!empty($request['paciente_id'])) {
                    return $this->update($request, $request['id']);
                } else {
                    return $this->edit($request, $request['id']);
                }
            }
            $aluno = Aluno::find($request->aluno_id);
            $paciente = Paciente::find($request->paciente_id);
            $agendamento = new Agendamento();
            $agendamento->title = $aluno->user->name . " - " . $paciente->tx_nome;
            $agendamento->color = '#f8ac59';
            $agendamento->aluno_id = $request->aluno_id;
            $agendamento->paciente_id = $request->paciente_id;
            $agendamento->status_id = AgendamentoStatus::AGSTATUS_AGENDADO;
            $agendamento->start = $request->date . " " . $request->start;
            $agendamento->end = $request->date . " " . $request->end;
            $checkAgendamento = $this->_checkAgendamento($agendamento->aluno_id, $agendamento->start, $agendamento->end);
            if (count($checkAgendamento) == 0) {
                if ($request->prontuario_id == null) {
                    $prontuario = (new ProntuarioController())->createByAgendamento($request);
                }
                $agendamento->save();
                Session::flash('success', 'Operação realizada com sucesso');
                return redirect()->route('agendamento.index');
            } else {
                Session::flash('error', 'Já existe agendamento para o terapeuta no intervalo de tempo informado!');
                return redirect()->route('agendamento.index');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Não foi possível realizar a agendamento!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        try {
            $agendamento = Agendamento::find($id);
            $agendamento->start = $request->start;
            $agendamento->end = $request->end;
            $agendamento->save();
            $response = response()->json([$agendamento->title, "msg" => "Dados atualizados com sucesso!"]);
            return $response;
        } catch (Exception $e) {
            $response = response()->json([$agendamento->title, "msg" => "Não foi possível alterar o agendamento!"]);
            return $response;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $terapeuta = Aluno::find($request->aluno_id);
            $paciente = Paciente::find($request->paciente_id);
            $agendamento = Agendamento::find($id);
            $agendamento->title = $terapeuta->user->name . " - " . $paciente->tx_nome;
            $agendamento->paciente_id = $request->paciente_id;
            $agendamento->aluno_id = $request->aluno_id;
            $agendamento->start = $request->date . " " . $request->start;
            $agendamento->end = $request->date . " " . $request->end;
            if ($request->prontuario_id == null) {
                $prontuario = (new ProntuarioController())->createByAgendamento($request);
            }
            $agendamento->save();
            Session::flash('success', 'Operação realizada com sucesso');
            return redirect()->route('agendamento.index');
        } catch (Exception $e) {
            throw new exception('Não foi possível alterar o agendamento!');
        }
    }

    public function changeStatus($id, $status_id)
    {
        try {
            $agendamento = Agendamento::find($id);
            $agendamento->status_id = $status_id;
            switch ($status_id) {
                case 2:
                    $agendamento->color = '#1ab394';
                    break;
                case 3:
                    $agendamento->color = '#ed5565';
                    break;
            }
            $agendamento->save();
            Session::flash('success', 'Operação realizada com sucesso');
            return redirect()->route('agendamento.index');
        } catch (Exception $e) {
            throw new exception('Não foi possível alterar o status do agendamento!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $agendamento = Agendamento::where('id', $id)->first();
            $agendamento->delete();
            Session::flash('success', 'Operação realizada com sucesso');
            return redirect()->route('agendamento.index');
        } catch (Exception $e) {
            throw new exception('Não foi possível excluir o agendamento!');
        }
    }

    public function findById($id)
    {
        $agendamento = Agendamento::find($id);
        return ['agendamento' => $agendamento];
    }

    private function _checkAgendamento($aluno_id, $start, $end)
    {
        return DB::table('agendamentos')
            ->where(function ($query) use ($start, $end) {
                $query->where('start', '<', $start)
                    ->where('end', '>', $start)
                    ->orWhere('start', '<', $end)
                    ->where('end', '>', $end)
                    ->orWhereBetween('start', [$start, $end])
                    ->orWhereBetween('end', [$start, $end]);
            })->where(function ($query) use ($aluno_id) {
                $query->where('aluno_id', $aluno_id);
            })->whereBetween('status_id', [1, 2])
            ->get();
    }
}
