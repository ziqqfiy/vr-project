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

<body>
    <form class="mt-5" action="{{ route('add-goal') }}" method="POST">
        @csrf
        <h4>Add Goal</h4>

        <input class="special" type="hidden" name="id" value="{{$data->id}}">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Exercise for 10 mins..">
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Goal</button>
    </form>

    //Display all goal

    @foreach($goal as $goal)
    <ul class="list-group">
        <li class="list-group-item disabled">
            {{ $goal->description }}
        </li>
    </ul>
    @endforeach
    
</body>
</html>
@endsection