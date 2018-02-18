@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
                <div class="panel-heading">{{ $match->team_one }} VS {{ $match->team_two}}</div>
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
        </div>
    </div>
</div>
@endsection
