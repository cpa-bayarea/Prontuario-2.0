<?php

namespace App\Http\Controllers;

use App\User;
use App\UsuarioSistema as UsuSis;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!\Gate::allows('Gestor')){
            abort(403, "Página não autorizada! Você não tem permissão para acessar nessa página!");
        }

        $users = User::orderBy('tx_name', 'asc')->get();

        return view('user.index', compact('users', $users));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \exception
     */
    public function create()
    {
        if(!\Gate::allows('Gestor')){
            abort(403, "Página não autorizada! Você não tem permissão para acessar nessa página!");
        }

/*        try {

            return view('user.form', compact(['perfis', 'lines', 'supervisors'], [$perfis, $lines, $supervisors]));

        } catch (\Exception $e) {
            throw new \exception('Não foi possível atender a sua solicitação! ');
        }*/

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \exception
     */
    public function store(Request $request)
    { 
        if(!\Gate::allows('Gestor')){
            abort(403, "Página não autorizada! Você não tem permissão para acessar nessa página!");
        }

/*        try {


            return view('user.index');

        } catch (\Exception $e) {
            throw new \exception('Não foi possível adicionar o registro do ' . $request->tx_name . ' !');
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!\Gate::allows('Gestor')){
            abort(403, "Página não autorizada! Você não tem permissão para acessar nessa página!");
        }

        $edit = User::where('id', $id)->first();

        return view('user.edit', compact('edit', $edit));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function update($request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \exception
     */
    public function destroy($id)
    {
        if(!\Gate::allows('Gestor')){
            abort(403, "Página não autorizada! Você não tem permissão para acessar nessa página!");
        }

        try {
            $user = User::where('id', $id)->first();
            $user->status = 'I';
            $user->save();

            return redirect()->route('user.index');
        } catch (\Exception $e) {
            throw new \exception('Não foi possível excluir o registro do ' . $user->tx_name . ' !');
        }

    }

    public function getNome($username)
    {
        $user = UsuSis::where('username', $username)->first();
        dd($user);
    }
}
