

@foreach ($myRoutine as $routine)
    <div>{{ $routine->excercise->name }}</div>
    <div>Target amount: {{ $routine->target_amount }}</div>
    <div>Achieved amount: {{ $routine->achieved_amount }}</div>
    <div>Target weight: {{ $routine->target_weight }}</div>
    <div>Achieved weight: {{ $routine->achieved_weight }}</div>
    <div>Date: {{ $routine->date }}</div>

    <a href="excercise-history/{{ $routine->id }}/edit">Edit entry</a>
    <form action="excercise-history/{{ $routine->id }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Delete entry</button>
    </form>
    <hr>
@endforeach
