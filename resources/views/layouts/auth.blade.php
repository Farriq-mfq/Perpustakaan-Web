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
<body class="hold-transition login-page">
    <div class="login-box">
        @yield('authContent')
    </div>
@livewireScripts
</body>
</html>
