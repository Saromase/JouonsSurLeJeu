@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Database
				</div>
				<div class="panel-body">
					<a href="{{route('admin.tournament')}}">Liste des tournois</a>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
