<?php

namespace App\Http\Controllers;

use App\Models\TbSupervisor;
use exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupervisorController extends Controller
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
     * @throws exception
     */
    public function index()
    {
        try {
            $supervisores = TbSupervisor::orderBy('tx_nome', 'asc')->get();

            // debug para buscar os excluídos
            // $supervisores = Supervisor::withTrashed()->get();
            // dd($supervisores);

            return view('supervisor.index', compact('supervisores', $supervisores));
        } catch (Exception $e) {
            throw new exception('Não foi possível visualizar os Supervisores !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $linhas = DB::table('tb_linha_teorica')->get();
        return view('supervisor.form', compact('linhas', $linhas));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws exception
     */
    public function store(Request $request)
    {
        try {
            if (!empty($request['id'])) {

                return $this->update($request, $request['id']);
            }
            $supervisor = new TbSupervisor();

            $supervisor->tx_nome     = $request->tx_nome;
            $supervisor->username    = $request->username;
            $supervisor->nu_telefone = $request->nu_telefone;
            $supervisor->nu_celular  = $request->nu_celular;
            $supervisor->nu_crp      = $request->nu_crp;
            $supervisor->linha_id    = $request->linha_id;

            if (key_exists($request['status'], array($request))) {
                $supervisor->status = $request->status;
            }
            $supervisor->save();
            return redirect()->route('supervisor.index');
        } catch (Exception $e) {
            dd($e);
            throw new exception('Não foi possível salvar o Supervisor ' . $request->tx_nome . ' !');
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
     * @throws exception
     */
    public function edit($id)
    {
        try {
            $supervisor = DB::table('tb_supervisor')->where('id', '=', $id)->first();
            $linhas = DB::table('tb_linha_teorica')->get();
            return view('supervisor.edit', compact(['supervisor', 'linhas'], $supervisor, $linhas));
        } catch (Exception $e) {

            throw new exception('Não foi possível salvar o Supervisor de id ->' . $id . ' !');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response]
     * @throws exception
     */
    public function update(Request $request, $id)
    {
        try {
            $supervisor = TbSupervisor::find($id);
            $supervisor->tx_nome     = $request->tx_nome;
            $supervisor->username    = $request->username;
            $supervisor->nu_telefone = $request->nu_telefone;
            $supervisor->nu_celular  = $request->nu_celular;
            $supervisor->nu_crp      = $request->nu_crp;
            $supervisor->linha_id    = $request->linha_id;

            if (key_exists($request['status'], array($request))) {
                $supervisor->status = $request->status;
            }

            $supervisor->save();
            Session::flash('success', 'Operação realizada com sucesso');
            return redirect()->route('supervisor.index');
        } catch (Exception $e) {
            throw new exception('Não foi possível alterar o registro do Supervisor ' . $request['tx_nome'] . ' !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws exception
     */
    public function destroy($id)
    {
        try {
            $supervisor = TbSupervisor::where('id', $id)->first();
            $supervisor->delete();
            Session::flash('success', 'Operação realizada com sucesso');
            return redirect()->route('supervisor.index');
        } catch (Exception $e) {
            throw new exception('Não foi possível excluir o registro do Supervisor ->' . $id . ' !');
        }
    }
}
