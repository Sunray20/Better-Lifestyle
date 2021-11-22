<?php

namespace App\Http\Controllers;

use App\Models\WorkoutRoutine;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkoutRoutine  $workoutRoutine
     * @return \Illuminate\Http\Response
     */
    public function show(WorkoutRoutine $workoutRoutine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkoutRoutine  $workoutRoutine
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkoutRoutine $workoutRoutine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkoutRoutine  $workoutRoutine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkoutRoutine $workoutRoutine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkoutRoutine  $workoutRoutine
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkoutRoutine $workoutRoutine)
    {
        //
    }
}
