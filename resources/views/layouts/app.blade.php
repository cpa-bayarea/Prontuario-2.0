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
      <a href="{{ route('triagem') }}"><i class="fa fa-check-square-o"></i> <span class="nav-label">Triagem</span></a>
    </li>
  </ul>
@endsection
