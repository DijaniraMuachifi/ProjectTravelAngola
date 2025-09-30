<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('arquivo/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />
    <div class="dashboard-container">
        @include('sweetalert::alert')

        <aside class="sidebar">

            <a href="/">
                <div class="logo">
                    <h3>DA
                        <hr>
                    </h3>
                  
                </div>
            </a>
            <nav class="nav-menu">
                <ul>
                    <li><a href="{{ route('dashboard') }}" class="active"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

                    <li class="dropdown">
                        <a href="#"><i class="fas fa-folder-open"></i> <span>Content Management</span> <span class="arrow">&#9660;</span></a>
                        <ul class="submenu">
                            @if(Auth::user() && Auth::user()->isAdmin)
                            <li><a href="{{route('dashboard1')}}"><i class="fas fa-map"></i> Provinces</a></li>
                         
                            <li><a href="#"><i class="fas fa-route"></i> Route</a></li>
                            <li><a href="#"><i class="fas fa-camera-retro"></i> Attractions</a></li>
                            <li><a href="#"><i class="fas fa-hotel"></i> Hotels</a></li>
                           @endif
                        </ul>
                    </li>
               @if(Auth::user() && Auth::user()->isAdmin)
                    <li><a href="{{route('user.index')}}"><i class="fas fa-users"></i> <span>Users</span></a></li>
                    <li><a href="#"><i class="fas fa-chart-line"></i> <span>Reports</span></a></li>
                    <li><a href="{{route('profile.show')}}"><i class="fas fa-cogs"></i> <span>Settings</span></a></li>
                    @endif
                </ul>
            </nav>
        </aside>


        <!-- Page Content <div class="min-h-screen bg-gray-100">
    </div> -->
        <main class="main-content">

            <header class="header">
                <button class="toggle-btn" id="sidebar-toggle">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="header-content">
                    <h2>
                          Welcome, 
                      @if(Auth::user()->isAdmin)    
                            Administrator
                      @elseif(Auth::user()->isCliente)
                            Customer 
                      @endif

                </h2>

                    <div class="user-info">
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <!-- Teams Dropdown    livewire('navigation-menu')    -->
                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="ms-3 relative">
                                <x-dropdown align="right" width="60">
                                    <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ Auth::user()->currentTeam->name }}

                                                <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                </svg>
                                            </button>
                                        </span>
                                    </x-slot>

                                </x-dropdown>
                            </div>
                            @endif

                            <!-- Settings Dropdown -->
                            <div class="ms-3 relative">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        </button>
                                        @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ Auth::user()->name }}

                                                <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                        @endif
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Account') }}
                                        </div>

                                        <x-dropdown-link href="{{ route('profile.show') }}">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-dropdown-link>
                                        @endif

                                        <div class="border-t border-gray-200"></div>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf

                                            <x-dropdown-link href="{{ route('logout') }}"
                                                @click.prevent="$root.submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            @yield('center')


            {{ $slot }}
        </main>


        @stack('modals')

        @livewireScripts


    </div>
    <script src="{{asset('arquivo/script.js')}}"></script>
    <script src="{{asset('arquivo/graficos.js')}}"></script>

</body>

</html>