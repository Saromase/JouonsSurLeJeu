@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
			@foreach ($tournaments as $tournament)
			<div class="panel panel-default">
                <div class="panel-heading"><a href="{{ route('tournament.all-match', ['id'=> $tournament->panda_id])}}">Tournois : {{ ucwords(str_replace('-', ' ', $tournament->serie)) }}</a></div>
                <div class="panel-body">
                    <img src="{{ $tournament->url}}" alt="{{$tournament->serie}}" class="img-responsive">
                </div>
                <div class="panel-footer">
                    Date : du {{ $tournament->begin_at}} au {{ $tournament->end_at	}}
                </div>
            </div>
			@endforeach
        </div>
    </div>
</div>
@endsection
