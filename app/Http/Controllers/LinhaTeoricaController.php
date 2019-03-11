<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LinhaTeoricaModel as Linha;
use App\User as Perfil;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class LinhaTeoricaController extends Controller
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
     */
    public function index()
    {
        try {

            if(!\Gate::allows('Gestor')){
                abort(403, "Página não autorizada! Você não tem permissão para acessar nessa página!");
            }

            # Ordena caso seja Gestor.
            if(Auth()->user()->id_perfil === Perfil::PFL_GESTOR){
                $linhas = DB::table('tb_linha_teorica')
                    ->where('status', '=', 'A')
                    ->orderBy('tx_nome', 'asc')
                    ->get();
                return view('linha_teorica.index', compact('linhas', $linhas));
            }
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!\Gate::allows('Gestor')){
            abort(403, "Página não autorizada! Você não tem permissão para acessar nessa página!");
        }
        return view('linha_teorica.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \exception
     */
    public function store(Request $request)
    {
        if(!\Gate::allows('Gestor')){
            abort(403, "Página não autorizada! Você não tem permissão para acessar nessa página!");
        }
        try{
            if (!empty($request['id_linha_teorica'])) {
                return $this->update($request, $request['id']);
            }
            $linha = new Linha();
            $linha->tx_nome = $request->tx_nome;
            $linha->tx_desc = $request->tx_desc;
            $linha->status = 'A';
            $linha->save();
            return redirect()->route('linhas.index');
        } catch (\Exception $e ){
            throw new \exception('Não foi possível salvar a Linha Teórica '.$request->nome.' !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!\Gate::allows('Gestor')){
            abort(403, "Página não autorizada! Você não tem permissão para acessar nessa página!");
        }
        $linha = Linha::find($id);
        $checked = ($linha->status == "A") ? 'checked' : '';

        return view('linha_teorica.form', compact(['linha', 'checked'], [$linha, $checked]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @throws \exception
     */
    public function update($request, $id)
    {
        try {
            # Procura pela linha teórica.
            $linha = Linha::find($id);

            $linha->tx_nome = $request['tx_nome'];
            $linha->tx_desc = $request['tx_desc'];
            $linha->save();
            dd($linha);

            return redirect()->route('linhas.index');
        } catch (\Exception $e) {
            echo $e;die;
            throw new \exception('Não foi possível alterar o registro da Linha Teórica ' . $request['tx_nome'] . ' !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @throws \exception
     */
    public function destroy($id)
    {
         if(!\Gate::allows('Gestor')){
             abort(403, "Página não autorizada! Você não tem permissão para acessar nessa página!");
         }
        try{
            $linha = Linha::find($id);
            $linha->status = 'I';
            $linha->save();
            return redirect()->route('linhas.index');
        } catch(\Exception $e){
             echo $e;die;
            throw new \exception('Não foi possível excluir o registro da Linha Teórica ->'.$id.' !');
        }
    }
}
