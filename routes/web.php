<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\BudgetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataAnalysisController;

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

Route::get('/', [CardController::class, 'index']);
Route::get('/getnotice', [CardController::class,'getCardCount']);
Route::get('/ajouterCard', function () {
    return view('vues/ajouterCard');
});
Route::post('/postCard',[CardController::class, 'postAjouterCard']);
Route::get('/CardWordToday',[CardController::class,'getCardWordToday']);
Route::get('/CardSentenceToday',[CardController::class,'getCardSentenceToday']);
Route::get('/CardLessonToday',[CardController::class,'getCardLessonToday']);
Route::get('/FinishCard/{id}',[CardController::class, 'finishCard']);
Route::get('/RechercheCard',function (){
    return view('vues/RechercheCard');
});
Route::post('/search',[CardController::class, 'search']);
Route::get('/ModifierCard/{id}',[CardController::class, 'getModifierCard']);
Route::delete('deleteCard/{id}',[CardController::class, 'deletedCard']);
Route::post('/updateCard/{id}', ['uses' => 'App\Http\Controllers\CardController@updateCard','as' => 'updateCard']);
Route::get('/increment', [CardController::class, 'incrementCounter']);
Route::get('/graph/{id}',[CardController::class, 'graph']);
