@extends('layouts.app')
@section('content-title', 'Status de Prontuário')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Dados Gerais</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="{{ route('prontuariostatus.store')  }}" method="post" class="form-horizontal">
                                @csrf

                                <input type="hidden" name="id" id="id" value="{{base64_encode($model->id)}}">

                                <div class="form-group">
                                    <label for="nome" class="col-sm-3 control-label">Nome <span class="obrigatorio">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nome" id="nome" value="{{$model->nome}}"
                                        maxlength="20" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-primary" type="submit"><span class="fa fa-check"></span> Salvar</button>
                                        <a href="{{ route('prontuariostatus.index') }}" class="btn btn-warning">
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
    </div>

@endsection
