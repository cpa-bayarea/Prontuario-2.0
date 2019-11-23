@extends('layouts.app')
@section('content-title', 'Grupos')
@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Grupo</h5>
                    </div>
                    <div class="ibox-content">

                        <form class="form-horizontal" action="{{ route('grupo.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ base64_encode($model->id) }}">

                            <div class="form-group">
                                <label for="tx_nome" class="col-sm-2 control-label">Nome <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tx_nome" id="tx_nome"
                                           value="{{ $model->tx_nome }}" maxlength="255" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit"><span class="fa fa-check"></span> Salvar</button>
                                    <a href="{{ route('grupo.index') }}" class="btn btn-warning">
                                        <span class="fa fa-arrow-left"></span> Voltar
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @include('grupoitem.formulario')
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            const id = $('#id').val();
            if (id !== '' || id !== null ) {
                $('#div_listagem_grupo_item').load('/grupoitens/grupo/' + id);
            }

            function limpaCamposFormulario() {
                $('#grupo_item_id').val('');
                $('#tx_nome_item').val('');
                $('#nu_ordem_item').val('');
                $('#tx_outro_item').val('');
            }

            $('#btn-salvar-grupo-item').click(function (e) {
                e.preventDefault();
                var ordem = $('#nu_ordem_item').val();
                var nome = $('#tx_nome_item').val();

                if ( (ordem !== null && ordem !== '') && (nome !== null && nome !== '') ) {
                    $.ajax({
                        url: "{{ route('grupoitens.store') }}",
                        type: "POST",
                        datatype: 'json',
                        data: {
                            id: $('#grupo_item_id').val(),
                            grupo_id: $('#grupo_id').val(),
                            tx_nome: $('#tx_nome_item').val(),
                            nu_ordem: $('#nu_ordem_item').val(),
                            tx_outro: $('#tx_outro_item').val(),
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            limpaCamposFormulario();
                            $('#div_listagem_grupo_item').load('/grupoitens/grupo/' + id);
                        }
                    });
                }
            });
        });
    </script>
@endsection
