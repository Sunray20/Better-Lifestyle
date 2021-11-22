@extends('layouts.details')

@section('content')

@foreach ($errors->all() as $error)
    <p class="text-danger">{{ $error }}</p>
@endforeach

<form action="/ingredients/{{ $ingredient->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="name">Name of the ingredient: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="name" value="{{ $ingredient->name }}">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="calorie">Calorie amount: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="calorie" value="{{ $ingredient->calorie }}">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="protein">Protein amount: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="protein" value="{{ $ingredient->protein }}">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="carb">Carb amount: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="carb" value="{{ $ingredient->carb }}">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="fat">Fat amount: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="fat" value="{{ $ingredient->fat }}">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="amount">Ingredient amount: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="amount" value="{{ $ingredient->amount }}">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="unit">Unit: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <select class="form-select" id="unit" name="unit">
                <option value="g"       {{ $ingredient->unit == 'g' ? 'selected' : '' }}>g</option>
                <option value="pound"   {{ $ingredient->unit == 'pound' ? 'selected' : '' }}>pound</option>
                <option value="dL"      {{ $ingredient->unit == 'dL' ? 'selected' : '' }}>dL</option>
                <option value="mL"      {{ $ingredient->unit == 'mL' ? 'selected' : '' }}>mL</option>
            </select>
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="image" class="form-label">Upload Image:</label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="file" name="image" class="form-control"/>
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    @if (auth()->user()->is_admin == 1)
        <div class="row">
            <div class="col-lg-3 col-sm-0"></div>
            <div class="col-lg-3 col-sm-12 data-label">
                <label for="validated" class="form-label">The data is valid?</label>
            </div>
            <div class="col-lg-3 col-sm-12 data">
                <input type="checkbox" name="validated" {{ ($ingredient->validated) ? 'checked' : '' }}>
            </div>
            <div class="col-lg-3 col-sm-0"></div>
        </div>
    @endif

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
