<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use Session;
use App\UF;
use Redirect;
use Dompdf\Dompdf;


class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::with('telefones')->get();
        $ufs = UF::all();

        return view('paciente.index', compact('ufs', 'pacientes'));
    }

    public function findById($id)
    {
        $paciente = Paciente::find($id);

        return ['paciente' => $paciente, 'cidade' => $paciente->cidade()->with('uf')->get()];
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $ufs = UF::all();

        return view('paciente.create', compact('ufs', 'pacientes'));
    }

    public function store(Request $request)
    {

        if ($request->paciente_id) {
            $paciente = Paciente::find($request->paciente_id);
        } else {
            $paciente = new Paciente();
        }
        $paciente->id_status = 1;
        $paciente->fill($request->all());
        $paciente->save();

        if ($request->telefone) {

            $array = $request->all();
            $array['paciente_id'] = $paciente->id;

            if ((new TelefoneController)->store($array)) {
                Session::flash('success', 'Operação realizada com sucesso');
            } else {
                Session::flash('danger', 'Erro ao cadstrar o telefone');
            }
        }
        return Redirect::to('/paciente');

    }

    public function delete(Request $request)
    {
        $response = array();
        try{
            if(isset($request->idPaciente)) {
                Paciente::find($request->idPaciente)->delete();
                $response['resultado'] = 'OK';
                return $response;
            }else{
                $response['resultado'] = 'ERRO';
                return $response;
            }

        } catch (\Exception $e) {
            $response['resultado'] = 'ERRO';
            return $response;
}

    }

    public function termoConsentimento()
    {
        $pagina = file_get_contents( resource_path("views/documentosPdf/termoConsentimento.blade.php"));

        $dompdf = new Dompdf();
        $dompdf->loadHtml($pagina);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream();
    }

    public function contratoTerapeutico()
    {
        $pagina = file_get_contents( resource_path("views/documentosPdf/contratoTerapeutico.blade.php"));

        $dompdf = new Dompdf();
        $dompdf->loadHtml($pagina);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream();
    }

}
