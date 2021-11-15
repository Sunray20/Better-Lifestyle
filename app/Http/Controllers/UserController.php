<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DietType;
use App\Models\DietTypeUser;
use App\Http\Requests\ValidateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', ['user' => $user,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $selectedDietTypes = $user->dietTypes;
        $unselectedDietTypes = DietType::all();
        $unselectedDietTypes = $unselectedDietTypes->diff($selectedDietTypes);
        return view('user.edit', ['user' => $user, 'unselectedDietTypes' => $unselectedDietTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateUserRequest $request, User $user)
    {
        $targetKcal = 2000;
        $user->fill($request->validated());
        $user->save();
        // TODO: Target calorie should be calculated
        /*$user->update([
            'unit' => $request->input('unit'),
            'height' =>
            'weight' => $request->input('weight'),
            'target_weight' => $request->input('target_weight'),
            'diet_goal' => $dietGoal,
            'target_kcal' => $targetKcal
        ]);*/

        $dietTypes = DietType::all();

        // TODO: move it to a function
        // Iterate through every input field
        foreach($request->all() as $key => $item)
        {
            foreach($dietTypes as $dietType)
            {
                // If the field's name is equal to the dietType->name
                if($key == $dietType->name)
                {
                    // And if the checkbox was checked then insert new
                    // user <-> dietType connection
                    if($request->input($key) == true) {
                        DietTypeUser::updateOrCreate(
                            ['diet_type_id' => $dietType->id, 'user_id' => $user->id],
                        );
                    }
                }
            }
        }

        // If an excercise field left unchecked then delete it from pivot table
        foreach($dietTypes as $dietType)
        {
            if($request->get($dietType->name) == null)
            {
                DietTypeUser::where([['diet_type_id', '=', $dietType->id],
                                              ['user_id', '=', $user->id]])->delete();
            }
        }

        return redirect('/user/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //If the user deletes it's profile he should be logged out
        $user->delete();

        return redirect('/logout');
    }
}
