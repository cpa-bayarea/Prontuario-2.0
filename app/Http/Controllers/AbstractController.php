<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Util;

class AbstractController extends Controller
{
    protected $_model;
    protected $_modelName;
    protected $_dirView;
    protected $_redirectSave;
    protected $_redirectDelete;

    /**
     * AbstractController constructor.
     */
    public function __construct()
    {
        $classe = substr(get_class($this), strrpos(get_class($this), '\\') + 1);
        if (!$this->_modelName) {
            $this->_modelName = 'App\\Models\\' . str_replace('Controller', '', $classe);
        }

        $entidade = strtolower(str_replace('Controller', '', $classe));

        if (!$this->_dirView) {
            $this->_dirView = $entidade;
        }

        if (!$this->_redirectSave) {
            $this->_redirectSave = $entidade;
        }

        if (!$this->_redirectDelete) {
            $this->_redirectDelete = $entidade;
        }

        if (!is_object($this->_model)) {
            $this->_model = new $this->_modelName();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orderBy = $this->_model->getFillable()[0];
        $aItens = $this->_model->orderBy("{$orderBy}", "asc")->get();

        return view("{$this->_dirView}.index", compact('aItens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $aDados = $this->_recuperarDados();

        $aDados['model'] = $this->_model;
        return view("{$this->_dirView}.formulario", $aDados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if ($id = base64_decode($request->id)) {
            $this->_model = $this->_model->find($id);
        }
        $this->_model->fill($request->toArray());
        $this->_model->save();
        return redirect($this->_redirectSave);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aDados = $this->_recuperarDados();
        $aDados['model'] = $this->_model->find(base64_decode($id));

        return view("{$this->_dirView}.formulario", $aDados);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->_model = $this->_model->find(base64_decode($id));
        $this->_model->delete();
        return redirect($this->_redirectDelete);
    }

    protected function _recuperarDados()
    {
        return [];
    }
}
