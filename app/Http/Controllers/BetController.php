<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use Auth;

use App\UserBets;
use App\User;

class BetController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

    /* States =>
        0 => inactif
        1 => actif
        2 => win
        3 => disabled
        */
	public function myBets()
	{
		$userBet = DB::table('user_bets as ub')
			->where([
				['user_id', '=', Auth::id()]
			])
			->join('bet_type as bt', 'ub.bet_type', '=', 'bt.id')
			->select('ub.*', 'bt.name as bt_name')
			->get();

		return view('bet.own', [
			'bets' => $userBet

		]);
	}

	public function addBet($gameId, $betType, $team, $cote)
	{
		$user = User::where('id', '=', Auth::id())->get()->first();
		if ($user->H_Coin >= 10){
			UserBets::create([
				'user_id' => Auth::id(),
				'bet_type' => $betType,
				'game_id' => $gameId,
				'bet_team' => $team,
				'cote' => $cote,
				'bet' => 10,
				'states' => 1
			]);
			$newAmount = $user->H_Coin - 10;
			User::where('id','=', Auth::id())
				->update([
					'H_Coin' => $newAmount
			]);
			$message = 'Vous avez bien parier sur : '.'Team'.$team.' pour le montant de 10';
			$message .= ' avec le paris suivant : '.DB::table('bet_type')->where('id', '=', $betType)->get()->first()->name;
			return back()->with('success', $message);

		} else {
			$message = 'Vous n\'avez pas assez de H-Coin';
			return back()->with('fail', $message);
		}

	}

	public function sellBet($id)
	{
		$user = User::where('id', '=', Auth::id())->get()->first();
		$userBet = UserBets::where('id', '=', $id)->get()->first();
		$HC = $user->H_Coin;
		$newAmount = $HC + (10 * $userBet->cote);
		$user->setHCoin($newAmount);
		UserBets::where('id', '=', $id)->update([
			'states' => 2
		]);
		User::where('id', '=', Auth::id())->update([
			'H_Coin' => $user->H_Coin
		]);

		$message = 'Vous avez bien recupérer votre gain de '.(10 * $userBet->cote).' H-Coin';
		return back()->with('success', $message);
	}

    public function disabledBet($id)
    {
        $user = User::where('id', '=', Auth::id())->get()->first();
		$userBet = UserBets::where('id', '=', $id)->get()->first();
		UserBets::where('id', '=', $id)->update([
			'states' => 3
		]);
        $message = 'Votre paris à bien était désactivé';
		return back()->with('fail', $message);
    }
}
