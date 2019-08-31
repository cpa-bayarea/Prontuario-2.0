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
            <a href="{{ route('home') }}"><i class="fa fa-home"></i>
                <span class="nav-label">Home</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('paciente') }}"><i class="fa fa-users"></i>
                <span class="nav-label">Pacientes</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('linha_teorica.index') }}"><i class="fa fa-users"></i>
                <span class="nav-label">Linha Teórica</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('supervisor.index') }}"><i class="fa fa-users"></i>
                <span class="nav-label">Supervisor</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('aluno.index') }}"><i class="fa fa-users"></i>
                <span class="nav-label">Aluno</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('agendamento.index') }}"><i class="fa fa-calendar"></i>
                <span class="nav-label">Agendamentos</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('prontuario.index') }}"><i class="fa fa-calendar"></i>
                <span class="nav-label">Prontuário</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('prontuariostatus.index') }}"><i class="fa fa-calendar"></i>
                <span class="nav-label">Status do Prontuário</span>
            </a>
        </li>
    </ul>
@endsection
