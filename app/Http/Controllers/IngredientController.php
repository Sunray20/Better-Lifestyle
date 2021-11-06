<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // First it should search in DB then make an API call
        // TODO: add api call
        $ingredientName = $request->input('search');
        if(!empty($ingredientName))
        {
            $ingredients = Ingredient::where('name', $ingredientName)->get();
        }
        else
        {
            $ingredients = Ingredient::all();
        }
        return view('ingredient.index', ['ingredients' => $ingredients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredient = new Ingredient();
        $ingredient->fill($request->all());

        // Store image
        if(!empty($request->image))
        {
            $imageName = time(). '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $ingredient->image_path = $imageName;
        }

        $ingredient->user_id = auth()->user()->id;
        $ingredient->save();

        return redirect('/ingredients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        return view('ingredient.show', ['ingredient' => $ingredient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        return view('ingredient.edit', ['ingredient' => $ingredient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $ingredient->fill($request->all());

        // Only store the image if a new one was added
        if(!empty($request->image))
        {
            unlink(public_path() . '/images/' . $ingredient->image_path);
            $imageName = time(). '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $ingredient->image_path = $imageName;
        }

        $ingredient->save();

        return redirect('/ingredients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        //If it's his or is_admin then let it be deleted
        if($ingredient->user_id == auth()->user()->id || auth()->user()->is_admin == 1) {
            $ingredient->delete();
        }

        return redirect('/ingredients');
    }
}
