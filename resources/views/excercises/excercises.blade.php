@extends('layouts.list')

@section('content')

@if (auth()->user()->is_admin)
    <div class="card-body">
        <p class="card-subtitle">
            <a href="/excercises/create" class="btn btn-success">Add new excercise</a>
        </p>
    </div>
@endif

@foreach ($excercises as $excercise)
    <div class="col-md-4 pt-4 pb-4">
        <div class="card">
            @if($excercise->image_path !== null && file_exists(public_path('images/excercises/' . $excercise->image_path)))
                <img src="{{ asset('images/excercises/') . '/' . $excercise->image_path}}"
                    class="card-img-top"
                    alt="Image of {{ $excercise->name }}"
                    class="bounding-box-image">
            @else
                <img src="{{ asset('images/missing_image.png') }}" alt="Missing image" class="bounding-box-image">
            @endif

            <div class="card-body">
                <h5 class="card-title">
                    <h5 class="card-title"><a href="/excercises/{{ $excerciseType->name }}/{{ $excercise->id }}">{{ $excercise->name }}</a></h5>
                </h5>
            </div>
        </div>
    </div>
@endforeach
<div class="card-body">
    <p class="card-subtitle">
        <a href="/excercises/" class="btn btn-secondary">Return</a>
    </p>
</div>

@endsection
