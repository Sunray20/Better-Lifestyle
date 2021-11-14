<x-bootstrap-layout/>
<form action="/excercise-history/{{ $excerciseHistory->id }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        {{ $excerciseHistory->excercise->name }}
    </div>
    <div>
        Target amount:<input type="text" name="target_amount" value="{{ $excerciseHistory->target_amount }}">
    </div>

    <div>
        Achieved amount:<input type="text" name="achieved_amount" value="{{ $excerciseHistory->achieved_amount }}">
    </div>
    <div>
        Target weight:<input type="text" name="target_weight" value="{{ $excerciseHistory->target_weight }}">
    </div>
    <div>
        Achieved weight:<input type="text" name="achieved_weight" value="{{ $excerciseHistory->achieved_weight }}">
    </div>

    <div>
        <input type="submit" value="submit" class="btn btn-primary">
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
</form>
