<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered dataTable">
        <thead>
            <tr>
                <th>Ações</th>
                <th>Nome</th>
                <th>Ordem</th>
                <th>Outro</th>
            </tr>
        </thead>
        <tbody>
        @foreach($aGrupoItem as $item)
            <tr>
                <td class="text-center">
                    <a href="{{ route('grupoitens.edit', base64_encode($item->id)) }}" class="link-editar" title="Editar">
                        <i class="fa fa-pencil"></i>
                    </a>
                    &nbsp;&nbsp;
                    <a href="{{ route('grupoitens.delete', base64_encode($item->id)) }}" class="link-excluir" title="Excluir">
                        <i class="fa fa-close"></i>
                    </a>
                </td>
                <td>{{ $item->tx_nome }}</td>
                <td>{{ $item->nu_ordem }}</td>
                <td>{{ $item->tx_outro }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


<script>
    $('.link-editar').on('click', function (e) {
        e.preventDefault();
        var href = $(this).attr('href');
        $.get(href, function (response) {
            $('#grupo_id').val(response.data.grupo_id);
            $('#grupo_item_id').val(response.data.id);
            $('#tx_nome_item').val(response.data.tx_nome);
            $('#nu_ordem_item').val(response.data.nu_ordem);
            $('#tx_outro_item').val(response.data.tx_outro);
        });
    });

    $('.link-excluir').on('click', function () {
        var href = $(this).attr('href');
        swal({
                title: "Atenção!",
                text: "Deseja realmente excluir o registro ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim, estou certo!",
                ButtonCancelText: "Cancelar",
                closeOnConfirm: true
            },
            function () {
                $.get(href, function (response) {
                    $('#div_listagem_grupo_item').load('/grupoitens/grupo/' + response);
                });
            });
        return false;
    });
</script>
