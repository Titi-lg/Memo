<?php

use App\Http\Controllers\CardController;
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

Route::get('/', function () {
    return view('home');
});
Route::get('/ajouterCard', function () {
    return view('vues/ajouterCard');
});
Route::post('/postCard',[CardController::class, 'postAjouterCard']);
Route::get('/CardWordToday',[CardController::class,'getCardWordToday']);
Route::get('/CardSentenceToday',[CardController::class,'getCardSentenceToday']);
Route::get('/CardLessonToday',[CardController::class,'getCardLessonToday']);
Route::get('/FinishCard/{id}',[CardController::class, 'finishCard']);
