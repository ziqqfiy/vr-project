@extends('auth.layout')
@section('content')

<h4>Have Fun, {{ Auth::user()->name }}</h4>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <a class="btn btn-primary" href="{{ route('profile') }}" role="button">Profile</a>
    <button type="submit" class="btn btn-primary">Logout</button>
</form>

<a class="btn btn-primary" href="{{ route('gameplay') }}" role="button">Gameplay</a>

@endsection