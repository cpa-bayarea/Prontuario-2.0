@extends('layouts.app')
@section('content-title', 'Pacientes')
@section('content')
<div class="col-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Cadastrar Paciente</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="">
                <form action="/paciente" method="POST" id="form_paciente">
                @csrf
                    <div class="form-group row"><label for="nome" class="col-lg-2 col-form-label">Nome</label>

                        <div class="col-lg-10"><input type="text" placeholder="Nome" required name="nome" id="nome" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row"><label for="email" class="col-lg-2 col-form-label">Email</label>

                        <div class="col-lg-10"><input type="email" required placeholder="example@gmail.com" required name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-lg-2 col-form-label" for="nome_social">Nome social</label>
                        <div class="col-lg-10"><input type="text" placeholder="Nome social" name="nome_social" id="nome_social" class="form-control"></div>
                    </div>

                    <div class="form-group row"><label class="col-lg-2 col-form-label" for="nome_responsavel">Nome do responsável</label>
                        <div class="col-lg-10"><input type="text" placeholder="Nome do responsável" name="nome_responsavel" id="nome_responsavel" class="form-control"></div>
                    </div>
                    <div class="form-group row"><label class="col-lg-2 col-form-label" for="data_nascimento">Data nascimento</label>
                        <div class="col-lg-10">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" name="data_nascimento" required id="data_nascimento" class="form-control">

                            </div>
                        </div>
                    </div>

                    <div class="form-group row"><label class="col-lg-2 col-form-label" for="cpf">CPF</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="000.000.000-00" data-mask="999.999.999-99" required name="cpf" id="cpf" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row"><label class="col-lg-2 col-form-label" for="rg">RG</label>
                        <div class="col-lg-10"><input type="text" name="rg" id="rg" class="form-control"></div>
                    </div>

                    <div class="form-group row"><label class="col-lg-2 col-form-label" for="telefone">Telefone</label>
                        <div class="col-lg-10"><input type="text" name="telefone" data-mask="(99) 99999-9999" id="telefone" class="form-control"></div>
                    </div>

                    <div class="form-group row"><label class="col-lg-2 col-form-label" for="endereco">Endereço</label>
                        <div class="col-lg-10"><input type="text" name="endereco" required id="endereco" class="form-control"></div>
                    </div>

                    <div class="form-group row"><label class="col-lg-2 col-form-label" for="uf">UF</label>
                        <div class="col-lg-10">
                            <select class="form-control" data-show-subtext="true" id="uf" data-live-search="true">

                                @foreach($ufs as $uf)
                                    <option value="{{$uf->id}}" data-subtext="{{$uf->title}}">{{$uf->letter}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group row"><label class="col-lg-2 col-form-label" for="cidade">Cidade</label>
                        <div class="col-lg-10">
                            <select class="form-control" data-show-subtext="true" disabled required name="cidade_id" id="cidade" data-live-search="true">

                            </select>
                        </div>
                    </div>

                    <div class="col-12 text-right">
                        <section class="progress-demo">
                            <button class="ladda-button btn btn-sm btn-success" data-style="expand-left"><span class="ladda-label" id="button_submit">Cadastrar</span><span class="ladda-spinner"></span></button>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
