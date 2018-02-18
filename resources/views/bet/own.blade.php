@extends('layouts.app')

@section('content')
@if (session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
@endif
<div class="container">
	<div class="divider"></div>
	<div class="row">
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
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($bets as $bet)
						@if ($bet->states == 0)
							<tr class="bg-info">
						@elseif ($bet->states == 1)
							<tr class="bg-warning">
						@elseif ($bet->states == 2)
							<tr class="bg-success">
						@elseif ($bet->states == 3)
							<tr class="bg-danger">
						@endif
						<td>#<a href="{{route('riot-match', ['id' => $bet->game_id])}}" style="color:#fff">{{ $bet->game_id }}</a></td>
						<td>{{$bet->bt_name}}</td>
						<td>{{ $bet->bet_team}}</td>
						<td>{{$bet->bet}}</td>
						<td>{{$bet->cote}}</td>
						<td>
							@if ($bet->states == 0)
								Inactif
							@elseif ($bet->states == 1)
								Actif
							@elseif ($bet->states == 2)
								Gagné
							@elseif ($bet->states == 3)
								Désactivé
							@endif
						</td>
					<td>        <a href="{{route('riot-result', ['gameId' => $bet->game_id])}}" style="color:#fff" class="self-align-center">Les résultats</a></td>					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>



@endsection
