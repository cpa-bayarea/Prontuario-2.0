@extends('layouts.app')
@section('content-title', 'Status do Cadastro')
@section('content')

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
            <form action="status" method="POST">
                @csrf
                <div class="form-group row"><label class="col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-10"><input name="status" type="text" placeholder="Status" class="form-control" required> 
                    </div>
                </div>
                <div class="col-12 text-right">
                    <section class="progress-demo">
                        <button class="ladda-button btn btn-sm btn-success" type="submit" data-style="expand-left"><span class="ladda-label" id="button_submit">Cadastrar</span><span class="ladda-spinner"></span></button>
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

