<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
      return Auth::check() ? view('welcome') :redirect()->route('login');
});

Route::get('/game/{id}', [GameController::class, 'show'])->name('game')->middleware('auth');

Route::get('/list/{name}', [ReviewController::class, 'myList'])->name('list')->middleware('auth');

Route::get('/dashboard', [ReviewController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard')->middleware('auth');

Route::get('/create-game', function () {
  return Auth::user()->is_admin ? view('create-game') : redirect()->route('dashboard');
})->name('create-game')->middleware('auth');

Route::get('/my-game/{id}', function ($id) {
    return  redirect()->to('/game/'.$id)->with('status', 'info');
  })->name('my-game')->middleware('auth');

Route::resource('games', GameController::class)
    ->only(['store'])
    ->middleware(['auth', 'verified']);

    Route::get('list-remove/{id}', [ReviewController::class, 'destroy'])->name('list-remove')->middleware('auth');

Route::resource('review', ReviewController::class)
->only(['store'])
->middleware(['auth', 'verified']);

Route::get('/games',[GameController::class, 'index'])->name('games')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
