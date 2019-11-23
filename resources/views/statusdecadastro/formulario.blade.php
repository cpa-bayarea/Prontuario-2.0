@extends('layouts.app')
@section('content-title', 'Status de Cadastro')
@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Status de Cadastro</h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal" action="{{ route('statusdecadastro.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{base64_encode($model->id)}}">

                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Nome do Status <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="status" id="status"
                                           value="{{ $model->status }}" maxlength="255" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit"><span class="fa fa-check"></span> Salvar</button>
                                    <a href="{{ route('statusdecadastro.index') }}" class="btn btn-warning">
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
