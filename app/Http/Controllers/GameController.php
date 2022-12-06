<?php

namespace App\Http\Controllers;

use App\Models\Game;
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
           'games' => Game::paginate(16)
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

        if(!$isExist)
            $request->user()->games()->create($validated);
        else
            return back()->with('status', 409);

        return redirect('/dashboard')->with('status', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
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
