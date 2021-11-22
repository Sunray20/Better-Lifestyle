@extends('layouts.list')

@section('content')

<div class="card-body">
    <p class="card-subtitle">
        <a href="/workout-routines/create" class="btn btn-light">Add new routine</a>
    </p>
</div>

@isset($workoutRoutines)
    @foreach ($workoutRoutines as $workoutRoutine)
        <div class="col-md-3 pt-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/workout-routines/{{ $workoutRoutine->id }}">
                            {{ $workoutRoutine->name }}</a>
                    </h5>
                </div>
                @if (auth()->user()->is_admin == 1)
                    <button class="btn"><a href="/workout-routines/{{ $workoutRoutine->id }}/edit" class="btn btn-primary">Edit routine</a></button>
                    <form action="/workout-routines/{{ $workoutRoutine->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
@endisset

@if($workoutRoutines->isEmpty())
    <div class="card-body">
        <h4 class="card-title text-secondary">
            Oops! There seems to be no routines yet. Check back later!
        </h4>
        @if (auth()->user()->is_admin == 1)
            <p class="card-subtitle">
                <a href="/workout-routines/create" class="btn btn-warning">Add new routine</a>
            </p>
        @endif
    </div>
@endif
@endsection
