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
    <title>{{$title ." - ". config('app.name') }}</title>
    {{-- <script src="{{'/plugins/sweetalert2/sweetalert2.min.js'}}"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</head>
<body class="font-sans bg-gray-100">
    {{-- sidebar bar --}}
        <nav class="bg-white w-full h-16 shadow">
            <div class="max-w-5xl mx-auto flex justify-between items-center h-full">
                <div class="justify-start lg:p-0 pl-4 flex items-center space-x-2">
                    @if(auth()->guard('anggota')->user()->profile_picture)
                    <img class="h-10 w-10 rounded-full" src="{{asset('/storage/profile/'.auth()->guard('anggota')->user()->profile_picture)}}" alt="Profile">
                    @endif
                    <span class="font-semibold text-gray-500 text-lg">{{auth()->guard('anggota')->user()->nama}}</span>
                </div>
                <ul class="flex lg:space-x-6 items-center z-50 fixed lg:static bottom-0 w-full lg:w-fit bg-white h-16 lg:justify-end justify-between px-8 lg:p-0 md:px-32 shadow lg:shadow-none">
                    <li>
                        <a href="{{route('client.index')}}" class="text-gray-500 lg:inline-block block text-center @if(request()->routeIs('client.index'))text-emerald-500 font-semibold @endif">
                            
                            <i class="fas fa-home"></i>
                            <span class="lg:ml-1 lg:inline block lg:text-lg text-base">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('client.search')}}" class="text-gray-500 lg:inline-block block text-center @if(request()->routeIs('client.search'))text-emerald-500 font-semibold @endif">
                            <i class="fas fa-search"></i>
                            <span class="lg:ml-1 lg:inline block lg:text-lg text-base">Cari</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('client.account')}}" class="text-gray-500 lg:inline-block block text-center @if(request()->routeIs('client.account'))text-emerald-500 font-semibold @endif">
                            <i class="fas fa-user"></i>
                            <span class="lg:ml-1 lg:inline block lg:text-lg text-base">Akun</span>
                        </a>
                    </li>
                    <li>
                        <livewire:client.logout />
                    </li>
                </ul>
            </div>
        </nav>
    {{-- end sidebar bar --}}
    {{-- content --}}
        <div class="max-w-5xl mx-auto lg:pb-0 pb-16 pt-4 px-3 lg:px-0 min-h-screen">
           @yield('clientContent')
        </div>
    {{-- end content --}}
    
    @livewireScripts
    <script src="{{asset('/dist/livewire-turbolinks.js')}}" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    <script src="{{asset("/js/app.js")}}"></script>
</body>
</html>