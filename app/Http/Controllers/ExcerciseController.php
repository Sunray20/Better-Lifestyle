<?php

namespace App\Http\Controllers;

use App\Models\Excercise;
use Illuminate\Http\Request;

class ExcerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $excercises = Excercise::all();
        return view('excercises.index', ['excercises' => $excercises]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('excercises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $excercise = Excercise::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'description' => $request->input('description')
        ]);

        return redirect('/excercises');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Excercise  $excercise
     * @return \Illuminate\Http\Response
     */
    public function show(Excercise $excercise)
    {
        return view('excercises.show', ['excercise' => $excercise]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Excercise  $excercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Excercise $excercise)
    {
        return view('excercises.edit', ['excercise' => $excercise]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Excercise  $excercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Excercise $excercise)
    {
        $excercise->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'description' => $request->input('description')
        ]);

        return redirect('/excercises');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Excercise  $excercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Excercise $excercise)
    {
        $excercise->delete();

        return redirect('/excercises');
    }
}
