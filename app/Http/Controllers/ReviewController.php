<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard', [
            'lists_played' => Review::where(['id_user'=> auth()->user()->id, 'list_type' => 1])->paginate(4),
            'lists_playing' => Review::where(['id_user'=> auth()->user()->id, 'list_type' => 2])->paginate(4),
            'lists_toPlay' => Review::where(['id_user'=> auth()->user()->id, 'list_type' => 3])->paginate(4)
        ]);
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
        $validated = $request->validate(
            [
                'game_id' => 'required|numeric',
                'list' => 'required|numeric|min:0|max:3',
                'score' => 'numeric|min:0|max:10',
                'message' => 'max:5000'
            ],
            [
                'list' => 'Something went wrong, please try again after refreshing the page',
                'score' => 'Min value: 0, Max value: 10',
                'message' => 'Max 5000 characters'
            ]
        );

        $isExist = Review::where([
            'id_user'=> auth()->user()->id,
            'id_game'=> $request->game_id,
        ])->first();
        if(!$isExist){
            Review::create([
                'id_user'=> auth()->user()->id,
                'id_game'=> $request->game_id,
                'score' => $request->score ? $request->score : 0,
                'message' => $request->message ? $request->message : '',
                'list_type' => $request->list
            ])->save();
            return back()->with('status', 'List updated');
        } else {
            $isExist = Review::where([
                'id_user'=> auth()->user()->id,
                'id_game'=> $request->game_id,
            ])->update([
                'id_user'=> auth()->user()->id,
                'id_game'=> $request->game_id,
                'score' => $request->score ? $request->score : 0,
                'message' => $request->message ? $request->message : '',
                'list_type' => $request->list
            ]);
            return back()->with('status', 'List updated');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
