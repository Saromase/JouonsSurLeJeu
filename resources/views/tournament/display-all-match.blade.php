@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
			@foreach ($matchs as $match)
			<div class="panel panel-default">
                <div class="panel-heading"><a href="{{ route('tournament.one-match', ['id'=> $match->panda_id, 'match_id' => $match->match_id])}}">{{ $match->team_one }} VS {{ $match->team_two}}</a></div>
                <div class="panel-body">
                    <div class="col-md-5 col-md-offset-1">
                    	<img src="{{ $match->team_one_url}}"  class="img-responsive">
                    </div>
					<div class="col-md-5 col-md-offset-1">
                    	<img src="{{ $match->team_two_url}}"  class="img-responsive">
                    </div>
                </div>
                <div class="panel-footer">
                    Date : du {{ $match->begin_at}}
                </div>
            </div>
			@endforeach
        </div>
    </div>
</div>
@endsection
