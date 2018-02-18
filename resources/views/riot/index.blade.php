@extends('layouts.app')

@section('content')

<hr class="featurette-divider">
@foreach ($matchs as $match)
<div class="row ">
    <div class="col-md-3">
        <h2>Game #<a href="{{route('riot-match', ['id' => $match->game_id])}}">{{$match->game_id}}</a></h2>
         <span class="text-muted">It'll blow your mind.</span>
        <p >Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
    </div>
    <div class="col-md-2">
        <img class="rounded img-fluid icone" src="{{asset('img/hcoin_avec_etincelles.png')}}" alt="Icone Team 1">
    </div>
    <div class="col-md-2 text-center" >
        <p>
            VS.
        </p>
    </div>
    <div class="col-md-2">
        <img class="rounded img-fluid icone" src="{{asset('img/hcoin_avec_etincelles.png')}}" alt="Icone Team 1">
    </div>
    <div class="col-md-3">
        <h2>Game #<a href="{{route('riot-match', ['id' => $match->game_id])}}">{{$match->game_id}}</a></h2>
         <span class="text-muted">It'll blow your mind.</span>
        <p >Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
    </div>

</div>

<hr class="featurette-divider">
@endforeach

@endsection
