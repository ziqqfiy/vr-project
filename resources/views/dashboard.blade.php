@extends('auth.layout')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="relative antialiased bg-purple-50">
    <!-- Start Nav -->
    <nav class="p-4 md:py-8 xl:px-0 md:container md:mx-w-6xl md:mx-auto">
        <div class="hidden lg:flex lg:justify-between lg:items-center">
            <a class="flex items-start gap-2 group cursor-default select-none">
                <p class="font-montserrat font-black text-4xl text-purple-500">
                    moVRin
                </p>
            </a>
            <ul class="flex items-center space-x-4 text-sm font-semibold">
                <li>
                    <a class="px-3 xl:px-4 py-2 text-gray-100 rounded-full bg-purple-500 shadow-purple-500/30 shadow-xl cursor-default select-none hover:text-gray-100">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('profile') }}" class="px-3 xl:px-4 py-2 text-gray-600 rounded-full hover:bg-purple-200 hover:text-purple-500">My Account</a>
                </li>
            </ul>
            <ul class="flex items-center gap-6">
                <li>
                    <p class="text-sm font-sans text-gray-800 font-semibold tracking-wider cursor-default">
                        {{ Auth::user()->name }}
                    </p>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="px-3 xl:px-4 py-2 text-gray-600 rounded-full hover:bg-red-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 stroke-current text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Phone's View -->
        <div x-data="{ open: false }" class="lg:hidden relative flex justify-between w-full">
            <a class="flex items-start gap-2 group">
                <p class="font-montserrat font-black text-4xl text-purple-500">
                    moVRin
                </p>
            </a>
            <ul class="p-4">
                <li class="px-4 py-2 rounded hover:bg-gray-200">
                    <a href="#" class="flex items-center gap-4">
                        My Account
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Nav -->

    <!-- Start Main -->
    <main class="container mx-w-6xl mx-auto py-4">
        <div class="flex flex-col space-y-8">
            <!-- First Row -->
            <div class="px-4 col-span-1 md:col-span-2 lg:col-span-4 flex justify-between">
                <h2 class="font-montserrat font-semibold text-4xl text-purple-300 leading-snug cursor-default select-none">
                    Good day, <span class="font-bold text-purple-500">{{ Auth::user()->name }}</span> 👋
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 xl:grid-cols-6 px-4 xl:p-0 gap-y-4 md:gap-6">
                <div class="shadow-purple-500/50 shadow-2xl rounded-3xl md:col-span-2 xl:col-span-3 bg-gradient-to-r from-purple-500 to-purple-700 p-6">
                    <div class="flex flex-col space-y-6 md:h-full md:justify-between">
                        <div class="flex gap-2 md:gap-4 justify-between items-center">
                            <div class="flex flex-col space-y-4">
                                <h2 class="font-montserrat text-4xl text-white font-black leading-tight">
                                    Let's get</br>moVRin!
                                </h2>
                                <div class="flex flex-col space-y-4">
                                    <h2 class="font-montserrat text-1xl text-white font-normal leading-tight">
                                        Jump right in and have a great workout!
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2 md:gap-4">
                            <a href="{{ route('gameplay') }}" class="bg-purple-600 px-5 py-3 w-full text-center md:w-auto rounded-full text-gray-50 text-xs tracking-wider font-semibold hover:bg-purple-800 hover:text-white">
                                Play!
                            </a>
                        </div>
                    </div>
                </div>

                <div class="shadow-blue-500/50 shadow-2xl rounded-3xl md:col-span-2 xl:col-span-3 p-6 bg-gradient-to-r from-blue-500 to-blue-700 flex flex-col justify-between">
                    <div class="flex flex-col">
                        <p class="font-montserrat text-white font-bold text-2xl mb-2 text-center">
                            Your highest score.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 px-4 xl:p-0 gap-y-4 md:gap-6">
                            <div class="md:col-span-3 xl:col-span-3">
                                <p class="text-center text-9xl md:text-9xl text-gray-50 font-black">
                                    0
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End First Row -->

            <!-- Second Row -->
            <div class="px-4 col-span-1 md:col-span-2 lg:col-span-4 flex justify-between">
                <h2 class="font-montserrat font-semibold text-4xl text-purple-300 leading-snug cursor-default select-none">
                    Your daily goals.
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-6 xl:grid-cols-9 px-4 xl:p-0 gap-y-4 md:gap-6">
                <div class="shadow-gray-500/20 shadow-2xl rounded-3xl md:col-span-2 xl:col-span-3 bg-white">
                    <div class="flex flex-col space-y-6 md:h-full md:justify-between">
                        <div class="flex gap-2 md:gap-4 justify-between items-center">
                            <div class="flex flex-col space-y-4 p-4">
                                <h2 class="font-montserrat text-4xl text-gray-500 font-black leading-tight">
                                    Goal 1
                                </h2>
                                <div class="flex flex-col space-y-2">
                                    <h2 class="font-montserrat text-1xl text-gray-500 font-normal leading-tight">
                                        Beat your own highscore.
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2 md:gap-2 p-6">
                            <a href="{{ route('gameplay') }}" class="bg-purple-500 px-5 py-3 w-full text-center md:w-auto rounded-full text-gray-50 text-xs tracking-wider font-semibold hover:bg-purple-800 hover:text-white">
                                Play!
                            </a>
                        </div>
                    </div>
                </div>

                <div class="shadow-gray-500/20 shadow-2xl rounded-3xl md:col-span-2 xl:col-span-3 bg-white flex flex-col justify-between">
                    <div class="flex flex-col space-y-6 md:h-full md:justify-between">
                        <div class="flex gap-2 md:gap-4 justify-between items-center">
                            <div class="flex flex-col space-y-4 p-4">
                                <h2 class="font-montserrat text-4xl text-gray-500 font-black leading-tight">
                                    Goal 2
                                </h2>
                                <div class="flex flex-col space-y-2">
                                    <h2 class="font-montserrat text-1xl text-gray-500 font-normal leading-tight">
                                        Burned at least 300 Calories.
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2 md:gap-2 p-6">
                            <a href="{{ route('gameplay') }}" class="bg-purple-500 px-5 py-3 w-full text-center md:w-auto rounded-full text-gray-50 text-xs tracking-wider font-semibold hover:bg-purple-800 hover:text-white">
                                Play!
                            </a>
                        </div>
                    </div>
                </div>

                <div class="shadow-gray-500/20 shadow-2xl rounded-3xl md:col-span-2 xl:col-span-3 bg-white">
                    <div class="flex flex-col space-y-6 md:h-full md:justify-between">
                        <div class="flex gap-2 md:gap-4 justify-between items-center">
                            <div class="flex flex-col space-y-4 p-4">
                                <h2 class="font-montserrat text-4xl text-gray-500 font-black leading-tight">
                                    Goal 3
                                </h2>
                                <div class="flex flex-col space-y-2">
                                    <h2 class="font-montserrat text-1xl text-gray-500 font-normal leading-tight">
                                        Get in the game with at least 10 minutes.
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2 md:gap-2 p-6">
                            <a href="{{ route('gameplay') }}" class="bg-purple-500 px-5 py-3 w-full text-center md:w-auto rounded-full text-gray-50 text-xs tracking-wider font-semibold hover:bg-purple-800 hover:text-white">
                                Play!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Second Row -->

            <!-- Third Row -->
            <div class="px-4 col-span-1 md:col-span-2 lg:col-span-4 flex justify-between">
                <h2 class="font-montserrat font-semibold text-4xl text-purple-300 leading-snug cursor-default select-none">
                    Your performance.
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 px-4 xl:p-0 gap-y-4 md:gap-6">
                <div class="shadow-gray-500/20 shadow-2xl rounded-3xl md:col-span-1 xl:col-span-1 bg-white p-6">
                    <div class="flex flex-col space-y-6 md:h-full md:justify-between">
                        <div class="flex gap-2 md:gap-4 justify-between items-center">
                            <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 px-4 xl:p-0 gap-y-4 md:gap-6">
                                <h2 class="font-montserrat text-4xl text-purple-500 font-black leading-tight">
                                    This week's calories burned.
                                </h2>
                                <div class="md:col-span-2 xl:col-span-2">
                                    <canvas id="chartLine"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Third Row -->
        </div>
    </main>
    <!-- End Main -->

    <!-- Chart line -->
    <script>
        const labels = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        const data = {
            labels: labels,
            datasets: [{
                label: "Burned calories",
                backgroundColor: "hsl(269, 97%, 85%)",
                borderColor: "hsl(271, 91%, 65%)",
                borderWidth: 2,
                fill: true,
                tension: 0.3,
                data: [0, 10, 5, 2, 20, 30, 45],
            }, ],
        };

        const configLineChart = {
            type: "line",
            data,
            options: {},
        };

        var chartLine = new Chart(
            document.getElementById("chartLine"),
            configLineChart
        );
    </script>
</body>

</html>
@endsection