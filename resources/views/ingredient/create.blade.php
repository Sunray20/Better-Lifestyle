@extends('layouts.details')

@section('content')
@if ($errors)
    @foreach ($errors->all() as $message)
        {{ $message }}
    @endforeach
@endif

<form action="/ingredients" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="name">Name of the ingredient: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="name" placeholder="Ingredient name...">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="calorie">Calorie amount: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="calorie" placeholder="Calories...">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="protein">Protein amount: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="protein" placeholder="Protein...">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="carb">Carb amount: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="carb" placeholder="Carbs...">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="fat">Fat amount: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="fat" placeholder="Fats...">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="amount">Ingredient amount: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="amount" placeholder="Amount...">
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
                <option value="g" selected>g</option>
                <option value="pound">pound</option>
                <option value="dL">dL</option>
                <option value="mL">mL</option>
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
