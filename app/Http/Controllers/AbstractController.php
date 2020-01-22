<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Util;
use Illuminate\Support\Facades\Log;

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
     * Retorna a view com o array de itens ordenado pelo primeiro item do $fillable.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        try {
            $orderBy = $this->_model->getFillable()[0];
            $aItens = $this->_model->orderBy("{$orderBy}", "asc")->get();

            return view("{$this->_dirView}.index", compact('aItens'));
        } catch (\Exception $e) {
            Log::info($e);
            return back()->with('error', 'Não foi possível realizar a operação!');
        }
    }

    /**
     * Exibe o fomulário para criação de um novo registro.
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
     * Método para salvar/alterar um registro.
     *
     * @param Request $request Dados vindo do formulário.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            if ($id = base64_decode($request->id)) {
                $this->_model = $this->_model->find($id);
            }
            $this->_model->fill($request->toArray());
            $this->_model->save();
            return redirect()->route("{$this->_redirectSave}.index")->with('success', 'Operação realizada com sucesso!');
        } catch (\Exception $e) {
            Log::info($e);
            return back()->with('error', 'Não foi possível realizar a operação!');
        }
    }

    /**
     * Exibe o formulário com dados específicos para edição.
     *
     * @param int $id Id do registro.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aDados = $this->_recuperarDados();
        $aDados['model'] = $this->_model->find(base64_decode($id));

        return view("{$this->_dirView}.formulario", $aDados);
    }

    /**
     * Remove um dado específico através do id.
     *
     * @param int $id Id do registro que será excluído.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->_model = $this->_model->find(base64_decode($id));
            $this->_model->delete();
            return redirect()->route("{$this->_redirectDelete}.index")->with('success', 'Operação realizada com sucesso!');
        } catch (\Exception $e) {
            Log::info($e);
            return back()->with('error', 'Não foi possível realizar a operação!');
        }
    }

    protected function _recuperarDados()
    {
        return [];
    }
}
