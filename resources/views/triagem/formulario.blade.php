@extends('layouts.app')
@section('content-title', 'Triagem')
@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dados Gerais</h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal" action="{{ route('triagem.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ base64_encode($model->id) }}">

                            <div class="form-group">
                                <label for="tx_nome" class="col-sm-2 control-label">Nome <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tx_nome" id="tx_nome"
                                        value="{{ $paciente->tx_nome }}" maxlength="100" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nu_cpf" class="col-sm-2 control-label">CPF <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inteiro" name="nu_cpf" id="nu_cpf"
                                        value="{{ $paciente->nu_cpf }}" maxlength="15" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nu_rg" class="col-sm-2 control-label">RG <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inteiro" name="nu_rg" id="nu_rg"
                                        value="{{ $paciente->nu_rg }}" maxlength="15" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nu_telefone" class="col-sm-2 control-label">Telefone <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inteiro" name="telefone" id="nu_telefone"
                                        value="{{ $paciente->telefone }}" maxlength="15" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dt_nascimento" class="col-sm-2 control-label">Data de Nascimento
                                    <span class="obrigatorio">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control inteiro" name="dt_nascimento" id="dt_nascimento"
                                        value="{{ $paciente->dt_nascimento }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="aluno_id">Terapeuta
                                    <span class="obrigatorio">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <select name="aluno_id" class="form-control" data-show-subtext="true"
                                            id="aluno_id" data-live-search="true" required>
                                        <option selected disabled>Selecione</option>
                                        @foreach($terapeutas as $terapeuta)
                                            <option value="{{$terapeuta->id}}" {{ ($model->aluno_id == $terapeuta->id) ? 'selected' : '' }}>
                                                {{ $terapeuta->user->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="supervisor_id">Supervisor
                                    <span class="obrigatorio">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <select name="supervisor_id" class="form-control" data-show-subtext="true"
                                            id="supervisor_id" data-live-search="true" required>
                                        <option selected disabled>Selecione</option>
                                        @foreach($supervisores as $supervisor)
                                            <option value="{{$supervisor->id}}" {{ ($model->supervisor_id == $supervisor->id) ? 'selected' : '' }}>
                                                {{ $supervisor->user->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">{{ $tipoAtendimentos->tx_nome }}</label>
                                <div class="col-sm-10">
                                    @foreach ($tipoAtendimentos->grupoItem as $item)
                                        <div class="checkbox-inline i-checks">
                                            <label>
                                                <div class="iradio_square-green" style="position: relative;">
                                                    <input required type="radio" value=" {{ $item->id }} " name="atendimento" style="position: absolute; opacity: 0;">
                                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                </div><i></i> {{ $item->tx_nome }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="supervisor" class="col-lg-2 col-sm-2 control-label">{{ $grupos->tx_nome }}</label>
                                <div class="col-sm-10">
                                    @foreach ($grupos->grupoItem as $item)
                                        <div class="checkbox-inline i-checks">
                                            <label>
                                                <div class="iradio_square-green" style="position: relative;">
                                                    <input required type="radio" value=" {{ $item->id }} " name="grupo" style="position: absolute; opacity: 0;">
                                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                                                    </ins>
                                                </div><i></i> {{ $item->tx_nome }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="supervisor" class="col-lg-2 control-label">{{ $temporario->tx_nome }}</label>
                                <div class="col-sm-10">
                                    @foreach ($temporario->grupoItem as $item)

                                        @if ($item->outro != null)
                                            <div class="checkbox-inline i-checks">
                                                <label>
                                                    <div class="iradio_square-green" style="position: relative;">
                                                        <input required type="radio" value=" {{ $item->id }} " name="temporario" style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper btn-toggle"  data-element="#minhaDiv" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div> <i></i> {{ $item->tx_nome }}
                                                </label>
                                            </div>
                                            <div class="checkbox-inline i-checks" id="minhaDiv" style="display: none;">
                                                <textarea rows="5" name="outro" cols="50"></textarea>
                                            </div>
                                        @else
                                            <div class="checkbox-inline i-checks">
                                                <label>
                                                    <div class="iradio_square-green" style="position: relative;">
                                                        <input required type="radio" value=" {{ $item->id }} " name="temporario" style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div> <i></i> {{ $item->tx_nome }}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label for="queixa_principal" class="col-sm-2 control-label">Queixa Principal
                                    <span class="obrigatorio">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <textarea name="queixa_principal" id="queixa_principal" cols="104" rows="5" required>{{ $model->queixa_principal }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">
                                        <span class="glyphicon glyphicon-send"></span>
                                        Salvar
                                    </button>
                                    <a href="{{ route('triagem.index') }}" class="btn btn-danger">
                                        <span class="fa fa-reply"></span>
                                        Voltar
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
    <script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            $("#nu_cpf").mask("000.000.000-00");
            $("#nu_rg").mask("0000.000");
            $("#nu_telefone").mask("0000-0000");

            $(".btn-toggle").click(function(e){
                e.preventDefault();
                el = $(this).data('element');
                $(el).toggle();
            });
        });
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
@endsection
