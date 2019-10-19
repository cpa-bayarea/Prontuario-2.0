@extends('inspinia::layouts.main')

@if (auth()->check())
    @section('user-avatar', 'https://www.gravatar.com/avatar/' . md5(auth()->user()->email) . '?d=mm')
@section('user-name', auth()->user()->name)
@endif

@section('breadcrumbs')
    @include('inspinia::layouts.main-panel.breadcrumbs', [
      'breadcrumbs' => [
        (object) [ 'title' => 'Home', 'url' => route('home') ]
      ]
    ])
@endsection

@section('sidebar-menu')
    <ul class="nav metismenu" id="side-menu" style="padding-left:0px;">
        <li class="">
            <a href="{{ route('agendamento.index') }}"><i class="fa fa-calendar"></i>
                <span class="nav-label">Agendamentos</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('triagem') }}"><i class="fa fa-address-card"></i>
                <span class="nav-label">Triagem</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('paciente') }}"><i class="fa fa-user"></i>
                <span class="nav-label">Paciente</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('prontuario.index') }}"><i class="fa fa-address-book"></i>
                <span class="nav-label">Prontuários</span>
            </a>
        </li>
        <li>
            <a href="#" aria-expanded="false"><i class="fa fa-cog"></i>
                <span class="nav-label">Configuração</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="nav nav-second-level collapse" aria-expanded="false">
                <li class="">
                    <a href="{{ route('aluno.index') }}">
                        <span class="nav-label">Terapeuta</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('supervisor.index') }}">
                        <span class="nav-label">Supervisor</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('grupos') }}">
                        <span class="nav-label">Grupos</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('linhateorica.index') }}">
                        <span class="nav-label">Linha Teórica</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('prontuariostatus.index') }}">
                        <span class="nav-label">Status do Prontuário</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('statusdecadastro.index') }}">
                        <span class="nav-label">Status de cadastros</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
@endsection
