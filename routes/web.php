<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\GameController;
use App\Http\Controllers\Dashboard\TeamController;
use App\Http\Controllers\Dashboard\TournamentController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\TournamenthomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('pages.home.index');
// });

Auth::routes([
    'verify' => true
]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tournament-detail/{tournament}', [TournamenthomeController::class, 'detail'])->name('tournament-detail');
Route::get('/tournaments', [TournamenthomeController::class, 'list'])->name('tournaments');

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('pages.dashboard.index');
    });
    Route::resources([
        'game' => GameController::class,
        'team' => TeamController::class,
        'tournament' => TournamentController::class
    ]);
});
