<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$title ." - ". config('app.name') }}</title>
  
  @livewireStyles
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <style>
    .turbolinks-progress-bar {
      height: 3px;
      background-color: #343A40;
    }
  </style>
  @stack('styles')
  <script src="{{asset('/plugins/jquery/jquery.min.js')}}" ></script>
  <script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}" ></script>
  <script src="{{asset('/dist/js/adminlte.min.js')}}"></script>
  
  @stack('scripts')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <livewire:components.navbar />
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <livewire:components.sidebar />
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$title}}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content" style="min-height: 100vh !important">
      <div class="container-fluid">
        @yield('content')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <livewire:components.control />
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  {{-- <livewire:components.footer /> --}}
  @livewire('auth.modal-logout')
</div>
<!-- ./wrapper -->
@livewireScripts
<script src="{{asset('/dist/livewire-turbolinks.js')}}" data-turbolinks-eval="false" data-turbo-eval="false"></script>
<script src="{{asset("/js/app.js")}}"></script>
</body>
</html>
