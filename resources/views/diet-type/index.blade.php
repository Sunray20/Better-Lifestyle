@extends('layouts.list')

@section('content')

@if (auth()->user()->is_admin == 1)
    <div class="card-body">
        <p class="card-subtitle">
            <a href="/diet-types/create" class="btn btn-light">Add new type of diet</a>
        </p>
    </div>
@endif

@isset($dietTypes)
    @foreach ($dietTypes as $dietType)
    <div class="col-md-4 pt-4 pb-4">
        <div class="card">
            <h5 class="card-title mt-3">
                <a href="/diet-types/{{ $dietType->id }}">{{ $dietType->name }}</a>
            </h5>
            <p class="card-subtitle">
                Description: {{ $dietType->description }}
            </p>

            @if ($dietType->user_id == auth()->user()->id || auth()->user()->is_admin == 1)
                <p class="mt-2"><a href="/diet-types/{{ $dietType->id }}/edit" class="btn btn-primary">Edit diet type</a></p>
                <form action="/diet-types/{{ $dietType->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        </div>
    </div>
    @endforeach
@endisset
@endsection
