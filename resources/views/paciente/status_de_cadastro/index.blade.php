@extends('layouts.app')
@section('content-title', 'Status do Cadastro')
@section('content')

<div class="row">
    <div class="col-lg-4">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Status</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Status</th>
                    <th>ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($aStatus as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a class="btn btn-info" href="/status/edit/{{ $item->id }}"> <i class="fa fa-pencil-square"></i> </a>
                            <form action="status/delete/{{$item->id}}" method="POST">
                                @csrf
                                <button class="btn btn-danger  dim" type="submit"> <i class="fa fa-trash"></i></button>
                            </form>
                        </td>        
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-lg-5">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Cadastrar novo status</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <form action="/status" method="POST">
                @csrf
                <div class="form-group row"><label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-10">
                    @if ($status->id !='') 
                        <input type="hidden" value="{{ $status->id }}" name="id">
                        <input value=" {{ $status->status }}" name="status" type="text" placeholder="Status" class="form-control" required> 
                    @else
                        <input name="status" type="text" placeholder="Status" class="form-control" required> 
                    @endif
                    </div>
                </div>
                <div class="col-12 text-right">
                    <section class="progress-demo">
                        @if($status->id != '')
                            <button class="ladda-button btn btn-sm btn-success" type="submit" data-style="expand-left"><span class="ladda-label" id="button_submit">Atualizar</span><span class="ladda-spinner"></span></button>
                            @else
                            <button class="ladda-button btn btn-sm btn-success" type="submit" data-style="expand-left"><span class="ladda-label" id="button_submit">Cadastrar</span><span class="ladda-spinner"></span></button>
                        @endif
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

