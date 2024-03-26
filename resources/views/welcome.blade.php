<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RNP</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->

    @include('partials.navbar')

    <style>
        /*! Your existing styles here... */
        body {
            font-family: 'Nunito', sans-serif;
            background-image: url('{{ asset("images/2.jpg") }}');
            background-image: url('{{ asset("images/2.jpg") }}');
            background-size: cover; /* Adjusts the background size */
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh; /* Sets the height of the background */
        }

        .button-container {
            margin-top: 20px;
            text-align: center;
        }
        .button-container button {
            padding: 10px 20px;
            margin: 0 10px;
            border: 10px;
            border-radius: 5px;
            border-block: #018043;
            background-color: #018043;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }


        .video-container {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
        }
    </style>
</head>
<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
        <div class="button-container">
            <a href="{{ route('login') }}"><button>REMPLIR LA DEMANDE D'INSCRIPTION</button></a>
            <a href="{{ route('register') }}"><button>Services aux individus</button></a>
        </div>

        <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/watch?v=zGvdzGXEzu4" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</body>
</html>
