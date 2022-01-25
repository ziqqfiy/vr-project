@extends('auth.layout')
@section('content')

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
</head>

<body class="bg-purple-50 flex flex-wrap items-center justify-center min-h-screen">
    <div class="flex place-items-center">
        <div class="w-1/2">
            <h1 class="font-montserrat text-8xl text-center font-black text-purple-500 ">
                moVRin
            </h1>
        </div>
        <div class="w-1/2 ">
            <div class="shadow-2xl shadow-purple-500/20 bg-white rounded-3xl p-8 max-w-md self-center">
                <h1 class="font-montserrat text-3xl text-purple-500 font-normal text-center">
                    Sign up
                </h1>
                <h1 class="font-montserrat text-5xl text-purple-500 font-extrabold text-center mt-6">
                    Hey There!
                </h1>
                <h3 class=" font-montserrat text-xl text-purple-500 font-medium text-center">
                    Welcome aboard!
                </h3>

                <form class="mt-16" action="{{ route('register-user') }}" method="POST">
                    @csrf

                    @if( $errors->any() )
                    <p class="alert alert-danger rounded-full">Ops! Something's not quite right :(</p>
                    @endif

                    <div>
                        <label for="exampleInputEmail1" class="form-label font-montserrat font-semibold text-purple-500 -mb-8">Email</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required class=" appearance-none font-montserrat rounded-full relative block w-full px-3 py-2 border-2 border-purple-300 placeholder-gray-300 text-gray-900 focus:outline-none focus:ring-purple-700 focus:border-purple-700 focus:z-10 sm:text-sm @error('email') is-invalid @enderror mb-3" value="{{old('email')}}" placeholder="movrin@gmail.com">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="exampleInputEmail1" class="form-label font-montserrat font-semibold text-purple-500 -mb-8">Username</label>
                        <input id="username" name="username" required class=" appearance-none font-montserrat rounded-full relative block w-full px-3 py-2 border-2 border-purple-300 placeholder-gray-300 text-gray-900 focus:outline-none focus:ring-purple-700 focus:border-purple-700 focus:z-10 sm:text-sm @error('name') is-invalid @enderror mb-3" value="{{old('username')}}" placeholder="movrin">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="exampleInputEmail1" class="form-label font-montserrat font-semibold text-purple-500 -mb-8">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="rounded-full font-montserrat relative block w-full px-3 py-2 border-2 border-purple-300 placeholder-gray-300 text-gray-900 focus:outline-none focus:ring-purple-700 focus:border-purple-700 focus:z-10  sm:text-sm @error('password') is-invalid @enderror mb-3" placeholder="********">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="exampleInputEmail1" class="form-label font-montserrat font-semibold text-purple-500 -mb-8">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password" required class="rounded-full font-montserrat relative block w-full px-3 py-2 border-2 border-purple-300 placeholder-gray-300 text-gray-900 focus:outline-none focus:ring-purple-700 focus:border-purple-700 focus:z-10  sm:text-sm @error('password_confirmation') is-invalid @enderror mb-16" placeholder="********">
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <p class="font-montserrat font-normal text-center">
                        Already have an account? <a href="{{ route('login') }}" class=" text-purple-500 ">Log In</a>
                    </p>

                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-purple-500 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        Sign up
                    </button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
@endsection