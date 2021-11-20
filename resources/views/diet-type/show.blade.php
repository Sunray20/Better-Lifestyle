@extends('layouts.details')

@section('content')

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">Diet type name: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            {{ $dietType->name }}
        </span>
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-6 col-sm-12 data">
        {{ $dietType->description }}
    </div>
    <div class="col-lg-3 col-sm-0"></div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-0"></div>
    <div class="col-lg-3 col-sm-12 data-label">
        <label for="name">This diet is incompatible with: </label>
    </div>
    <div class="col-lg-3 col-sm-12 data">
        <span>
            @foreach ($dietType->incompatibleFoods as $incompatibleFood)
            <li>{{ $incompatibleFood->name }}</li>
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
