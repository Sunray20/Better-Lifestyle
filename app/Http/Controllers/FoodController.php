<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Ingredient;
use App\Models\FoodIngredient;
use App\Http\Requests\ValidateFoodRequest;
use Illuminate\Http\Request;

class FoodController extends Controller
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
        $foodName = $request->input('search');
        if(!empty($foodName))
        {
            $foods = Food::where('name', $foodName)->get();
        }
        else
        {
            $foods = Food::all();
        }
        return view('food.index', ['foods' => $foods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: Add the posibility to add ingredients to a food
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateFoodRequest $request)
    {
        $food = new Food();
        $food->fill($request->validated());

        // Store image
        if(!empty($request->image))
        {
            $imageName = time(). '-' . $request->validated('name')['name'] . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $food->image_path = $imageName;
        }

        $food->user_id = auth()->user()->id;
        $food->save();

        $ingredients = Ingredient::all();

        // TODO: move it to a function
        // Iterate through every input field
        foreach($request->all() as $key => $item)
        {
            foreach($ingredients as $ingredient)
            {
                // If the field's name is equal to the ingredient->name
                if($key == $ingredient->name)
                {
                    // And if the checkbox was checked then insert new
                    // food <-> ingredient connection
                    if($request->input($key) == true) {
                        FoodIngredient::updateOrCreate(
                            ['ingredient_id' => $ingredient->id, 'food_id' => $food->id],
                        );
                    }
                }
            }
        }

        return redirect('/foods');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return view('food.show', ['food' => $food]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('food.edit', ['food' => $food]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateFoodRequest $request, Food $food)
    {
        $food->fill($request->validated());

        // Only store the image if a new one was added
        if(!empty($request->image))
        {
            // If an old image exists then delete it
            if($ingredient->image_path) {
                unlink(public_path() . '/images/' . $food->image_path);
            }
            $imageName = time(). '-' . $request->validated('name')['name'] . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $food->image_path = $imageName;
        }

        $ingredients = Ingredient::all();

        // TODO: move it to a function
        // Iterate through every input field
        foreach($request->all() as $key => $item)
        {
            foreach($ingredients as $ingredient)
            {
                // If the field's name is equal to the ingredient->name
                if($key == $ingredient->name)
                {
                    // And if the checkbox was checked then insert new
                    // food <-> ingredient connection
                    if($request->input($key) == true) {
                        FoodIngredient::updateOrCreate(
                            ['ingredient_id' => $ingredient->id, 'food_id' => $food->id],
                        );
                    }
                }
            }
        }

        // If an excercise field left unchecked then delete it from pivot table
        foreach($ingredients as $ingredient)
        {
            if($request->get($ingredient->name) == null)
            {
                FoodIngredient::where([['ingredient_id', '=', $ingredient->id],
                                        ['food_id', '=', $food->id]])->delete();
            }
        }

        $food->save();

        return redirect('/foods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //If it's his or is_admin then let it be deleted
        if($food->user_id == auth()->user()->id || auth()->user()->is_admin == 1) {
            $food->delete();
        }

        return redirect('/foods');
    }
}
