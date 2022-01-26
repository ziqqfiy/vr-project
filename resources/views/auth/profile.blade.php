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
                    <a href="dashboard" class="font-montserrat px-3 xl:px-4 py-2 text-gray-600 rounded-full hover:bg-purple-200 hover:text-purple-500">Dashboard</a>
                </li>
                <li>
                    <a class="font-montserrat px-3 xl:px-4 py-2 text-gray-100 rounded-full bg-purple-500 shadow-purple-500/30 shadow-xl cursor-default select-none hover:text-gray-100">Profile</a>
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
                        Profile
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
                    Your profile, <span class="font-bold text-purple-500">{{ $data->username }}</span> 📝
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-5 xl:grid-cols-6 px-4 xl:p-0 gap-y-4 md:gap-6">
                <div class="md:col-span-3 xl:col-span-4">
                    <div class="shadow-2xl shadow-purple-500/20 rounded-3xl p-6 bg-white flex flex-col justify-between">
                        <div class="flex flex-col">
                            <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 px-4 xl:p-0 gap-y-4 md:gap-6">
                                <div class="md:col-span-3 xl:col-span-3">
                                    <h2 class="font-montserrat text-4xl text-purple-500 font-black leading-tight mb-4">
                                        Profile.
                                    </h2>

                                    <img src="/uploads/avatars/{{ $data->avatar }}" style="width: 150px; height: 150px; border-radius: 50%;" class="mb-3 mx-auto">

                                    <form enctype="multipart/form-data" action="{{ route('profile-edit') }}" method="POST">
                                        @csrf

                                        <input class="special" type="hidden" name="id" value="{{$data->id}}">

                                        <div>
                                            <label for="exampleInputEmail1" class="form-label font-montserrat font-semibold text-purple-500 -mb-8">Avatar</label>
                                            <input type="file" name="avatar" class="appearance-none font-montserrat rounded-full relative block w-full px-3 py-2 border-2 border-purple-300 text-gray-900 focus:outline-none sm:text-sm mb-3">
                                        </div>

                                        <div>
                                            <label for="exampleInputEmail1" class="form-label font-montserrat font-semibold text-purple-500 -mb-8">Username</label>
                                            <input id="username" name="username" required class="appearance-none font-montserrat rounded-full relative block w-full px-3 py-2 border-2 border-purple-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-700 focus:border-purple-700 focus:z-10 sm:text-sm @error('name') is-invalid @enderror mb-3" value="{{old('username')}}" placeholder="{{ $data->username }}">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="exampleInputEmail1" class="form-label font-montserrat font-semibold text-purple-500 -mb-8">Email</label>
                                            <input id="email-address" name="email" type="email" autocomplete="email" class="appearance-none font-montserrat rounded-full relative block w-full px-3 py-2 border-2 border-purple-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-700 focus:border-purple-700 focus:z-10 sm:text-sm @error('name') is-invalid @enderror mb-3" value="{{old('email')}}" placeholder="{{ $data->email }}" disabled>
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="font-montserrat group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-purple-500 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                            Update Profile
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-4 flex justify-between my-4">
                        <h2 class="font-montserrat font-semibold text-4xl text-purple-300 leading-snug cursor-default select-none">
                            Your QR Code 📷
                        </h2>
                    </div>

                    <div class="shadow-2xl shadow-purple-500/20 rounded-3xl p-6 bg-white flex flex-col justify-between">
                        <div class="flex flex-col">
                            <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 px-4 xl:p-0 gap-y-4 md:gap-6">
                                <div class="md:col-span-3 xl:col-span-3">
                                    <div class="mb-3 mx-auto">
                                        <span>
                                            {{ $qrcode }}
                                        </span>
                                    </div>

                                    <a href="#" download class="font-montserrat group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-purple-500 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                        Download QR Code
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="shadow-purple-500/50 shadow-2xl rounded-3xl md:col-span-2 xl:col-span-2 bg-purple-500 p-6">
                    <div class="flex flex-col space-y-6 md:h-full md:justify-between">
                        <div class="flex gap-2 md:gap-4 justify-between items-center">
                            <div class="flex flex-col space-y-4">
                                <h2 class="font-montserrat text-4xl text-white font-black leading-tight">
                                    Friends.
                                </h2>

                                <div class="bg-purple-200 shadow-purple-600/100 shadow-2xl rounded-3xl p-6 flex flex-col space-y-4 mb-2">
                                    <div class="grid grid-cols-1 md:grid-cols-4 xl:grid-cols-5 xl:p-0 gap-y-4 md:gap-6">
                                        <img src="/uploads/avatars/default.jpg" style="width: 50px; height: 50px; border-radius: 50%;">
                                        <div>
                                            <h2 class="font-montserrat font-semibold text-purple-500 text-2xl">
                                                Penyapubasah
                                            </h2>

                                            <h2 class="font-montserrat font-italic text-purple-500 text-sm">
                                                Offline
                                            </h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-purple-200 shadow-purple-600/100 shadow-2xl rounded-3xl p-6 flex flex-col space-y-4 mb-2">
                                    <div class="grid grid-cols-1 md:grid-cols-4 xl:grid-cols-5 xl:p-0 gap-y-4 md:gap-6">
                                        <img src="/uploads/avatars/default4.jpg" style="width: 50px; height: 50px; border-radius: 50%;">
                                        <div>
                                            <h2 class="font-montserrat font-semibold text-purple-500 text-2xl">
                                                Chemong
                                            </h2>

                                            <h2 class="font-montserrat font-italic text-purple-500 text-sm">
                                                Offline
                                            </h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-purple-200 shadow-purple-600/100 shadow-2xl rounded-3xl p-6 flex flex-col space-y-4 mb-2">
                                    <div class="grid grid-cols-1 md:grid-cols-4 xl:grid-cols-5 xl:p-0 gap-y-4 md:gap-6">
                                        <img src="/uploads/avatars/default2.jpg" style="width: 50px; height: 50px; border-radius: 50%;">
                                        <div>
                                            <h2 class="font-montserrat font-semibold text-purple-500 text-2xl">
                                                notArthur
                                            </h2>

                                            <h2 class="font-montserrat font-italic text-purple-500 text-sm">
                                                Offline
                                            </h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-purple-200 shadow-purple-600/100 shadow-2xl rounded-3xl p-6 flex flex-col space-y-4 mb-2">
                                    <div class="grid grid-cols-1 md:grid-cols-4 xl:grid-cols-5 xl:p-0 gap-y-4 md:gap-6">
                                        <img src="/uploads/avatars/default3.jpg" style="width: 50px; height: 50px; border-radius: 50%;">
                                        <div>
                                            <h2 class="font-montserrat font-semibold text-purple-500 text-2xl">
                                                Lancelot
                                            </h2>

                                            <h2 class="font-montserrat font-italic text-purple-500 text-sm">
                                                Offline
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End First Row -->
    </main>
    <!-- End Main -->
</body>

</html>
@endsection