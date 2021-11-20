@extends('layouts.details')

@section('content')

<div class="row mb-3">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="card col-lg-6 col-sm-12">
        @isset($food->image_path)
            <img src="{{ asset('images/') . '/' . $food->image_path }}" alt="Image of a food" class="bounding-box-image">
        @else
            <img src="{{ asset('images/missing_image.png') }}" alt="Missing food image" class="bounding-box-image">
        @endisset
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">Name of food: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            {{ $food->name }}
        </span>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">Preparation time: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            {{ $food->preparation_time }} mins
        </span>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">Preparation difficulty: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            {{ $food->preparation_difficulty }} / 5
        </span>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">Preparation description: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            {{ $food->preparation_desc }}
        </span>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">This food consists of: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            @foreach ($food->ingredients as $ingredient)
                <li>{{ $ingredient->name }}</li>
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
