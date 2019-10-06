<?php

namespace App\Http\Controllers;

use App\Models\LinhaTeorica as Linha;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinhaTeoricaController extends Controller {

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
     * @return Response
     * @throws exception
     */
    public function index()
    {
        try {
            $linhas = Linha::orderBy('tx_nome', 'asc')->get();

            return view('linha_teorica.index', compact('linhas', $linhas));
        } catch (Exception $e) {
            throw new exception('Não foi possível visualizar as Linhas Teóricas !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('linha_teorica.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     * @throws exception
     */
    public function store(Request $request)
    {
        try {
            if (!empty($request['id'])) {
                return $this->update($request, $request['id']);
            }
            $linha = new Linha();
            $linha->tx_nome = $request->tx_nome;
            $linha->tx_desc = $request->tx_desc;
            $linha->save();
            return redirect()->route('linha_teorica.index');
        } catch (Exception $e) {
            throw new exception('Não foi possível salvar a Linha Teórica ' . $request->tx_nome . ' !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     * @throws exception
     */
    public function edit($id)
    {
        try {
            $linha = DB::table('tb_linha_teorica')->where('id', '=', $id)->first();
            return view('linha_teorica.edit', compact('linha', $linha));
        } catch (Exception $e) {

            throw new exception('Não foi possível salvar a Linha Teórica de id ->' . $id. ' !');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     * @throws exception
     */
    public function update(Request $request, $id)
    {
        try {
            $linha = Linha::find($id);
            $linha->tx_nome = $request['tx_nome'];
            $linha->tx_desc = $request['tx_desc'];
            $linha->save();
            Session::flash('success', 'Operação realizada com sucesso');
            return redirect()->route('linha_teorica.index');
        } catch (Exception $e) {

            throw new exception('Não foi possível alterar o registro da Linha Teórica ' . $request['tx_nome'] . ' !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws exception
     */
    public function destroy($id)
    {
        try {
            $linha = Linha::where('id', $id)->first();
            $linha->delete();
            Session::flash('success', 'Operação realizada com sucesso');
            return redirect()->route('linha_teorica.index');
        } catch (Exception $e) {
            throw new exception('Não foi possível excluir o registro da Linha Teórica ->' . $id . ' !');
        }
    }
}
