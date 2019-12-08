@extends('inspinia::layouts.auth')

@section('content')
<div class="passwordBox animated fadeInDown">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox-content">
        <h2 class="font-bold">Esqueceu sua senha?</h2>
        <p>Digite seu endereço de e-mail para enviarmos um e-mail para resetar sua senha.</p>
        <div class="row">
          <div class="col-lg-12">
            <form class="m-t" role="form" method="POST" action="{{ route('password.email') }}">
              {{ csrf_field() }}
              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                       placeholder="Endereço de e-mail" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary block full-width m-b">Enviar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-md-6">
        CPA Bay-Area - IESB
    </div>
    <div class="col-md-6 text-right">
       <small>© {{  DATE('Y') }}</small>
    </div>
  </div>
</div>
@endsection
