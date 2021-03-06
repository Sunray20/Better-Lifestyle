<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateIngredientRequest;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;

class IngredientController extends Controller
{

    public function searchIngredients(Request $request)
    {
        $ingredients = Ingredient::where('name', 'like', '%' . $request->input('name'). '%')->get('name');


        return $ingredients;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // First it should search in DB then make an API call
        $ingredientName = $request->input('search');
        if(!empty($ingredientName))
        {
            $ingredients = Ingredient::where('name', 'like', '%'.$ingredientName.'%')->simplePaginate(4);
            if($ingredients->isEmpty())
            {
                $client = new Client();
                $res = $client->request('GET', 'https://api.spoonacular.com/food/ingredients/search?query='.$ingredientName.'&apiKey='.env('FOOD_API_KEY'));
                $decodedResults = json_decode($res->getBody())->results;
                if($decodedResults)
                {
                    // The API gives back false results so only use the first one
                    // Thats the most accurate

                    // send a new request for the details of the ingredient
                    $res = $client->request('GET', 'https://api.spoonacular.com/food/ingredients/'.$decodedResults[0]->id.'/information?amount=100&unit=grams&apiKey='.env('FOOD_API_KEY'));

                    if($res->getStatusCode() == 200) {
                        $decodedVal = json_decode($res->getBody());
                        $decodedNutritions = $decodedVal->nutrition;

                        $ingredient = new Ingredient();
                        $ingredient->name = $decodedVal->name;
                        $ingredient->user_id = auth()->user()->id;
                        $ingredient->amount = 100; // Always search for 100 (grams)
                        $ingredient->validated = 1;
                        $ingredient->unit = (in_array($decodedVal->unitShort, ['g', 'mL', 'dL', 'pound'])) ? $decodedVal->unitShort : 'g';;

                        foreach($decodedNutritions->nutrients as $key => $nutrient)
                        {
                            switch($nutrient->title)
                            {
                                case 'Calories':
                                    $ingredient->calorie = $nutrient->amount;
                                    break;
                                case 'Protein':
                                    $ingredient->protein = $nutrient->amount;
                                    break;
                                case 'Carbohydrates':
                                    $ingredient->carb = $nutrient->amount;
                                    break;
                                case 'Fat':
                                    $ingredient->fat = $nutrient->amount;
                                    break;
                            }
                        }
                        $ingredient->save();
                        $ingredients = Ingredient::where('name', 'like', '%'.$ingredientName.'%')->simplePaginate(4); //Not the best
                        return view('ingredient.index', ['ingredients' => $ingredients]);
                    }
                }
            }
        }
        else
        {
            $ingredients = Ingredient::simplePaginate(4);
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
    public function store(ValidateIngredientRequest $request)
    {
        $ingredient = new Ingredient();
        $ingredient->fill($request->validated());

        // Store image
        if(!empty($request->image))
        {
            $imageName = time(). '-' . $request->validated('name')['name'] . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $ingredient->image_path = $imageName;
        }

        // If admin adds the ingredient it is automatically considered valid
        if(auth()->user()->is_admin == 1)
        {
            $ingredient->validated = true;
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
    public function update(ValidateIngredientRequest $request, Ingredient $ingredient)
    {
        $ingredient->fill($request->validated());
        // TODO: Move image storing into seperate helper class

        // Only store the image if a new one was added
        if(!empty($request->image))
        {
            // If an old image exists then delete it
            if($ingredient->image_path) {
                unlink(public_path() . '/images/' . $ingredient->image_path);
            }
            $imageName = time(). '-' . $request->validated('name')['name'] . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $ingredient->image_path = $imageName;
        }

        // If admin clicked validation checkbox
        if (auth()->user()->is_admin) {
            if ($request->input('validated') == true) {
                $ingredient->validated = true;
            } else {
                $ingredient->validated = false;
            }
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
            // If an image exists for resource then delete it
            if($ingredient->image_path) {
                unlink(public_path() . '/images/' . $ingredient->image_path);
            }
            $ingredient->delete();
        }

        return redirect('/ingredients');
    }
}
