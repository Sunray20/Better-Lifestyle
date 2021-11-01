<x-bootstrap-layout/>
@foreach ($excerciseHistories as $excerciseHistory)
    <div>{{ $excerciseHistory->excercise->name }}</div>
    <div>Target amount: {{ $excerciseHistory->target_amount }}</div>
    <div>Achieved amount: {{ $excerciseHistory->achieved_amount }}</div>
    <div>Target weight: {{ $excerciseHistory->target_weight }}</div>
    <div>Achieved weight: {{ $excerciseHistory->achieved_weight }}</div>
    <div>Date: {{ $excerciseHistory->date }}</div>

    <a href="excercise-history/{{ $excerciseHistory->id }}/edit" class="btn btn-primary">Edit entry</a>
    <form action="excercise-history/{{ $excerciseHistory->id }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete entry</button>
    </form>
    <hr>
@endforeach
