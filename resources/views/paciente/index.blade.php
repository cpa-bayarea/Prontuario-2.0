@extends('layouts.app')
@section('content-title', 'Pacientes')
@section('content')

@if(count($pacientes) >= 1)
<div class="col-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Listagem Pacientes</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome completo</th>
                        <th>Data nascimento</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Cidade - UF</th>
                        <th> Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $paciente)
                    <tr>
                        <td>{{$paciente->id}}</td>
                        <td>{{$paciente->nome}}</td>
                        <td>{{ date('d/m/Y', strtotime($paciente->data_nascimento)) }}</td>
                        <td>
                            <div class="text-center">
                                <button type="button findById" class="btn btn-sm btn-w-m btn-success findById" value="{{$paciente->id}}" type="button" data-toggle="modal" data-target="#modalTelefone">Visualizar Telefone
                                </button>
                            </div>
                        </td>
                        <td>{{$paciente->email}}</td>
                        @if ($paciente->cidade_id)
                        <td>{{$paciente->cidade->title}} - {{$paciente->cidade->uf->letter}}</td>
                        @else
                        <td>--</td>

                        @endif
                        <td class="ibox-content">
                            <form action="paciente/delete/{{$paciente->id}}" method="POST">
                                @csrf
                                <button class="btn btn-warning  dim" type="submit"><i class="fa fa-trash"></i>
                                </button>
                            </form>
                            <button class="btn btn-info  dim findById" value="{{$paciente->id}}" type="button">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('components.modal_telefone')
</div>

@else
<div class="col-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Nenhum paciente cadastrado!</h5>
        </div>
    </div>
</div>
@endif

@endsection


@section('js')
<script>
    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel',
                    title: 'ExampleFile'
                },
                {
                    extend: 'pdf',
                    title: 'ExampleFile'
                },

                {
                    extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });

    });
</script>
@endsection