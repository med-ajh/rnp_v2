<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Registre National de la Population</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <style>


        .center-button {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .styled-button {
            background-color:transparent;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
            font-weight: bold;
        }

        .styled-button:hover {
            background-color: #1a78d6;
            color: white
        }


        .big-title {
            text-align: center;
            color: #4caf50;
            font-size: 36px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
            font-weight: bold;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu', ['class' => 'bg-nav'])

        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main class="bg-image" style="background-image: url('{{ asset('assets/images/back.jpeg') }}');">
            <div class="center-button">
                <a href="/admin" class="styled-button big-title">Tableau de bord de Registre National de la Population</a>
            </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>
</html>
