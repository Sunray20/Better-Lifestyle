<?php

namespace App\Http\Controllers;

use App\Models\WorkoutRoutine;
use App\Models\Excercise;
use App\Models\ExcerciseWorkoutRoutine;
use App\Http\Requests\ValidateWorkoutRoutineRequest;
use Illuminate\Http\Request;

class WorkoutRoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workoutRoutines = WorkoutRoutine::all();
        return view('workout-routine.index', ['workoutRoutines' => $workoutRoutines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $excercises = Excercise::all();
        return view('workout-routine.create', ['excercises' => $excercises]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ValidateWorkoutRoutineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateWorkoutRoutineRequest $request)
    {
        $workoutRoutine = new WorkoutRoutine();
        $workoutRoutine->fill($request->validated());
        $workoutRoutine->save();
        $this->updateExcerciseWorkoutRoutineRecords($request, $workoutRoutine);

        return redirect('/workout-routines');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkoutRoutine  $workoutRoutine
     * @return \Illuminate\Http\Response
     */
    public function show(WorkoutRoutine $workoutRoutine)
    {
        return view('workout-routine.show', ['workoutRoutine' => $workoutRoutine]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkoutRoutine  $workoutRoutine
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkoutRoutine $workoutRoutine)
    {
        $selectedExcercises = $workoutRoutine->excercises;
        $unselectedExcercises = Excercise::all();
        $unselectedExcercises = $unselectedExcercises->diff($selectedExcercises);
        return view('workout-routine.edit',
         ['workoutRoutine' => $workoutRoutine,
          'unselectedExcercises' => $unselectedExcercises]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ValidateWorkoutRoutineRequest  $request
     * @param  \App\Models\WorkoutRoutine  $workoutRoutine
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateWorkoutRoutineRequest $request, WorkoutRoutine $workoutRoutine)
    {
        $workoutRoutine->fill($request->validated());
        $workoutRoutine->save();
        $this->updateExcerciseWorkoutRoutineRecords($request, $workoutRoutine);

        return redirect('/workout-routines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkoutRoutine  $workoutRoutine
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkoutRoutine $workoutRoutine)
    {
        if(auth()->user()->is_admin == 1) {
            $workoutRoutine->delete();
        }

        return redirect('/workout-routines');
    }

    /**
     * Updates the records in food_ingredient table
     * Based on the checkbox on the form page
     */
    public function updateExcerciseWorkoutRoutineRecords(ValidateWorkoutRoutineRequest $request, $workoutRoutine)
    {
        $excercises = Excercise::all();

        // Iterate through every input field
        foreach($request->all() as $key => $item)
        {
            foreach($excercises as $excercise)
            {
                if (strpos($key,'_') !== false) { //first we check if the url contains the string
                    $fixedName = str_replace('_', ' ', $key); //if yes, we simply replace it
                }

                // If the field's name is equal to the excercise->name
                if($fixedName == $excercise->name)
                {
                    // And if the checkbox was checked then insert new
                    // excercise <-> workoutRoutine connection
                    if($request->input($key) == true) {
                        ExcerciseWorkoutRoutine::updateOrCreate(
                            ['excercise_id' => $excercise->id, 'workout_routine_id' => $workoutRoutine->id],
                        );
                    }
                }
            }
        }

        // If an excercise field left unchecked then delete it from pivot table
        foreach($excercises as $excercise)
        {
            if (strpos($excercise->name, ' ') !== false) { //first we check if the url contains the string
                $fixedName = str_replace(' ', '_', $excercise->name); //if yes, we simply replace it
            }

            if($request->get($fixedName) == null)
            {
                ExcerciseWorkoutRoutine::where([['excercise_id', '=', $excercise->id],
                                                ['workout_routine_id', '=', $workoutRoutine->id]])->delete();
            }
        }
    }
}
