<?php

namespace App\Http\Controllers;

use App\Models\ExcerciseHistory;
use Illuminate\Http\Request;

class ExcerciseHistoryController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExcerciseHistory  $excerciseHistory
     * @return \Illuminate\Http\Response
     */
    public function show(ExcerciseHistory $excerciseHistory)
    {
        //
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
    public function update(Request $request, ExcerciseHistory $excerciseHistory)
    {
        $excerciseHistory->update([
            'target_amount' => $request->input('target_amount'),
            'achieved_amount' => $request->input('achieved_amount'),
            'target_weight' => $request->input('target_weight'),
            'achieved_weight' => $request->input('achieved_weight')
        ]);

        return redirect('/excercise-history');
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

        return redirect('/excercise-history');
    }
}
