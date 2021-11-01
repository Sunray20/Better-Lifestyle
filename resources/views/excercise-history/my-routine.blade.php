<x-bootstrap-layout/>
@for ($i = 0; $i < 7; $i++)
<div style="display: inline-block; width: 14%">
    @foreach ($myRoutine as $routine)
        @if (date('Y-m-d', strtotime($monday . ' +' . $i .' days')) == $routine->date)
            <div>{{ $routine->excercise->name }}</div>
            <div>Target amount: {{ $routine->target_amount }}</div>
            <div>Achieved amount: {{ $routine->achieved_amount }}</div>
            <div>Target weight: {{ $routine->target_weight }}</div>
            <div>Achieved weight: {{ $routine->achieved_weight }}</div>
            <div>Date: {{ $routine->date }}</div>

            <a href="excercise-history/{{ $routine->id }}/edit" class="btn btn-primary">Edit entry</a>
            <form action="excercise-history/{{ $routine->id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete entry</button>
            </form>
            <hr>
        @endif
    @endforeach
</div>
@endfor
