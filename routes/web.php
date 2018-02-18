<?php

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
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('tournament')->group(function(){
    Route::get('/', 'TournamentsController@displayAllTournaments')->name('tournament.all');
    Route::get('/{id}/matchs', 'TournamentsController@displayAllTournamentsMatch')->name('tournament.all-match');
    Route::get('/{id}/matchs/{match_id}', 'TournamentsController@displayOneMatch')->name('tournament.one-match');
});

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/tournaments', 'AdminController@displayTournament')->name('admin.tournament');
    Route::get('/tournaments/{id}', 'AdminController@addOneTournament')->name('admin.add-tournament');
    Route::get('/tournaments/{id}/matchs', 'AdminController@displayTournamentMatch')->name('admin.add-tournament-match');
    Route::get('/tournaments/{id}/matchs/all', 'AdminController@addAllMatch')->name('admin.add-tournament-match-all');
});

Route::prefix('riot')->group(function(){
    Route::get('/', 'RiotController@index')->name('riot-index');
    Route::get('/match/{id}', 'RiotController@displayMatchDetails')->name('riot-match');
    Route::get('/result/{id}', 'RiotController@displayMatchResult')->name('riot-result');
});

Route::prefix('bet')->group(function(){
    Route::get('/{gameId}/{type}/{betTeam}/{cote}', 'BetController@addBet')->name('bet-add');
    Route::get('/own/', 'BetController@myBets')->name('bet-own');
    Route::get('/sell/{id}', 'BetController@sellBet')->name('bet-sell');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
