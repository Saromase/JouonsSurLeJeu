@extends('layouts.app')

@section('content')
<div class="container">
	@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
    @endif
	<div class="divider"></div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 text-center">
			<h2>Vainqueur</h2>
			<h3>{{ ($datas->teams[0]->win == 'Fail')? 'Team 200' : 'Team 100' }}</h3>
		</div>
	</div>
	<div class="divider"></div>
	<div class="row">
		<div class="col-md-5">
			Team 100
			<table class="table ">
				<thead>
					<tr>
						<th>Name</th>
						<th>Kill</th>
						<th>Death</th>
						<th>Assist</th>
						<th>Role</th>
					</tr>
				</thead>
				<tbody>
					@for ($i = 0; $i < 5; $i++)
					<tr>
						<td>{{ $datas->participantIdentities[$i]->player->summonerName }}</td>
						<td>{{ $datas->participants[$i]->stats->kills }}</td>
						<td>{{ $datas->participants[$i]->stats->deaths }}</td>
						<td>{{ $datas->participants[$i]->stats->assists }}</td>
						<td>{{ $datas->participants[$i]->timeline->role }} {{ $datas->participants[$i]->timeline->lane }}</td>
					</tr>
					@endfor
				</tbody>
			</table>
		</div>
		<div class="col-md-2">

		</div>
		<div class="col-md-5">
			Team 200
			<table class="table ">
				<thead>
					<tr>
						<th>Name</th>
						<th>Kill</th>
						<th>Death</th>
						<th>Assist</th>
						<th>Role</th>
					</tr>
				</thead>
				<tbody>
					@for ($i = 5; $i < 10; $i++)
					<tr>
						<td>{{ $datas->participantIdentities[$i]->player->summonerName }}</td>
						<td>{{ $datas->participants[$i]->stats->kills }}</td>
						<td>{{ $datas->participants[$i]->stats->deaths }}</td>
						<td>{{ $datas->participants[$i]->stats->assists }}</td>
						<td>{{ $datas->participants[$i]->timeline->role }} {{ $datas->participants[$i]->timeline->lane }}</td>
					</tr>
					@endfor
				</tbody>
			</table>
		</div>
	</div>
	<div class="divider"></div>
	<div class="row">
		<h1 class="align-self-center">Mes paris sur ce match</h1>
	</div>
	<div class="divider">

	</div>
	<div class="row">
		@if (count($bets) > 0)
		<div class="col align-self-center ">
			Team 100
			<table class="table ">
				<thead>
					<tr>
						<th>Game</th>
						<th>Type du paris</th>
						<th>Choix équipe</th>
						<th>Mise</th>
						<th>Cote</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($bets as $bet)
					<tr>
						<td>#<a href="{{route('riot-match', ['id' => $bet->game_id])}}">{{ $bet->game_id }}</a></td>
						<td>{{$bet->bt_name}}</td>
						<td>{{ $bet->bet_team}}</td>
						<td>{{$bet->bet}}</td>
						<td>{{$bet->cote}}</td>
						<td>
							@if($datas->teams[0]->win == 'Fail' && $bet->bet_team == 100 )
							<a href="{{route('bet-disabled', ['id'=>$bet->id])}}"><i class="fa fa-times" alt="Désactivé"></i></a>
							@elseif ($datas->teams[0]->win == 'Win' && $bet->bet_team == 100 )
							<a href="{{route('bet-sell', ['id'=>$bet->id])}}"><i class="fa fa-money" alt="Encaisé"></i></a>
							@elseif ($datas->teams[1]->win == 'Win' && $bet->bet_team == 200 )
							<a href="{{route('bet-sell', ['id'=>$bet->id])}}"><i class="fa fa-money" alt="Encaisé"></i></a>
							@elseif ($datas->teams[1]->win == 'Fail' && $bet->bet_team == 200 )
							<a href="{{route('bet-disabled', ['id'=>$bet->id])}}"><i class="fa fa-times" alt="Désactivé"></i></a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@else
		<div class="col align-self-center">
			<h3>Vous n'avez placé aucun paris sur ce match</h3>
		</div>
		@endif
	</div>
</div>

@endsection
