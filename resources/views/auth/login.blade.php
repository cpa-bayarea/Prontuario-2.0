@extends('inspinia::layouts.auth')
@section('content')

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div><h1 class="logo-name">P.E</h1></div>
            <h3>Bem vindo ao Prontuario Eletrônico</h3>

            <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" placeholder="E-Mail" name="email"
                           value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" placeholder="Senha" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Acessar</button>

                <a href="{{ route('password.request') }}">
                    <small>Esqueceu sua senha?</small>
                </a>
            </form>
{{--            <p class="m-t">
                <small>Inspinia we app framework base on Bootstrap 3 &copy; {{ date('Y') }}</small>
            </p>--}}
        </div>
    </div>
@endsection
