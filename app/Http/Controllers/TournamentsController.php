<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\Tournament;
use App\Matchs;

class TournamentsController extends Controller
{
    public function __construct()
	{
		$this->middleware('guest');
	}

	public function displayAllTournaments()
	{
		return view('tournament.display-all',[
			'tournaments' => Tournament::get()
		]);
	}

	public function displayAllTournamentsMatch($id)
	{
        return view('tournament.display-all-match', [
            'matchs' => Matchs::where('panda_id', '=', $id)->get()
        ]);
	}

    public function displayOneMatch($id, $match_id)
    {

        return view('tournament.display-one-match', [
            'match' => matchs::where('match_id', '=', $match_id)->get()->first(),
        ]);
    }
}
