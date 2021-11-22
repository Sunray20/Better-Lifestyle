@extends('layouts.list')

@section('content')

@foreach ($excerciseTypes as $excerciseType)
    <div class="col-md-4 pt-4 pb-4">
        <div class="card">
            @if(file_exists(public_path('images/excercises/' . $excerciseType->name . ".jpg")))
                <img src="{{ asset('images/excercises/') . '/' . $excerciseType->name . ".jpg" }}"
                    class="card-img-top"
                    alt="Image of {{ $excerciseType->name }}"
                    class="bounding-box-image">
            @else
                <img src="{{ asset('images/missing_image.png') }}" alt="Missing image" class="bounding-box-image">
            @endif
            <div class="card-body">
                <h5 class="card-title">
                    <a href="/excercises/{{ $excerciseType->name }}/">{{ $excerciseType->name }}</a>
                </h5>
            </div>
        </div>
    </div>
@endforeach
@endsection
