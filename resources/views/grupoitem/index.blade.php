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
                    <a href="{{ route('grupoitens.edit', base64_encode($item->id)) }}" title="Editar">
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
