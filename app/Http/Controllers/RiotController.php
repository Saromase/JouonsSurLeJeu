<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\RiotMatchs;

use Auth;

use Illuminate\Support\Facades\DB;


class RiotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
	{
		$matchs = RiotMatchs::get();
		return view('riot.index', ['matchs'=> $matchs]);
	}

    public function displayMatchDetails($gameId)
    {
        $matchs = RiotMatchs::where('game_id','=',$gameId)->get();
        $url = 'https://euw1.api.riotgames.com/lol/match/v3/matches/';
        $gameDatas = [];
        foreach ($matchs as $match) {
    		$data = RiotMatchs::getGameDatas($match->game_id,$url);
            array_push($gameDatas, $data);
        }
        return view('riot.match', [
            'match' => $gameDatas[0],
            'bet_type' => DB::table('bet_type')->get()
        ]);
    }

    public function displayMatchResult($gameId)
    {
        $matchs = RiotMatchs::where('game_id','=',$gameId)->get();
        $url = 'https://euw1.api.riotgames.com/lol/match/v3/matches/';
        $gameDatas = [];
        foreach ($matchs as $match) {
    		$data = RiotMatchs::getGameDatas($match->game_id,$url);
            array_push($gameDatas, $data);
        }

        $userBet = DB::table('user_bets as ub')
			->where([
				['user_id', '=', Auth::id()],
				['states' ,'=', 1],
                ['game_id', '=', $gameId]
			])
			->join('bet_type as bt', 'ub.bet_type', '=', 'bt.id')
			->select('ub.*', 'bt.name as bt_name')
			->get();


        return view('riot.result', [
            'datas' => $gameDatas[0],
            'bets' => $userBet
        ]);
    }
}
