<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AlunoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \exception
     */
    public function index()
    {
        try {
            $alunos = Aluno::orderBy('tx_nome', 'asc')->get();

            return view('aluno.index', compact('alunos', $alunos));
        } catch (\Exception $e) {
            throw new \exception('Não foi possível visualizar os Alunos !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supervisores = DB::table('tb_supervisor')->get();
        return view('aluno.form', compact('supervisores', $supervisores));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \exception
     */
    public function store(Request $request)
    {
        try {
            if (!empty($request['id'])) {

                return $this->update($request, $request['id']);
            }
            $aluno = new Aluno();

            $aluno->tx_nome     = $request->tx_nome;
            $aluno->username    = $request->username;
            $aluno->nu_telefone = $request->nu_telefone;
            $aluno->nu_celular  = $request->nu_celular;
            $aluno->nu_semestre      = $request->nu_semestre;
            $aluno->supervisor_id    = $request->supervisor_id;

            if (key_exists($request['status'], array($request))) {
                $aluno->status = $request->status;
            }
            $aluno->save();
            return redirect()->route('aluno.index');
        } catch (\Exception $e) {
            dd($e);
            throw new \exception('Não foi possível salvar o Aluno ' . $request->tx_nome . ' !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \exception
     */
    public function edit($id)
    {
        try {
            $aluno = DB::table('tb_aluno')->where('id', '=', $id)->first();
            $supervisores = DB::table('tb_supervisor')->get();
            return view('aluno.edit', compact(['aluno', 'supervisores'], $aluno, $supervisores));
        } catch (\Exception $e) {

            throw new \exception('Não foi possível salvar o Aluno de id ->' . $id . ' !');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response]
     * @throws \exception
     */
    public function update(Request $request, $id)
    {
        try {
            $aluno = Aluno::find($id);
            $aluno->tx_nome     = $request->tx_nome;
            $aluno->username    = $request->username;
            $aluno->nu_telefone = $request->nu_telefone;
            $aluno->nu_celular  = $request->nu_celular;
            $aluno->nu_semestre = $request->nu_semestre;
            $aluno->supervisor_id    = $request->supervisor_id;

            if (key_exists($request['status'], array($request))) {
                $aluno->status = $request->status;
            }

            $aluno->save();
            Session::flash('success', 'Operação realizada com sucesso');
            return redirect()->route('aluno.index');
        } catch (\Exception $e) {
            dd($e);
            throw new \exception('Não foi possível alterar o registro do Aluno ' . $request['tx_nome'] . ' !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \exception
     */
    public function destroy($id)
    {
        try {
            $aluno = Aluno::where('id', $id)->first();
            $aluno->delete();
            Session::flash('success', 'Operação realizada com sucesso');
            return redirect()->route('aluno.index');
        } catch (\Exception $e) {
            throw new \exception('Não foi possível excluir o registro do Aluno ->' . $id . ' !');
        }
    }
}
