@extends('layouts.app')

@section('content')
<div class="container">
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
</div>
@endsection
