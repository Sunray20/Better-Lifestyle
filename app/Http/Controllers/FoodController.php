<?php

namespace App\Http\Controllers;

use App\Models\Food;
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
    public function store(Request $request)
    {
        // TODO: fix image upload
        $food = new Food();
        $food->fill($request->all());
        // Store image
        /*if(!empty($request->input('image')))
        {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $ingredient->image_path = $imageName;
        }*/

        $food->user_id = auth()->user()->id;
        $food->save();

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
    public function update(Request $request, Food $food)
    {
        $food->fill($request->all());

        // store the image
        /*if(!empty($request->input('image_path')))
        {
            $newImageName = time() . '-' . $request->name . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $ingredient->image_path = $newImageName;
        }*/

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
