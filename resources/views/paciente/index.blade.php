@extends('layouts.app')
@section('content-title', 'Pacientes')
@section('content')


    


@if(count($pacientes) >= 1)
                <div class="col-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Listagem Pacientes</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>
                        <div class="ibox-content">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome completo</th>
                                    <th>Data nascimento</th>
                                    <th>Telfone</th>
                                    <th>E-mail</th>
                                    <th>Cidade - UF</th>
                                    <th> Ações </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pacientes as $paciente)
                                <tr>

                                    <td>{{$paciente->id}}</td>
                                    <td>{{$paciente->nome}}</td>
                                    <td>{{ date('d/m/Y', strtotime($paciente->data_nascimento)) }}</td>

                                    <td>

                                        <div class="text-center">
                                            <button class="btn btn-info  dim findById" value="{{$paciente->id}}" type="button" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-square"></i></button>
    </div>

                                    </td>
                                    <td>{{$paciente->email}}</td>
                                    <td>{{$paciente->cidade->title}} - {{$paciente->cidade->uf->letter}}</td>
                                    <td class="ibox-content">
                                        <form action="paciente/delete/{{$paciente->id}}" method="POST">
                                            @csrf
                                            <button class="btn btn-warning  dim" type="submit"> <i class="fa fa-trash"></i></button>
                                        </form>

                                            <button class="btn btn-info  dim findById" value="{{$paciente->id}}" type="button"> <i class="fa fa-edit"></i></button>


                                    </td>
                                </tr>

                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" style="display: none; padding-right: 14px;">
                        <div class="modal-dialog">
                            <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <i class="fa fa-laptop modal-icon"></i>
                                    <h4 class="modal-title">Cadastro telefone</h4>
                                    <small class="font-bold">Modal responsável por cadastrar o telefone do usuário  .</small>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Insira o número abaixo</label>
                                        <input type="text" data-mask="(99) 99999 9999" placeholder="" class="form-control">
                                        <button class="btn btn-sm btn-danger mt-2" id="submit_form_telefone">Cadastrar</button>
                                    </div>


                                        <div class="row">
                                            <div class="col-12">
                                                <div class="ibox ">

                                                    <div class="ibox-content">

                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>First Name</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>(61) 9999 9999</td>

                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


@else
    <div class="col-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Nenhum paciente cadastrado!</h5>
            </div>
        </div>
    </div>
@endif

@endsection

