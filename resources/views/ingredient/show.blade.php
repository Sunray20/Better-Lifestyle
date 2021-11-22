@extends('layouts.details')

@section('content')

<div class="row mb-3">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="card col-lg-6 col-sm-12">
        @isset($ingredient->image_path)
            <img src="{{ asset('images/') . '/' . $ingredient->image_path }}" alt="Image of a food" class="bounding-box-image">
        @else
            <img src="{{ asset('images/missing_image.png') }}" alt="Missing food image" class="bounding-box-image">
        @endisset
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">Name of Ingredient: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            {{ $ingredient->name }}
            @if ($ingredient->validated)
                <span title="This ingredient is validated"><i class="fas fa-check"></i></span>
            @endif
        </span>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">Calorie: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            {{ $ingredient->calorie }}
        </span>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">Protein: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            {{ $ingredient->protein }}
        </span>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">Carb: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            {{ $ingredient->carb }}
        </span>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">Fat: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            {{ $ingredient->fat }}
        </span>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">Ingredient amount: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            {{ $ingredient->amount . ' ' . $ingredient->unit }}
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
