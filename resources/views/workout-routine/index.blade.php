<x-bootstrap-layout/>
@foreach ($workoutRoutines as $workoutRoutine)
    Routine name: {{ $workoutRoutine->name }} <br/>
    Description: {{ $workoutRoutine->description }}
    <div>
        <p>This routine consists of: </p>
        <ul>
            @foreach ($workoutRoutine->excercises as $excercise)
                <li>{{ $excercise->name }}</li>
            @endforeach
        </ul>
    </div>
@endforeach
