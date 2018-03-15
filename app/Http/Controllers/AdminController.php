<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\Tournament;
use App\Matchs;



class AdminController extends Controller
{
    public function index()
	{
		return view('admin.index');
	}

	public function displayTournament()
	{
		$client = new Client();

		$url = 'https://api.pandascore.co/videogames/1/tournaments';

		$res = $client->request('GET', $url,[
			'query' => [
				'token' => 'RGAPI-ee6b8316-f25c-4355-a68a-1906afbff167'
			]
		]);
		$response = json_decode($res->getBody());
		$tournaments = [];
		foreach($response as $key => $value)
		{
			$begin = explode('T', $value->begin_at);
			$end = explode('T', $value->end_at);
			array_push($tournaments,[
				'panda_id' => $value->id,
				'name' => $value->name,
				'serie' => $value->serie->slug,
				'begin_at' => $begin[0],
				'url' => $value->league->image_url,
				'end_at' => $end[0]
			]);
		}
		return view('admin.add-tournament',[
			'tournaments' => $tournaments
		]);
	}

	public function addOneTournament($id)
	{
		$client = new Client();

		$url = 'https://api.pandascore.co/videogames/1/tournaments/';

		$res = $client->request('GET', $url,[
			'query' => [
				'filter[id]' => $id,
				'token' => 'RGAPI-ee6b8316-f25c-4355-a68a-1906afbff167'
			]
		]);
		$response = json_decode($res->getBody());

		$begin = explode('T', $response[0]->begin_at);
		$end = explode('T', $response[0]->end_at);
		Tournament::create([
			'panda_id' => $response[0]->id,
			'name' => $response[0]->name,
			'serie' => $response[0]->serie->slug,
			'url' => $response[0]->league->image_url,
			'begin_at' => $begin[0],
			'end_at' => $end[0]
		]);
		$message = 'Vous avez bien ajouté le tournois '.$response[0]->serie->slug;
		return back()->with('success', $message);
	}

	public function displayTournamentMatch($id)
	{
		$client = new Client();

		$url = 'https://api.pandascore.co/tournaments/'.$id.'/matches';

		$res = $client->request('GET', $url,[
			'query' => [
				'token' => 'RGAPI-ee6b8316-f25c-4355-a68a-1906afbff167'
			]
		]);
		$response = json_decode($res->getBody());
		$matches = [];
		$tournament =  [
			'name' => $response[0]->serie->slug,
			'id' => $response[0]->tournament_id,
		];
		foreach($response as $key => $value)
		{
			$begin = explode('T', $value->begin_at);

			array_push($matches,[
				'match_id' => $value->id,
				'team_one' => $value->opponents[0]->opponent->name,
				'team_one_tag' => $value->opponents[0]->opponent->acronym,
				'team_one_url' => $value->opponents[0]->opponent->image_url,
				'team_two' => $value->opponents[1]->opponent->name,
				'team_two_tag' => $value->opponents[1]->opponent->acronym,
				'team_two_url' => $value->opponents[1]->opponent->image_url,
				'begin_at' => $begin[0]
			]);
		}

		return view('admin.add-match',[
			'matches' => $matches,
			'tournament' => $tournament
		]);
	}

	public function addAllMatch($id)
	{
		$client = new Client();

		$url = 'https://api.pandascore.co/matches';

		$res = $client->request('GET', $url,[
			'query' => [
				'filter[tournament_id]' => $id,
				'token' => 'RGAPI-ee6b8316-f25c-4355-a68a-1906afbff167'
			]
		]);
		$response = json_decode($res->getBody());

		$begin = explode('T', $response[0]->begin_at);
		foreach ($response as $value) {
			Matchs::create([
				'panda_id' => $id,
				'match_id' => $value->id,
				'team_one' => $value->opponents[0]->opponent->name,
				'team_one_tag' => $value->opponents[0]->opponent->acronym,
				'team_one_url' => $value->opponents[0]->opponent->image_url,
				'team_two' => $value->opponents[1]->opponent->name,
				'team_two_tag' => $value->opponents[1]->opponent->acronym,
				'team_two_url' => $value->opponents[1]->opponent->image_url,
				'begin_at' => $begin[0]
			]);
		}
		$message = 'Vous avez bien ajouté les matchs du tournois '.$response[0]->serie->slug;
		return back()->with('success', $message);
	}
}
