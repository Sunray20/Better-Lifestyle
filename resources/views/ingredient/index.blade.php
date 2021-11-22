@extends('layouts.list')

@section('content')

<form action="/ingredients/" method="GET">
    <div class="row pt-4">
        <div class="col-md-4"></div>
        <div class="col-9 col-md-4 text-center">
            <input type="text" class="form-control" name="search" placeholder="Search for an ingredient...">
        </div>
        <div class="col-3 col-md-4 text-start">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </div>
</form>
@isset($ingredients)
    @foreach ($ingredients as $ingredient)
        <div class="col-md-3 pt-4 pb-4">
            <div class="card">
                <a href="#">
                    @isset($ingredient->image_path)
                        <img src="{{ asset('images/') . '/' . $ingredient->image_path }}" alt="Image of {{ $ingredient->name }}"
                            class="bounding-box-image" min-width="300px" min-height="400px">
                    @else
                        <img src="{{ asset('images/missing_image.png') }}" alt="Missing food image" class="bounding-box-image">
                    @endisset
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/ingredients/{{ $ingredient->id }}">
                            {{ $ingredient->name . ' (' . $ingredient->amount . ' ' . $ingredient->unit . ')'}}</a>
                            @if ($ingredient->validated)
                                <span title="This ingredient is validated"><i class="fas fa-check"></i></span>
                            @endif
                    </h5>
                    <p class="card-subtitle">
                        Calorie: {{ $ingredient->calorie }}
                    </p>
                    <p class="card-subtitle">
                        Protein: {{ $ingredient->protein }}
                    </p>
                    <p class="card-subtitle">
                        Carbs: {{ $ingredient->carb }}
                    </p>
                    <p class="card-subtitle">
                        Fats: {{ $ingredient->fat }}
                    </p>
                </div>
                @if ($ingredient->user_id == auth()->user()->id || auth()->user()->is_admin == 1)
                    <button class="btn"><a href="/ingredients/{{ $ingredient->id }}/edit" class="btn btn-primary">Edit ingredient</a></button>
                    <form action="/ingredients/{{ $ingredient->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
    <div class="row pb-4">
        <div class="col-12">
            <div class="w-100 text-center">
                <span class="paginate-items has-more-false">
                    <i class="fas fa-arrow-circle-left fa-2x"></i>
                </span>
                <span class="paginate-items">
                    <i class="fas fa-arrow-circle-right fa-2x"></i>
                </span>
            </div>
        </div>
    </div>
@endisset

@if($ingredients->isEmpty())
    <div class="card-body">
        <h4 class="card-title text-secondary">
            Oops! There seems to be no result for the ingredient!
        </h4>
        <p class="card-subtitle">
            <a href="/ingredients/create" class="btn btn-warning">Add new ingredient</a>
        </p>
    </div>

@endif
@endsection
