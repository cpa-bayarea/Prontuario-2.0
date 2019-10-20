<div id="page-wrapper" class="gray-bg">
  <div class="row border-bottom">
    <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
      </div>
      <ul class="nav navbar-top-links navbar-right">
        <li>
         <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
           {{ csrf_field() }}
         </form>
         <a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i>Logout
         </a>
        </li>
      </ul>
    </nav>
  </div>
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
      <h2>@yield('content-title', 'Title')</h2>
      @section('breadcrumbs')
      <ol class="breadcrumb">
        <li>
          <a href="#">Home</a>
        </li>
        <li class="active">
          <strong>Breadcrumb</strong>
        </li>
      </ol>
      @show
    </div>

  </div>

  <div class="wrapper wrapper-content">
    @yield('content')
  </div>
  @include('inspinia::layouts.main-panel.footer.main')
</div>
