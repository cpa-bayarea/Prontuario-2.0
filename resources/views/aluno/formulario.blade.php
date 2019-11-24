@extends('layouts.app')
@section('content-title', 'Cadastro de Terapeuta')
@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dados Gerais</h5>
                    </div>
                    <div class="ibox-content">

                        <form class="form-horizontal" action="{{ route('terapeuta.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{base64_encode($model->id)}}">

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nome <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{ $model->name }}" maxlength="255" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="alert alert-warning col-sm-12 alert-dismissible" role="alert" id="alert-email">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Atenção!</strong> E-mail em uso.
                                </div>
                                <label for="email" class="col-sm-2 control-label">E-mail <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="email"
                                           value="{{ $model->email }}" maxlength="255" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="alert alert-warning col-sm-12 alert-dismissible" role="alert" id="alert-username">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Atenção!</strong> Número de matrícula em uso.
                                </div>
                                <label for="username" class="col-sm-2 control-label">Matrícula <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inteiro" name="username" id="username"
                                           value="{{ $model->username }}" maxlength="11" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nu_telefone" class="col-sm-2 control-label">Telefone <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inteiro" name="nu_telefone" id="nu_telefone"
                                           value="{{ $model->nu_telefone }}" maxlength="8" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nu_celular" class="col-sm-2 control-label">Celular <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inteiro" name="nu_celular" id="nu_celular"
                                           value="{{ $model->nu_celular }}" maxlength="8" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nu_semestre" class="col-sm-2 control-label">Semestre
                                    <span class="obrigatorio">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inteiro" id="nu_semestre" name="nu_semestre"
                                           value="{{ $model->nu_semestre }}" required maxlength="2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="supervisor_id">Supervisor <span class="obrigatorio">*</span></label>
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
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label" for="password">Senha </label>
                                <div class="col-sm-10">
                                    <input type="password" id="password" class="form-control" placeholder="Senha" name="password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="passwordConfirm">Confirmação de Senha </label>
                                <div class="col-sm-10">
                                    <input type="password" id="passwordConfirm" class="form-control" placeholder="Confirmação de Senha" name="password_confirmation">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">
                                        <span class="glyphicon glyphicon-send"></span>
                                        Salvar
                                    </button>
                                    <a href="{{ route('terapeuta.index') }}" class="btn btn-danger">
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
    <script type="text/javascript">
        $(function () {
            const id = $('#id').val();
            $('#alert-username').hide();
            $('#alert-crp').hide();
            $('#alert-email').hide();

            $('#username').on('change', function () {
                $.get('/users/' + $(this).val() + '/search', function (response) {
                    if (response.type === 'error') {
                        $('#alert-username').show();
                        $('#username').val('');
                    } else {
                        $('#alert-username').hide();
                    }
                });
            });

            $('#email').on('change', function () {
                $.get('/users/' + $(this).val() + '/email', function (response) {
                    if (response.type === 'error') {
                        $('#alert-email').show();
                        $('#email').val('');
                    } else {
                        $('#alert-email').hide();
                    }
                });
            });
        });
    </script>
@endsection
