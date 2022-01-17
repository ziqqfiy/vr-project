@extends('auth.layout')

@section('content')

<form class="mt-5" action="{{ route('login-store') }}" method="POST">
    @csrf

    @if( session('error') )
    <p class="alert alert-danger">{{ session('error') }}</p>
    @endif

    <h4>Login</h4>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>

<br>
<a class="btn btn-primary" href="{{ route('qr-login') }}" role="button">Login with QR Code</a>
<br>
<p> Don't have an account? <a href="{{ route('register') }}" class="link-primary">Register</a>
<p>

@endsection