@extends('layouts.details')

@section('content')
@foreach ($errors->all() as $error)
    <p class="text-danger">{{ $error }}</p>
@endforeach
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Search for an ingredient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <input id="search" type="text" class="form-control" name="search" placeholder="Search for a ingredient...">
                    <button id="sendSearchRequest">Search</button>
                    <div id="possibleIngredients">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="/foods" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="name">Name of food: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="name" placeholder="Food name...">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="preparation_time">Preparation time: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="preparation_time" placeholder="Preparation Time (mins)...">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="preparation_difficulty">Preparation Difficulty: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="preparation_difficulty" placeholder="Preparation Difficulty (1 to 5)...">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="preparation_desc">Preparation Description: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <textarea class="form-control" name="preparation_desc" cols="40" rows="10" style="resize:none;"></textarea>
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

    <button type="button" class="btn btn-success mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#createModal">
        Add new ingredient
    </button>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-0 data-label">
            <label class="form-label">Ingredients: </label>
        </div>
        <div id="ingredients" class="col-lg-3 text-start">

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
<script src="{{ asset('js/dynamicElementAdding.js') }}"></script>
@endsection
