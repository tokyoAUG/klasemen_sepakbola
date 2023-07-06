<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\StandingController;

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

Route::get('/', [TeamController::class, 'index']);
Route::get('tambah-team', [TeamController::class, 'formTambahTeam']);
Route::post('tambah-team', [TeamController::class, 'add'])->name('tambah.team');
Route::get('pertandingan', [MatchController::class, 'index']);
Route::get('tambah-pertandingan', [MatchController::class, 'formTambahPertandingan']);
Route::get('tambah-pertandingan-multiple', [MatchController::class, 'formTambahPertandinganMulti']);
// Route::get('/get-teams/{groupId}', 'PertandinganController@getTeamsByGroup')->name('get-teams');
Route::get('/get-teams/{groupId}', [MatchController::class, 'getTeamsByGroup'])->name('get-teams');
Route::post('tambah-pertandingan', [MatchController::class, 'add']);
Route::post('tambah-pertandingan-multiple', [MatchController::class, 'addMultiple']);
Route::get('klasemen', [StandingController::class, 'index']);


