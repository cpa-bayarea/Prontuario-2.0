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
            <a href="#" aria-expanded="false"><i class="fa fa-edit"></i>
                <span class="nav-label">Triagem</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                <li><a href="{{ route('triagem') }}">Nova Triagem</a></li>
                <li><a href="{{ route('status') }}">Status de cadastros</a></li>
            </ul>
        </li>
        <li>
            <a href="#" aria-expanded="false"><i class="fa fa-users"></i>
                <span class="nav-label">Paciente</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="nav nav-second-level collapse" aria-expanded="false">
                <li><a href="{{ route('paciente') }}">Listagem</a></li>
                <li><a href="{{ route('paciente.create') }}">Cadastrar</a></li>
            </ul>
        </li>
        <li class="">
            <a href="{{ route('grupos') }}"><i class="fa fa-home"></i>
                <span class="nav-label">Grupos</span>
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
    </ul>

@endsection
