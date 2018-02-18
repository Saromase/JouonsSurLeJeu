<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class RiotMatchs extends Model
{
    protected $table = 'riot_players_play_match';

	protected $fillable = ['account_id', 'game_id', 'participant_id'];

    public static function getGameDatas($gameId,$url)
    {
        $client = new Client();

        $url .= $gameId;

        $token = 'RGAPI-ac7e2f6d-a873-48a3-af98-31f78996c7b7';

		$res = $client->request('GET', $url,[
			'query' => [
				'api_key' => $token
			]
		]);
		return json_decode($res->getBody());
    }
}
