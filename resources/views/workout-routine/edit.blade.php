@extends('layouts.details')

@section('content')

@foreach ($errors->all() as $error)
    <p class="text-danger">{{ $error }}</p>
@endforeach

<form action="/workout-routines/{{ $workoutRoutine->id }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="name">Name: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="name" value="{{ $workoutRoutine->name }}">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="description">Description: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <textarea class="form-control" name="description" cols="40" rows="10" style="resize:none;">{{ $workoutRoutine->description }}</textarea>
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="name">Excercises: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            @foreach ($workoutRoutine->excercises as $excercise)
                <input class="form-check-input" type="checkbox" name="{{ $excercise->name }}" checked>
                <label class="form-check-label" for="{{ $excercise->name }}">{{ $excercise->name }}</label>
            @endforeach
            @foreach ($unselectedExcercises as $excercise)
                <input class="form-check-input" type="checkbox" name="{{ $excercise->name }}">
                <label class="form-label" for="{{ $excercise->name }}">{{ $excercise->name }}</label>
            @endforeach
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row pt-3">
        <div class="col-lg-3"></div>
        <div class="col-lg-3 data-label">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Return</a>
        </div>
        <div class="col-lg-3 data">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
        <div class="col-lg-3"></div>
    </div>
</form>
@endsection
