<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.shadow {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.border-b.border-gray-100 {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .flex.justify-between.h-16 {
            background-color: rgb(24, 26, 27);
        }

        .flex {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        #MyClockDisplay {
            color: lavender;
            margin-top: 1.39em;
            font-family: Orbitron;
            letter-spacing: 5px;

        }

        .showuser {
            color: aliceblue;
        }

        .logout {
            color: aliceblue;

        }

    </style>



</head>

<body>

    <div class="divdiv">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}">
                                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                            </a>
                        </div>

                        <!-- Navigation Links -->


                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                <div class="text-gray-300">
                                    {{ __('DASHBOARD') }}
                                </div>
                            </x-nav-link>

                            <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                                <div class="text-gray-300">
                                    {{ __('INDEX') }}
                                </div>
                            </x-nav-link>

                            <x-nav-link :href="route('checklist')" :active="request()->routeIs('checklist')">
                                <div class="text-gray-300">
                                    {{ __('CHECKLIST') }}
                                </div>
                            </x-nav-link>

                            <x-nav-link :href="route('post.mylists')" :active="request()->routeIs('post.mylists')">
                                <div class="text-gray-300">
                                    {{ __('MY POST LISTS') }}
                                </div>
                            </x-nav-link>

                            <x-nav-link :href="route('post.search')" :active="request()->routeIs('post.search')">
                                <div class="text-gray-300">
                                    {{ __('SEARCH') }}
                                </div>
                            </x-nav-link>

                            <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
                            <script>
                                function showTime() {
                                    var date = new Date();
                                    var h = date.getHours(); // 0 - 23
                                    var m = date.getMinutes(); // 0 - 59
                                    var s = date.getSeconds(); // 0 - 59
                                    var session = "AM";

                                    if (h == 0) {
                                        h = 12;
                                    }

                                    if (h > 12) {
                                        h = h - 12;
                                        session = "PM";
                                    }

                                    h = (h < 10) ? "0" + h : h;
                                    m = (m < 10) ? "0" + m : m;
                                    s = (s < 10) ? "0" + s : s;

                                    var time = h + ":" + m + ":" + s + " " + session;
                                    document.getElementById("MyClockDisplay").innerText = time;
                                    document.getElementById("MyClockDisplay").textContent = time;

                                    setTimeout(showTime, 1000);

                                }
                                showTime();
                            </script>


                            {{-- @auth
                        <x-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">
                            {{ __('MY POST LISTS') }}
                        </x-nav-link>
                    @endauth --}}
                        </div>
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    @auth
                                        <div class="showuser">

                                            {{ Auth::user()->name }}

                                        </div>
                                    @endauth

                                    @guest
                                        <div>
                                            <a href="{{ route('login') }}" style="color: aliceblue">LOG IN</a>
                                        </div>
                                    @endguest

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                @if (Auth::user())
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" style="color: white">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>

                                    </form>
                                @endif
                            </x-slot>

                        </x-dropdown>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->

                @auth
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">

                                {{ Auth::user()->name }}

                            </div>
                            <div class="font-medium text-sm text-gray-500">

                                {{ Auth::user()->email }}

                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <!-- Authentication -->
                            @if (Auth::user())
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf


                                    <div style="color: white">
                                        <x-responsive-nav-link :href="route('logout')"
                                            onclick="event.preventDefault();this.closest('form').submit();">

                                            {{ __('Log Out') }}

                                        </x-responsive-nav-link>
                                    </div>
                                </form>
                            @endif
                        </div>

                    </div>
                @endauth
            </div>
        </nav>
    </div>
</body>

</html>
