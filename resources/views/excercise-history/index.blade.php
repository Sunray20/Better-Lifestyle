
@extends('layouts.list')

@section('content')

@foreach ($excerciseHistories as $excerciseHistory)
<div class="col-md-4 pt-4 pb-4">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                {{ $excerciseHistory->excercise->name }}
            </h5>
        </div>
        <p class="card-subtitle">
            Target amount: {{ $excerciseHistory->target_amount }}
        </p>
        <p class="card-subtitle">
            Achieved amount: {{ $excerciseHistory->achieved_amount }}
        </p>
        <p class="card-subtitle">
            Target weight: {{ $excerciseHistory->target_weight }}
        </p>
        <p class="card-subtitle">
            Achieved weight: {{ $excerciseHistory->achieved_weight }}
        </p>
        <p class="card-subtitle">
            Date: {{ $excerciseHistory->date }}
        </p>

        <a href="excercise-history/{{ $excerciseHistory->id }}/edit" class="btn btn-primary">Edit entry</a>
        <form action="excercise-history/{{ $excerciseHistory->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete entry</button>
        </form>
    </div>
@endforeach

@if($excerciseHistories->isEmpty())
    <div class="card-body">
        <h4 class="card-title text-secondary">
            It seems like there is no excercise history added just yet!
            Go to <a href="/my-routine">My routine</a> page to start planning your workout routine.
        </h4>
    </div>
@endif
@endsection
