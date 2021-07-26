<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Accuille</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/app.css')}}" width="5" height="6">
</head>

<body class="antialiased">
    <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
        
        <!--LOGO SNP CONSULTING-->
        
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            
        </div>
       
       <!-- LIENS DE NAVIGATION-->
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
                <a href="{{ url('/') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    HOME
                </a>
                <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    SERVICES 
                </a>
                <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                    COLLABORATE WITH US
                </a>
                    <!--
                @if (Route::has('login'))
                    @auth
                <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
                    LIENS CONNECTE
                </a>
                    @endauth
                @endif
                    -->
            </div>
        <!-- LIEN DE CONNECTION ET ENREGISTREMENT-->
            <div class="text-sm lg:flex-grow">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-20 py-4 sm:block">
                <!-- Lien de navigation -->
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </div>
    </nav>



</body>

</html>