@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

			<h1 class="text-center">Tournois : {{ $tournament['name']}}	</h1>
			<h2 class="text-center">Ajoutés les données</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					Database
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
							  <tr>
								<th>Match</th>
								<th>Equipe Une</th>
								<th>Url Equipe Une</th>
								<th>Equipe Deux</th>
								<th>Url Equipe Deux</th>
								<th>Date Début</th>
							  </tr>
							</thead>
							<tbody>
								@foreach ($matches as $match)
									<tr>
										<td>{{ $match['team_one'] }} VS {{ $match['team_two'] }}</td>
										<td>{{ $match['team_one_tag'] }}</td>
										<td>{{ $match['team_one_url'] }}</td>
										<td>{{ $match['team_two_tag'] }}</td>
										<td>{{ $match['team_two_url'] }}</td>
										<td>{{ $match['begin_at'] }}</td>
									</tr>
								@endforeach
							</tbody>
						  </table>
					</div>
				</div>
				<div class="panel-footer">
                    <a href="{{ route('admin.add-tournament', [ 'id' => $tournament['id']])}}">Ajouter le tournois</a>
					<a href="{{route('admin.add-tournament-match-all', ['id' => $tournament['id']])}}">Ajouter tout les matchs</a>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
