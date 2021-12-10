<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Ingredient;
use App\Models\FoodIngredient;
use App\Http\Requests\ValidateFoodRequest;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

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
        $foodName = $request->input('search');
        if(!empty($foodName))
        {
            $foods = Food::where('name', 'like', '%'.$foodName.'%')->simplePaginate(4);
            // It is possible to add API call, but we would need to save the
            // Ingredients of the food, which is a lot of api calls
            // TODO: Finish API call
            /*if($foods->isEmpty())
            {
                $client = new Client();
                $res = $client->request('GET', 'https://api.spoonacular.com/recipes/complexSearch?query='.$foodName.'&number=1&apiKey='.env('FOOD_API_KEY'));
                if($res->getStatusCode() == 200)
                {
                    $decodedResults = json_decode($res->getBody())->results;
                    // The API gives back false results so only use the first one
                    // Thats the most accurate

                    // send a new request for the details of the ingredient
                    $res = $client->request('GET', 'https://api.spoonacular.com/recipes/{id}/information'.$decodedResults[0]->id.'/information?amount=100&unit=grams&apiKey='.env('FOOD_API_KEY'));

                    if($res->getStatusCode() == 200) {
                        $decodedVal = json_decode($res->getBody());
                        $decodedNutritions = $decodedVal->nutrition;
                        var_dump($decodedNutritions);
                        $food = new Food();

                        foreach($decodedNutritions->nutrients as $key => $nutrient)
                        {
                            switch($nutrient->title)
                            {
                                case 'calorie':
                                    $food->calorie = $nutrient;
                                    break;
                                case 'protein': break;
                                case 'carb': break;
                                case 'fat': break;
                            }
                        }
                    }
                }
            }*/
        }
        else
        {
            $foods = Food::simplePaginate(4);
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

        $this->updateFoodIngredientRecords($request, $food);

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

        // TODO: Move image storing
        // Only store the image if a new one was added
        if(!empty($request->image))
        {
            // If an old image exists then delete it
            if($food->image_path) {
                unlink(public_path() . '/images/' . $food->image_path);
            }
            $imageName = time(). '-' . $request->validated('name')['name'] . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $food->image_path = $imageName;
        }
        $food->save();
        $this->updateFoodIngredientRecords($request, $food);

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

    /**
     * Updates the records in food_ingredient table
     * Based on the checkbox on the form page
     */
    public function updateFoodIngredientRecords(ValidateFoodRequest $request, $food)
    {
        $ingredients = Ingredient::all();

        // Iterate through every input field
        foreach($request->all() as $key => $item)
        {
            foreach($ingredients as $ingredient)
            {
                //[0] - name; [1] - amount; [2] - unit
                $keyVal = explode('_', $key);
                // If the field's name is equal to the ingredient->name
                if($keyVal[0] == $ingredient->name)
                {
                    // And if the checkbox was checked then insert new
                    // food <-> ingredient connection
                    if($request->input($key) == true) {
                        //dd($request);
                        FoodIngredient::updateOrCreate(
                            ['ingredient_id' => $ingredient->id, 'food_id' => $food->id, 'amount' => $keyVal[1], 'unit' => $keyVal[2]]
                        );
                    }
                }
            }
        }

        $keysToCheck = [];
        foreach ($request->except('_token', '_method', 'name',
         'preparation_time','preparation_difficulty', 'preparation_desc') as $key => $part) {
            $keyVal = explode('_', $key);
            $keysToCheck[$keyVal[0]] = 'on';
        }
        // If an ingredient field left unchecked then delete it from pivot table
        foreach($ingredients as $ingredient)
        {
            if(!array_key_exists($ingredient->name, $keysToCheck))
            {
                FoodIngredient::where([['ingredient_id', '=', $ingredient->id],
                                        ['food_id', '=', $food->id]])->delete();
            }
        }
    }
}
