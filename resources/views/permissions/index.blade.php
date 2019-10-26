@extends('layouts.app')
@section('content-title', 'Permissões')
@section('content')




<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Papéis</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content no-padding">
                    <ul class="list-group">

                        @foreach($roles as $role)

                        <li class="list-group-item">
                            <span class="badge badge-warning" style="color: #f8ac59;">STATUS</span>
                            {{$role->nome}}
                        </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Permissões</h5>
                    <div class="ibox-tools">


                        <button class="btn btn-info" id="updatePermission" type="submit">Atualizar Permissões</button>

                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                    </div>
                </div>
                <div class="ibox-content" style="">

                </div>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="modalAgendamento" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-calendar modal-icon"></i>
                    <h4 class="modal-title" id="acao"></h4>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('#updatePermission').click(() => {



        $.ajax({
            type: 'POST',
            url: '/updatePermission',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function(data) {

                $('#updatePermission').text('Atualizado');
                $('#updatePermission').prop('disabled',true);
                
            },
            error: function(error) {
                console.log(error);
            }
        })
    });
</script>


@endsection