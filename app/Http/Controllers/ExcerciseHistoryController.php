<?php

namespace App\Http\Controllers;

use App\Models\ExcerciseHistory;
use App\Models\Excercise;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateExcerciseHistoryRequest;

class ExcerciseHistoryController extends Controller
{
    public function myRoutine()
    {
        $monday = date( 'Y-m-d', strtotime( 'monday this week' ) );
        $sunday = date( 'Y-m-d', strtotime( 'sunday this week' ) );

        $myRoutine = ExcerciseHistory::where('user_id', auth()->user()->id)
                                    ->whereBetween('date', [$monday, $sunday])
                                    ->get();

        // Get all excercises
        $excercises = Excercise::all();

        $data = array();
        $j = 0;
        $maxCount = 0;

        for($i = 0; $i < 7; $i++)
        {
            $dateForIteration = date('Y-m-d', strtotime($monday . ' +' . $i .' days'));
            foreach($myRoutine as $item)
            {
                if($dateForIteration == $item->date)
                {
                    $data[$dateForIteration][$j] = array();
                    array_push($data[$dateForIteration][$j], $item);
                    $j++;

                    if($maxCount < $j) {
                        $maxCount = $j;
                    }
                }
            }
            $j = 0;
        }



        return view('excercise-history.my-routine',
                ['monday' => $monday,
                 'data' => $data,
                 'maxCount' => $maxCount,
                 'excercises' => $excercises]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $excerciseHistories = ExcerciseHistory::where('user_id', auth()->user()->id)->get();

        return view('excercise-history.index', ['excerciseHistories' => $excerciseHistories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateExcerciseHistoryRequest $request)
    {
        $excerciseHistory = new ExcerciseHistory();
        $excerciseHistory->fill($request->validated());
        $excerciseHistory->user_id = auth()->user()->id;
        $excerciseHistory->save();

        return redirect('/my-routine');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExcerciseHistory  $excerciseHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(ExcerciseHistory $excerciseHistory)
    {
        return view('excercise-history.edit', ['excerciseHistory' => $excerciseHistory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExcerciseHistory  $excerciseHistory
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateExcerciseHistoryRequest $request, ExcerciseHistory $excerciseHistory)
    {
        $excerciseHistory->fill($request->validated());
        $excerciseHistory->save();

        return redirect('/my-routine');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExcerciseHistory  $excerciseHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExcerciseHistory $excerciseHistory)
    {
        $excerciseHistory->delete();

        return redirect('/my-routine');
    }
}
