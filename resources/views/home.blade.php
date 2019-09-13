@extends('layouts.app')

@section('content')
<div class="row">
    <button class="diferente">cancelar CLASS</button>
    <button id="idBotao">cancelar ID</button>
    <button onclick="desgrama()" id="funfa">cancelar ID</button>

    <script>
        function desgrama(){
            Swal.fire('Any fool can use a computer')
        }
    </script>
    <div class="col-md-8 col-md-offset-2">
        <div class="ibox float-e-margins">
            <div class="ibox-title"><h5>Dashboard</h5>
              <div class="ibox-tools"> <span class="label label-warning-light pull-right">Welcome</span></div>
            </div>

            <div class="ibox-content">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
</div>
@endsection
