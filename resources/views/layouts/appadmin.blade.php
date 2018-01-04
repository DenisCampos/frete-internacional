<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- theme -->
    <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/sb-admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <body class="fixed-nav sticky-footer bg-dark" id="page-top">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
              <a class="navbar-brand" href="index.html">Start Bootstrap</a>
              <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="{{ route('home') }}">
                      <i class="fa fa-fw fa-home"></i>
                      <span class="nav-link-text">Home</span>
                    </a>
                  </li>
                  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="{{ route('pacotes.index') }}">
                      <i class="fa fa-fw fa-folder"></i>
                      <span class="nav-link-text">Pacotes</span>
                    </a>
                  </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-fw fa-user-circle-o"></i> {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                      <h6 class="dropdown-header">Opções:</h6>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('edit') }}">
                          <i class="fa fa-fw fa-pencil-square-o"></i>Dados
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('editpassword') }}">
                          <i class="fa fa-fw fa-ellipsis-h"></i>Senha
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
                          <i class="fa fa-fw fa-sign-out"></i>Logout
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>
            <div class="content-wrapper">
              @if(Session::has('message'))
                  <div class="container">
                      <div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          {!! Session::get('message') !!}
                      </div>
                  </div>
              @endif
              <footer class="sticky-footer">
                <div class="container">
                  <div class="text-center">
                    <small>Copyright © Your Website 2017</small>
                  </div>
                </div>
              </footer>
              <!-- Scroll to Top Button-->
              <a class="scroll-to-top rounded" href="#page-top">
                <i class="fa fa-angle-up"></i>
              </a>
              <!-- Logout Modal-->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                           </form>
                           Logout
                        </a>
                    </div>
                  </div>
                </div>
              </div>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{  URL::asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{  URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{  URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{  URL::asset('js/sb-admin.min.js') }}"></script>
</body>
</html>
