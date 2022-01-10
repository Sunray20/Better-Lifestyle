@extends('layouts.details')

@section('content')

<div class="row mb-3">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="card col-lg-6 col-sm-12">
        @if($excercise->image_path !== null && file_exists(public_path('images/excercises/' . $excercise->image_path)))
            <img src="{{ asset('images/excercises/') . '/' . $excercise->image_path}}"
                class="card-img-top"
                alt="Image of {{ $excercise->name }}"
                class="bounding-box-image">
        @else
            <img src="{{ asset('images/missing_image.png') }}" alt="Missing image" class="bounding-box-image">
        @endif
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">Excercise name: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            {{ $excercise->name }}
        </span>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-6 col-sm-12 data">
        {{ $excercise->description }}
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

@if (auth()->user()->is_admin)
<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data">
        <form action="/excercises/{{ $excercise->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <a href="/excercises/{{ $excercise->id }}/edit" class="btn btn-primary">Edit excercise</a>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>
@endif

<div class="row pt-3">
    <div class="col-lg-3"></div>
    <div class="col-lg-3 data-label">
        <a href="/excercises/{{ $excerciseType }}" class="btn btn-secondary">Return</a>
    </div>
    <div class="col-lg-3 data"></div>
    <div class="col-lg-3"></div>
</div>
@endsection
