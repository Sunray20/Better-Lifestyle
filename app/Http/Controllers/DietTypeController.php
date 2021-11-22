<?php

namespace App\Http\Controllers;

use App\Models\DietType;
use App\Http\Requests\ValidateDietTypeRequest;
use Illuminate\Http\Request;

class DietTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dietTypes = DietType::all();
        return view('diet-type.index', ['dietTypes' => $dietTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diet-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateDietTypeRequest $request)
    {
        // TODO: Create incompatible food logic
        if(auth()->user()->is_admin == 1) {
            $dietType = new DietType();
            $dietType->fill($request->validated());
            $dietType->save();
        }

        return redirect('/diet-types');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DietType  $dietType
     * @return \Illuminate\Http\Response
     */
    public function show(DietType $dietType)
    {
        return view('diet-type.show', ['dietType' => $dietType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DietType  $dietType
     * @return \Illuminate\Http\Response
     */
    public function edit(DietType $dietType)
    {
        return view('diet-type.edit', ['dietType' => $dietType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DietType  $dietType
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateDietTypeRequest $request, DietType $dietType)
    {
        if(auth()->user()->is_admin == 1) {
            $dietType->fill($request->validated());
            $dietType->save();
        }

        return redirect('/diet-types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DietType  $dietType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DietType $dietType)
    {
        if(auth()->user()->is_admin == 1) {
            $ingredient->delete();
        }

        return redirect('/ingredients');
    }
}
