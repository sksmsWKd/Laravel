<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        body {
            background-color: rgb(30, 32, 34);
        }

        .bg-white.shadow {
            background-color: rgb(24, 26, 27);
        }



        .bg-white.overflow-hidden.shadow-sm.sm:rounded-lg {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .font-semibold.text-xl.text-gray-300.leading-tight {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.shadow {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.shadow {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.overflow-hidden.shadow-sm.sm:rounded-lg {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.overflow-hidden.sm:rounded-lg {
            background-color: rgb(24, 26, 27);
        }

        .p-6.bg-white.border-b.border-gray-200 {
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


        .header {
            background-color: rgb(24, 26, 27);
        }

        header {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.shadow {
            background-color: rgb(24, 26, 27);
        }



        .bg-white.overflow-hidden.shadow-sm.sm:rounded-lg {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .list-group-item {
            background-color: rgb(24, 26, 27);
            border-color: darkslategray;
        }

        .head2 {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.shadow {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.overflow-hidden.shadow-sm.sm:rounded-lg {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.overflow-hidden.sm:rounded-lg {
            background-color: rgb(24, 26, 27);
        }

        .p-6.bg-white.border-b.border-gray-200 {
            background-color: rgb(24, 26, 27);
        }

        header {
            background-color: rgb(24, 26, 27);
        }

        .font-semibold.text-xl.text-gray-300.leading-tight {
            background-color: rgb(24, 26, 27);
        }

        .font-semibold.text-xl.text-gray-300.leading-tight {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        body {
            background-color: rgb(30, 32, 34);
        }

        .bg-white.shadow {
            background-color: rgb(24, 26, 27);
        }



        .bg-white.overflow-hidden.shadow-sm.sm:rounded-lg {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .font-semibold.text-xl.text-gray-300.leading-tight {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white.shadow {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .max-w-7xl.mx-auto.py-6.px-4.sm:px-6.lg:px-8 {
            background-color: rgb(24, 26, 27);
        }

        .bg-white {
            background-color: rgb(24, 26, 27);
        }

    </style>


</head>



<body class="font-sans antialiased">
    <div class="min-h-screen bg-while ">

        @include('layouts.navigation')

        <!-- Page Heading -->

        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                {{ $header }}

            </div>
        </header>


        <!-- Page Content -->
        <main>
            {{ $slot }}

        </main>
    </div>
</body>

</html>
