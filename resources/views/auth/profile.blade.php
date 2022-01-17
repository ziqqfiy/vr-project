@extends('auth.layout')

@section('content')

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


@endsection