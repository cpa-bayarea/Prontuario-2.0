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

                        <form class="form-horizontal" action="{{ route('grupos.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{base64_encode($aGrupos['id'])}}">

                            <div class="form-group">
                                <label for="tx_nome" class="col-sm-2 control-label">Nome <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tx_nome" id="tx_nome"
                                           value="{{ $aGrupos->tx_nome }}" maxlength="255" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit"><span class="fa fa-check"></span> Salvar</button>
                                    <a href="{{ route('grupos.index') }}" class="btn btn-warning">
                                        <span class="fa fa-arrow-left"></span> Voltar
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Grupo Item</h5>
                    </div>
                    <div class="ibox-content">
                        <div id="div_formulario_grupo_item">
                            <form id="formulario"  name="formulario" method="POST" class="form-horizontal">
                                @csrf
                                <input type="hidden" name="req" id="req" value="salvar-grupo-item" />
                                <input name="grupo_item_id" id="grupo_item_id" type="hidden" />
                                <input name="grupo_id" id="grupo_id" type="hidden" value="{{ base64_encode($aGrupos->id) }}"/>

                                <div class="form-group">
                                    <label for="tx_nome_item" class="col-sm-2 control-label">Nome <span class="obrigatorio">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tx_nome" id="tx_nome_item" maxlength="255" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nu_ordem_item" class="col-sm-2 control-label">Ordem <span class="obrigatorio">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control inteiro" name="nu_ordem" id="nu_ordem_item" maxlength="2" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tx_outro_item" class="col-sm-2 control-label">Outro</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="tx_outro" id="tx_outro_item" maxlength="255">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-primary" id="btn-salvar-grupo-item" type="button">
                                            <i class="fa fa-check"></i>&nbsp;Salvar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="div_listagem_grupo_item">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr class="text-center">
                                            <th width="10%">Ações</th>
                                            <th>Nome</th>
                                            <th>Ordem</th>
                                            <th>Outro</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body-grupo-item"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {

            function loadListagemGrupoItem() {
                var grupo_id = $('#grupo_id').val();
                if (grupo_id !== null || grupo_id !== '') {
                    $.ajax({
                        url: "/grupoitens/grupo/" + grupo_id,
                        type: "GET",
                        datatype: 'json',
                        data:{
                            grupo_id: grupo_id
                        },
                        success: function ( data ) {
                            $('#body-grupo-item').empty();
                            $.each(data, function (key, value) {
                                html = '<tr>';
                                html += '<td class="text-center">';
                                html += '<a title="Alterar" class="editar-grupo-item" data-gitem="' + value.id + '">';
                                html += '<i class="fa fa-pencil"></i>';
                                html += '<a title="Excluir" class="excluir-grupo-item" data-gitem="' + value.id + '" style="margin-left: 5px;">';
                                html += '<i class="fa fa-close"></i>';
                                html += '</td>';
                                html += '<td>' + value.tx_nome + '</td>';
                                html += '<td>' + value.nu_ordem + '</td>';
                                html += '<td>' + value.tx_outro + '</td>';
                                html += '</tr>';

                                $('#body-grupo-item').append(html);
                            });
                            $('.editar-grupo-item').click(function () {
                                var data = $(this).data('gitem');
                                alert(data);
                            });

                            $('.excluir-grupo-item').click(function () {
                                var data = $(this).data('gitem');
                                alert(data);
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus);
                        }
                    });
                }
            }
            loadListagemGrupoItem();

            function limpaCamposFormulario() {
                $('#grupo_item_id').val('');
                $('#tx_nome_item').val('');
                $('#nu_ordem_item').val('');
                $('#tx_outro_item').val('');
            }

            $('#btn-salvar-grupo-item').click(function (e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('grupoitens.store') }}",
                    type: "POST",
                    datatype: 'json',
                    data: {
                        grupo_id: $('#grupo_id').val(),
                        tx_nome: $('#tx_nome_item').val(),
                        nu_ordem: $('#nu_ordem_item').val(),
                        tx_outro: $('#tx_outro_item').val(),
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        limpaCamposFormulario();
                        loadListagemGrupoItem();
                    }
                });
            });

            $('.editar-grupo-item').click(function () {
                var data = $(this).data('gitem');
                alert(data);
            });

            $('.excluir-grupo-item').click(function () {
                var data = $(this).data('gitem');
                alert(data);
            });
        });
    </script>
@endsection
