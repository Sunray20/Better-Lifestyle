<?php

namespace App\Http\Controllers;

use App\Models\Excercise;
use App\Models\ExcerciseType;
use App\Models\ExcerciseExcerciseType;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateExcerciseRequest;

class ExcerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $excerciseTypes = ExcerciseType::all();
        return view('excercises.index', ['excerciseTypes' => $excerciseTypes]);
    }

    public function getExcercisesByType($excerciseType)
    {
        $type = ExcerciseType::where('name', $excerciseType)->first();
        if(!empty($type))
        {
            $excercises = $type->excercises;
            return view('excercises.excercises', ['excercises' => $excercises]);
        }

        // TODO: Add custom 404 page with navbar
        abort(404);
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
    public function store(ValidateExcerciseRequest $request)
    {
        $excercise = new Excercise();
        $excercise->fill($request->validated());

        // Store image
        if(!empty($request->image))
        {
            $imageName = time(). '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $excercise->image_path = $imageName;
        }

        return redirect('/excercises');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Excercise  $excercise
     * @return \Illuminate\Http\Response
     */
    public function show($excerciseType, Excercise $excercise)
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
        $selectedExcerciseTypes = $excercise->excerciseTypes;
        $unselectedExcerciseTypes = ExcerciseType::whereNotIn('name', $selectedExcerciseTypes)->get();
        return view('excercises.edit', ['excercise' => $excercise, 'unselectedExcerciseTypes' => $unselectedExcerciseTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Excercise  $excercise
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateExcerciseRequest $request, Excercise $excercise)
    {
        $excercise->fill($request->validated());

        $excerciseTypes = ExcerciseType::all();
        $excerciseTypesNames = $excerciseTypes->pluck('name');
        $excerciseTypesNames->all();

        // TODO: allow deleting by unchecking a field
        foreach($request->all() as $key => $item)
        {
            foreach($excerciseTypes as $excerciseType)
            {
                if($key == $excerciseType->name)
                {
                    ExcerciseExcerciseType::updateOrCreate(
                        ['excercise_type_id' => $excerciseType->id, 'excercise_id' => $excercise->id],
                    );
                }
            }
        }

        // Only store the image if a new one was added
        if(!empty($request->image))
        {
            // If an old image exists then delete it
            if($excercise->image_path) {
                unlink(public_path() . '/images/' . $excercise->image_path);
            }

            $imageName = time(). '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $excercise->image_path = $imageName;
        }

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
