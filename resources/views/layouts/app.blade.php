<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        {{-- <title>{{ @yield('title') ?? config('app.name', 'Laravel') }}</title> --}}
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body
        x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
        x-init="
            darkMode = JSON.parse(localStorage.getItem('darkMode'));
            $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
        :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}"
    >

        <!-- ===== Preloader Start ===== -->
        {{-- @include('partials.preloader') --}}

        <!-- ===== Page Wrapper Start ===== -->
        <div class="flex h-screen overflow-hidden">
            
            <!-- ===== Sidebar Start ===== -->
            @include('partials.sidebar')

            <!-- ===== Content Area Start ===== -->
            <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">

                @include('partials.header')

                <!-- ===== Main Content Start ===== -->
                <main>
                    <div class="mx-auto min-h-screen p-4 md:p-6 2xl:p-10 bg-gradient-to-r from-zinc-400 via-zinc-400/50 to-zinc-300/50 dark:bg-gradient-to-r dark:from-slate-600 dark:via-slate-300 dark:to-slate-600">
                        {{ $slot }}
                    </div>
                </main>

            </div>

        </div>

        @stack('modals')

        @livewireScripts

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Livewire.on('redAlert', event => {
                    showRedToaster(event.message);
                });

                Livewire.on('greenAlert', event => {
                    showGreenToaster(event.message);
                });
                
            });

            function showRedToaster(message) {
                const toaster = document.createElement('div');
                toaster.classList.add('redToaster');
                toaster.textContent = message;
                document.body.appendChild(toaster);

                setTimeout(() => {
                    toaster.remove();
                }, 2000);
            }

            function showGreenToaster(message) {
                const toaster = document.createElement('div');
                toaster.classList.add('greenToaster');
                toaster.textContent = message;
                document.body.appendChild(toaster);

                setTimeout(() => {
                    toaster.remove();
                }, 2000);
            }
        </script>
        <style>
            .redToaster {
                position: fixed;
                bottom: 20px;
                right: 20px;
                background-color: #de2f2f;
                color: #fff;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                opacity: 0.9;
            }

            .greenToaster {
                position: fixed;
                bottom: 20px;
                right: 20px;
                background-color: #15b13f;
                color: #fff;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                opacity: 0.9;
            }
        </style>
    </body>
</html>
