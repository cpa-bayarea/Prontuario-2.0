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
      <a href="{{ route('home') }}"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a>
    </li>
    <li class="">
      <a href="{{ route('paciente') }}"><i class="fa fa-users"></i> <span class="nav-label">Pacientes</span></a>
    </li>
    <li class="">
      <a href="#" aria-expanded="false"><i class="fa fa-edit"></i> <span class="nav-label">Triagem</span><span class="fa arrow"></span></a>
      <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
          <li><a href="{{ route('triagem') }}">Nova Triagem</a></li>
          <li><a href="{{ route('status') }}">Status de cadastros</a></li>
      </ul>
  </li>
  </ul>
@endsection
