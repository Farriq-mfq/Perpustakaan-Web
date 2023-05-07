<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @livewireStyles
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
    <style>
        .turbolinks-progress-bar {
          height: 3px;
          background-color: #31C292;
        }
      </style>
    <title>Login Page</title>
</head>
<body class="font-sans bg-gray-100">
    {{-- content --}}
        <div class="max-w-xl mx-auto flex items-center justify-center lg:pb-0 pb-16 pt-4 px-3 lg:px-0 min-h-screen">
           @yield('clientContent')
        </div>
    {{-- end content --}}
    
    @livewireScripts
    <script src="{{asset('/dist/livewire-turbolinks.js')}}" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    <script src="{{asset("/js/app.js")}}"></script>
</body>
</html>