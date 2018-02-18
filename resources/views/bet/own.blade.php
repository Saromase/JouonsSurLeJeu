@extends('layouts.app')

@section('content')
@if (session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
@endif
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
					<td><a href="{{route('bet-sell', ['id'=>$bet->id])}}"><i class="fa fa-money"></i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>



@endsection
