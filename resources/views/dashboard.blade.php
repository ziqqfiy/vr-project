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
                    <a class="font-montserrat px-3 xl:px-4 py-2 text-gray-100 rounded-full bg-purple-500 shadow-purple-500/30 shadow-xl cursor-default select-none hover:text-gray-100">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('profile') }}" class="font-montserrat px-3 xl:px-4 py-2 text-gray-600 rounded-full hover:bg-purple-200 hover:text-purple-500">Profile</a>
                </li>
            </ul>
            <ul class="flex items-center gap-6">
                <li>
                    <p class="font-montserrat text-sm text-gray-800 font-semibold tracking-wider cursor-default">
                        {{ $data->username }}
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
                    Good day, <span class="font-bold text-purple-500">{{ $data->username }}</span> 👋
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-6 xl:grid-cols-6 px-4 xl:p-0 gap-y-4 md:gap-6">
                <div class="shadow-purple-500/50 shadow-2xl rounded-3xl md:col-span-2 xl:col-span-2 bg-gradient-to-r from-purple-500 to-purple-700 p-6">
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
                            <a href="{{ route('gameplay') }}" class="font-montserrat bg-purple-600 px-5 py-3 w-full text-center md:w-auto rounded-full text-gray-50 text-xs tracking-wider font-semibold hover:bg-purple-800 hover:text-white">
                                Play!
                            </a>
                        </div>
                    </div>
                </div>

                <div class="shadow-yellow-500/50 shadow-2xl rounded-3xl md:col-span-2 xl:col-span-2 p-6 bg-gradient-to-r from-yellow-400 to-yellow-500 flex flex-col justify-between">
                    <div class="flex flex-col">
                        <p class="font-montserrat text-white font-bold text-2xl xl:mb-5 text-center">
                            Total calories burned
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 xl:p-0 gap-y-4 md:gap-6">
                            <div class="md:col-span-3 xl:col-span-3">
                                <p class="text-center text-9xl md:text-8xl text-gray-50 font-black align-middle">
                                    {{$score->calories}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="shadow-blue-500/50 shadow-2xl rounded-3xl md:col-span-2 xl:col-span-2 p-6 bg-gradient-to-r from-blue-500 to-blue-700 flex flex-col justify-between">
                    <div class="flex flex-col">
                        <p class="font-montserrat text-white font-bold text-2xl xl:mb-5 text-center">
                            Your highest score
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 xl:p-0 gap-y-4 md:gap-6">
                            <div class="md:col-span-3 xl:col-span-3">
                                <p class="text-center text-9xl md:text-8xl text-gray-50 font-black align-middle">
                                    {{$score->time}}
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
                    Your daily goals. 🎯
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-6 xl:grid-cols-9 px-4 xl:p-0 gap-y-4 md:gap-6">
                <div class="shadow-2xl shadow-purple-500/20 rounded-3xl md:col-span-2 xl:col-span-3 bg-white">
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
                            <a href="{{ route('gameplay') }}" class="font-montserrat bg-purple-500 px-5 py-3 w-full text-center md:w-auto rounded-full text-gray-50 text-xs tracking-wider font-semibold hover:bg-purple-800 hover:text-white">
                                Play!
                            </a>
                        </div>
                    </div>
                </div>

                <div class="shadow-2xl shadow-purple-500/20 rounded-3xl md:col-span-2 xl:col-span-3 bg-white flex flex-col justify-between">
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
                            <a href="{{ route('gameplay') }}" class="font-montserrat bg-purple-500 px-5 py-3 w-full text-center md:w-auto rounded-full text-gray-50 text-xs tracking-wider font-semibold hover:bg-purple-800 hover:text-white">
                                Play!
                            </a>
                        </div>
                    </div>
                </div>

                <div class="shadow-2xl shadow-purple-500/20 rounded-3xl md:col-span-2 xl:col-span-3 bg-white">
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
                            <a href="{{ route('gameplay') }}" class="font-montserrat bg-purple-500 px-5 py-3 w-full text-center md:w-auto rounded-full text-gray-50 text-xs tracking-wider font-semibold hover:bg-purple-800 hover:text-white">
                                Play!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Second Row -->

            <!-- Start Third Row -->
            <div class="px-4 col-span-1 md:col-span-2 lg:col-span-4 flex justify-between">
                <h2 class="font-montserrat font-semibold text-4xl text-purple-300 leading-snug cursor-default select-none">
                    Your own personalized goals. 💪
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-6 xl:grid-cols-9 px-4 xl:p-0 gap-y-4 md:gap-6">
                <div class="shadow-2xl shadow-pink-500/50 rounded-3xl md:col-span-2 xl:col-span-2 bg-gradient-to-r from-pink-400 to-pink-500 p-6">
                    <form action="{{ route('add-goal') }}" method="POST">
                        @csrf

                        <input class="special" type="hidden" name="id" value="{{$data->id}}">

                        <h2 class="font-montserrat text-4xl text-white font-black leading-tight mb-4">Add Goal</h2>

                        <div class="mb-3">
                            <input type="text" name="description" class="appearance-none font-montserrat rounded-full relative block w-full px-3 py-2 border-2 border-pink-300 placeholder-gray-300 text-gray-900 focus:outline-none focus:ring-pink-700 focus:border-pink-700 focus:z-10 sm:text-sm @error('description') is-invalid @enderror mb-20" placeholder="Exercise for 10 mins.">
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="font-montserrat bg-pink-500 px-5 py-3 w-full text-center md:w-auto rounded-full text-gray-50 text-xs tracking-wider font-semibold hover:bg-pink-800 hover:text-white">Add Goal</button>
                    </form>
                </div>

                @foreach($goal as $goal)
                <div class="shadow-2xl shadow-purple-500/20 rounded-3xl md:col-span-2 xl:col-span-2 bg-white">
                    <div class="flex flex-col space-y-6 md:h-full md:justify-between">
                        <div class="flex gap-2 md:gap-4 justify-between items-center">
                            <div class="flex flex-col space-y-4 p-4">
                                <h2 class="font-montserrat text-4xl text-gray-500 font-black leading-tight">
                                    Goal 
                                </h2>
                                <div class="flex flex-col space-y-2">
                                    <h2 class="font-montserrat text-1xl text-gray-500 font-normal leading-tight">
                                        {{ $goal->description }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2 md:gap-2 p-6">
                            <a href="{{ route('gameplay') }}" class="font-montserrat bg-pink-500 px-5 py-3 w-full text-center md:w-auto rounded-full text-gray-50 text-xs tracking-wider font-semibold hover:bg-purple-800 hover:text-white">
                                Done
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <!-- End Third Row -->

            <!-- Forth Row -->
            <div class="px-4 col-span-1 md:col-span-2 lg:col-span-4 flex justify-between">
                <h2 class="font-montserrat font-semibold text-4xl text-purple-300 leading-snug cursor-default select-none">
                    Your performance. 📊
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 px-4 xl:p-0 gap-y-4 md:gap-6">
                <div class="shadow-red-500/50 shadow-2xl rounded-3xl md:col-span-1 xl:col-span-2 p-6 bg-gradient-to-r from-red-400 to-red-500 flex flex-col justify-between">
                    <div class="flex flex-col">
                        <p class="font-montserrat text-white font-bold text-2xl mb-3 xl:mb-4 text-center">
                            Total time active
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 xl:p-0 gap-y-4 md:gap-6">
                            <div class="md:col-span-3 xl:col-span-3">
                                <p class="text-center text-9xl md:text-5xl text-gray-50 font-black align-middle">
                                    1h 30min
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="shadow-green-500/50 shadow-2xl rounded-3xl md:col-span-1 xl:col-span-2 p-6 bg-gradient-to-r from-green-400 to-green-500 flex flex-col justify-between">
                    <div class="flex flex-col">
                        <p class="font-montserrat text-white font-bold text-2xl mb-3 xl:mb-4 text-center">
                            Calories burned last game
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 xl:p-0 gap-y-4 md:gap-6">
                            <div class="md:col-span-3 xl:col-span-3">
                                <p class="text-center text-9xl md:text-5xl text-gray-50 font-black align-middle">
                                    1000
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 px-4 xl:p-0 gap-y-4 md:gap-6">
                <div class="shadow-2xl shadow-purple-500/20 rounded-3xl md:col-span-1 xl:col-span-1 bg-white p-6">
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
            <!-- End Fourth Row -->

            <!-- Fifth Row -->
            <div class="px-4 col-span-1 md:col-span-2 lg:col-span-4 flex justify-between">
                <h2 class="font-montserrat font-semibold text-4xl text-purple-300 leading-snug cursor-default select-none">
                    Leaderboard. 🏁
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 px-4 xl:p-0 gap-y-4 md:gap-6">
                <div class="shadow-2xl shadow-purple-500/20 rounded-3xl md:col-span-1 xl:col-span-1 bg-white p-6">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="font-montserrat text-purple-500 text-normal">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Player</th>
                                    <th scope="col">Highscore</th>
                                    <th scope="col">Calories Burned</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="font-montserrat">
                                    <th scope="row">1</th>
                                    <td>Chemong</td>
                                    <td>4500</td>
                                    <td>4600</td>
                                </tr>

                                <tr class="font-montserrat">
                                    <th scope="row">2</th>
                                    <td>Penyapubasah</td>
                                    <td>4245</td>
                                    <td>3000</td>
                                </tr>

                                <tr class="font-montserrat">
                                    <th scope="row">3</th>
                                    <td>Lancelot</td>
                                    <td>4000</td>
                                    <td>3000</td>
                                </tr>

                                <tr class="font-montserrat">
                                    <th scope="row">4</th>
                                    <td>notArthur</td>
                                    <td>3850</td>
                                    <td>3000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Fifth Row -->
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