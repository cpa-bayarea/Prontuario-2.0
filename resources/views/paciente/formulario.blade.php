@extends('layouts.app')
@section('content-title', 'Cadastro de Paciente')
@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dados Gerais</h5>
                    </div>
                    <div class="ibox-content">

                        <form class="form-horizontal" action="{{ route('paciente.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ base64_encode($model->id) }}">

                            <div class="form-group">
                                <label for="tx_nome" class="col-sm-2 control-label">Nome <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tx_nome" id="tx_nome"
                                           value="{{ $model->tx_nome }}" maxlength="191" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tx_nome_social" class="col-sm-2 control-label">Nome Social </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tx_nome_social" id="tx_nome_social"
                                           value="{{ $model->tx_nome_social }}" maxlength="191" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tx_nome_responsavel" class="col-sm-2 control-label">Nome Responsável </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tx_nome_responsavel" id="tx_nome_responsavel"
                                           value="{{ $model->tx_nome_responsavel }}" maxlength="191" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dt_nascimento" class="col-sm-2 control-label">Data Nascimento <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control inteiro" name="dt_nascimento" id="dt_nascimento"
                                           value="{{ $model->dt_nascimento }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tx_email" class="col-sm-2 control-label">E-mail <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="tx_email" id="tx_email"
                                           value="{{ $model->tx_email }}" maxlength="255" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="nu_cpf" class="col-sm-4 control-label">CPF <span class="obrigatorio">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nu_cpf" id="nu_cpf"
                                               value="{{ $model->nu_cpf }}" maxlength="255" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="nu_rg" class="col-sm-2 control-label">RG <span class="obrigatorio">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nu_rg" id="nu_rg"
                                               value="{{ $model->nu_rg }}" maxlength="255" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="nu_cep" class="col-sm-4 control-label">CEP <span class="obrigatorio">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control inteiro" name="nu_cep" id="nu_cep"
                                               value="{{ $model->nu_cep }}" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="tx_uf" class="col-sm-2 control-label">UF <span class="obrigatorio">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tx_uf" id="tx_uf"
                                               value="{{ $model->tx_uf }}" maxlength="2" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tx_logradouro" class="col-sm-2 control-label">Logradouro</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tx_logradouro" id="tx_logradouro"
                                           value="{{ $model->tx_logradouro }}" maxlength="200">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tx_complemento" class="col-sm-2 control-label">Complemento</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tx_complemento" id="tx_complemento"
                                           value="{{ $model->tx_complemento }}" maxlength="255">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="tx_bairro" class="col-sm-4 control-label">Bairro</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tx_bairro" id="tx_bairro"
                                               value="{{ $model->tx_bairro }}" maxlength="70">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="tx_localidade" class="col-sm-3 control-label">Localidade</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tx_localidade" id="tx_localidade"
                                               value="{{ $model->tx_localidade }}" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit"><span class="fa fa-check"></span> Salvar</button>
                                    <a href="{{ route('paciente.index') }}" class="btn btn-warning">
                                        <span class="fa fa-arrow-left"></span> Voltar
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            $("#nu_cpf").mask("000.000.000-00");
            $("#nu_rg").mask("0000.000");
            $("#nu_telefone").mask("0000-0000");
            $("#nu_cep").mask("00000-000");

            $('#nu_cep').on('keyup', function () {
                let nu_cep = $(this).val();
                if (nu_cep.length >= 9) {
                    $.get('https://viacep.com.br/ws/' + nu_cep + '/json/', function( data ) {
                        $('#tx_logradouro').val(data.logradouro);
                        $('#tx_bairro').val(data.bairro);
                        $('#tx_uf').val(data.uf);
                        $('#tx_localidade').val(data.localidade);
                    });
                }
            });
        });
    </script>
@endsection
