@extends('layouts.list')

@section('content')

<form action="/foods/" method="GET">
    <div class="row pt-4">
        <div class="col-md-4"></div>
        <div class="col-9 col-md-4 text-center">
            <input type="text" class="form-control" name="search" placeholder="Search for a food...">
        </div>
        <div class="col-3 col-md-4 text-start">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </div>
</form>

@isset($foods)
    @if(!$foods->isEmpty())
        @foreach ($foods as $food)
            <div class="col-md-4 pt-4 pb-4">
                <div class="card">
                    @isset($food->image_path)
                        <img src="{{ asset('images/') . '/' . $food->image_path }}" alt="Image of {{ $food->name }}" class="bounding-box-image">
                    @else
                        <img src="{{ asset('images/missing_image.png') }}" alt="Missing food image" class="bounding-box-image">
                    @endisset
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/foods/{{ $food->id }}">{{ $food->name }}</a>
                        </h5>
                        <p class="card-subtitle">
                            Time: {{ $food->preparation_time }} mins
                        </p>
                        <p class="card-subtitle">
                            Difficulty: {{ $food->preparation_difficulty }}/5
                        </p>
                    </div>

                    @if ($food->user_id == auth()->user()->id || auth()->user()->is_admin == 1)
                        <p><a href="/foods/{{ $food->id }}/edit" class="btn btn-primary">Edit food</a></p>
                        <form action="/foods/{{ $food->id }}" method="POST">
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
                    {{ $foods->links() }}
                </div>
            </div>
        </div>
    @else
        <div class="card-body">
            <h3 class="card-title text-secondary pb-4 pt-4">
                Oops! There seems to be no result for the food!
            </h3>
            <p class="card-subtitle">
                <a href="/foods/create" class="btn btn-light">Add new food</a>
            </p>
        </div>
    @endif
@endisset

@endsection
