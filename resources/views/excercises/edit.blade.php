@extends('layouts.details')

@section('content')
@foreach ($errors->all() as $error)
    <p class="text-danger">{{ $error }}</p>
@endforeach
<form action="/excercises/{{ $excercise->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="card col-lg-6 col-sm-12">
            @isset($excercise->image_path)
                <img src="{{ asset('images/excercises/') . '/' . $excercise->image_path }}"
                        class="card-img-top"
                        alt="Image of {{ $excercise->name }}"
                        class="bounding-box-image">
            @else
                <img src="{{ asset('images/missing_image.png') }}" alt="Missing image" class="bounding-box-image">
            @endisset
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="name">Excercise name: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="name" value="{{ $excercise->name }}">
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
                @foreach ($excercise->excerciseTypes as $type)
                    <div class="col-lg-6">
                        <input class="form-check-input" type="checkbox" name="{{ $type->name }}" checked>
                        <label class="form-label" for="{{ $type->name }}">{{ $type->name }}</label>
                    </div>
                @endforeach
                @foreach ($unselectedExcerciseTypes as $type)
                    <div class="col-lg-6">
                        <input class="form-check-input" type="checkbox" name="{{ $type->name }}" checked>
                        <label class="form-label" for="{{ $type->name }}">{{ $type->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-6 col-sm-12 data">
            <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $excercise->description }}</textarea>
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
