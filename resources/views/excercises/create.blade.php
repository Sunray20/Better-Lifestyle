@extends('layouts.details')

@section('content')
<form action="/excercises" method="POST" enctype="multipart/form-data">
    @csrf
    @foreach ($errors->all() as $error)
        <p class="text-danger">{{ $error }}</p>
    @endforeach
    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="name">Excercise name: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="name" placeholder="Excercise name...">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="name">Excercise type: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <div class="row">
                @foreach ($allExcerciseTypes as $type)
                    <div class="col-lg-6">
                        <input class="form-check-input" type="checkbox" name="{{ $type->name }}">
                        <label class="form-label" for="{{ $type->name }}">{{ $type->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="description">Description: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <textarea class="form-control" name="description" cols="40" rows="10" style="resize:none;"></textarea>
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
