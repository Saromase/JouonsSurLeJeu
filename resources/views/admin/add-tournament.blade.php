@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

			<h1 class="text-center">Ajouter les données</h1>
			<div class="panel panel-default">
				<div class="panel-heading">
					Database
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
						  <tr>
							<th>Type</th>
							<th>Nom</th>
							<th>Image Url</th>
							<th>Date début</th>
							<th>Date fin</th>
							<th>Actions</th>
						  </tr>
						</thead>
						<tbody>
							@foreach ($tournaments as $tournament)
								<tr>
									<td>{{$tournament['name']}}</td>
									<td>{{$tournament['serie']}}</td>
									<td>{{$tournament['url']}}</td>
									<td>{{$tournament['begin_at']}}</td>
									<td>{{$tournament['end_at']}}</td>
									<td>
										<a href="{{ route('admin.add-tournament', [ 'id' => $tournament['panda_id']])}}">
          									<span class="glyphicon glyphicon-plus"></span>
										</a>
                                        <a href="{{ route('admin.add-tournament-match', [ 'id' => $tournament['panda_id']])}}">
          									<span class="glyphicon glyphicon-asterisk"></span>
										</a>
									</td>


								</tr>
							@endforeach
						</tbody>
					  </table>

				</div>
            </div>
        </div>
    </div>
</div>
@endsection
