<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('games', [
           'games' => Game::paginate(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
                'name' => 'required',
                'image' => 'required|url',
                'description' => 'required|max:5000',
                'date_release' => 'required|date|'
            ],
            [
                'name.required' => 'This field is required',
                'date_release.required' => 'This field is required',
                'date_release.date' => 'Wrong date format',
                'image.required' => 'This field is required',
                'image.url' => 'Wrong link to image',
                'description.required' => 'This field is required',
                'description.max' => 'Too long description',
            ]
        );

        $isExist = Game::where([
            ['name', '=' , $validated['name']],
            ['date_release', '=' , $validated['date_release']]
        ])->first();

        if($isExist) {
            return back()->with('error', 'game exist');
        } else {
            $request->user()->games()->create($validated);
            return redirect()->to('/dashboard')->with('status', 'The game was created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game, $id)
    {
        $list = Review::where(['id_user'=> auth()->user()->id, 'id_game' => $id])->first();
        $singleGame = Game::find($id);
        if($singleGame) {
            if($list){
                return view('game', [
                    'game' => $singleGame,
                    'list' => $list
                ]);
            } else {
                return view('game', [
                    'game' => $singleGame,
                    'list' => null
                ]);
            }
        } else {
            return redirect('/games');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
