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
                    <a href="{{ route('dashboard') }}" class="px-3 xl:px-4 py-2 text-gray-600 rounded-full hover:bg-purple-200 hover:text-purple-500">Dashboard</a>
                </li>
                <li>
                    <a class="px-3 xl:px-4 py-2 text-gray-100 rounded-full bg-purple-500 shadow-purple-500/30 shadow-xl cursor-default select-none hover:text-gray-100">My Account</a>
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
                        <button class="p-2 rounded hover:bg-gray-200">
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
    <h4>My Profile</h4>

    <div class="mt-5">
        <img src="/uploads/avatars/{{ $user->avatar }}" style="width: 150px; height: 150px; border-radius: 50%;">

        <form enctype="multipart/form-data" action="{{ route('profile-update') }}" method="POST">
            @csrf
            <input type="file" name="avatar">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name', Auth::user()->name)}}">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email', Auth::user()->email)}}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <!-- End Main -->
</body>

</html>
@endsection