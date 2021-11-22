<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use App\Models\Food;
use App\Http\Requests\ValidateDietRequest;
use Illuminate\Http\Request;

class DietController extends Controller
{

    public function myDiet()
    {
        $monday = date( 'Y-m-d', strtotime( 'monday this week' ) );
        $sunday = date( 'Y-m-d', strtotime( 'sunday this week' ) );

        $myDiet = Diet::where('user_id', auth()->user()->id)
                                    ->whereBetween('date', [$monday, $sunday])
                                    ->get();

        // Get all foods
        // TODO: Change this solution for a searchbar + ajax request one
        $foods = Food::all();

        $data = array();
        $j = 0;
        $maxCount = 0;
        $macros = array();

        for($i = 0; $i < 7; $i++)
        {
            $dateForIteration = date('Y-m-d', strtotime($monday . ' +' . $i .' days'));
            foreach($myDiet as $item)
            {
                if($dateForIteration == $item->date)
                {
                    $data[$dateForIteration][$j] = array();
                    array_push($data[$dateForIteration][$j], $item);
                    $j++;

                    // Push macros
                    if(array_key_exists($dateForIteration, $macros))
                    {
                        $macros[$dateForIteration]->calorie += $item->food->getMacroes()->calorie;
                        $macros[$dateForIteration]->protein += $item->food->getMacroes()->protein;
                        $macros[$dateForIteration]->carb += $item->food->getMacroes()->carb;
                        $macros[$dateForIteration]->fat += $item->food->getMacroes()->fat;
                    } else {
                        $macros[$dateForIteration] = new \stdClass();
                        $macros[$dateForIteration]->calorie = $item->food->getMacroes()->calorie;
                        $macros[$dateForIteration]->protein = $item->food->getMacroes()->protein;
                        $macros[$dateForIteration]->carb = $item->food->getMacroes()->carb;
                        $macros[$dateForIteration]->fat = $item->food->getMacroes()->fat;
                    }

                    if($maxCount < $j) {
                        $maxCount = $j;
                    }
                }
            }
            $j = 0;
        }
        return view('diet.my-diet',
                ['monday' => $monday,
                 'data' => $data,
                 'maxCount' => $maxCount,
                 'macros' => $macros,
                 'foods' => $foods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateDietRequest $request)
    {
        $diet = new Diet();
        $diet->fill($request->validated());
        $diet->user_id = auth()->user()->id;
        $diet->save();

        return redirect('/my-diet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diet  $diet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diet $diet)
    {
        $diet->delete();

        return redirect('/my-diet');
    }
}
