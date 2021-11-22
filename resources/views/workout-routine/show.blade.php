@extends('layouts.details')

@section('content')


<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-6 col-sm-12 data-label">
        <h4 class="text-center">{{ $workoutRoutine->name }}</h4>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-6 col-sm-12 data">
        <p class="mb-3 mt-3">{{ $workoutRoutine->description }}</p>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">This routine consists of: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            @foreach ($workoutRoutine->excercises as $excercise)
                {{ $excercise->name . ',' }}
            @endforeach
        </span>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row pt-3">
    <div class="col-lg-3"></div>
    <div class="col-lg-3 data-label">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Return</a>
    </div>
    <div class="col-lg-3 data"></div>
    <div class="col-lg-3"></div>
</div>

@endsection
