@extends('layouts.app')
@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
    @endif
    <hr class="divider">

	<div class="row">

		<div class="col-md-4">
			<h2 class="text-center">Team 1</h2>
			<img class="rounded img-fluid icone" src="{{asset('img/hcoin_avec_etincelles.png')}}" alt="Icone Team 1">

		</div>
		<div class="col-md-4 text-center">
			VS
		</div>
		<div class="col-md-4">
			<h2 class="text-center">Team 2</h2>

			<img class="rounded img-fluid icone" src="{{asset('img/hcoin_avec_etincelles.png')}}" alt="Icone Team 2">
		</div>

	</div>

	<hr class="divider">


	<div class="row text-center">
		@foreach($bet_type as $bet)
            <div class="col-md-3">
    			<button type="button" class="btn btn-outline-primary disabled">{{$rand = (rand(100,250) / 100)}}</button>
                <a href="{{route('bet-add', ['type' => $bet->id, 'gameId' => $match->gameId, 'betTeam' =>  100, 'cote' => $rand])}}" style="color:#fff"><button type="button" class="btn btn-primary">Je parie</button></a>
    		</div>
    		<div class="col-md-6">
    			{{ $bet->name}}
    		</div>
    		<div class="col-md-3">
    			<button type="button" class="btn btn-outline-danger disabled">{{$rand = (rand(100,250) / 100)}}</button>
                <a href="{{route('bet-add', ['type' => $bet->id, 'gameId' => $match->gameId, 'betTeam' =>  200, 'cote' => $rand])}}" style="color:#fff"><button type="button" class="btn btn-danger">Je parie</button></a>
    		</div>
        @endforeach
	</div>

	<hr class="featurette-divider">
    <div class="row">
        <div class="col-md-6 text-center">
			<h2>Description du match</h2>
            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur gravida nunc vel gravida sollicitudin. Sed vitae porttitor leo. Ut arcu magna, egestas vitae iaculis in, facilisis id mi. Nam iaculis ex nec sodales semper. Morbi nibh eros, lacinia sodales fermentum nec, congue a ipsum. Integer ultrices fringilla vestibulum. Integer eu velit aliquet, pulvinar nibh sit amet, hendrerit quam. Mauris euismod sem orci, vitae viverra elit gravida molestie. Nam scelerisque justo dui, id commodo lectus viverra ut. Etiam placerat vestibulum elit sit amet venenatis. Pellentesque ornare turpis bibendum mi mollis, eget finibus sapien aliquet. Donec vehicula, nibh sit amet volutpat sagittis, nisi enim eleifend dolor, vel pulvinar erat lacus id augue. </p>
		</div>
		<div class="col-md-6 text-center">
			<h2>Video en direct</h2>
            <iframe
                src="http://player.twitch.tv/?channel=solary"
                height="<height>"
                width="<width>"
                frameborder="<frameborder>"
                scrolling="<scrolling>"
                allowfullscreen="<allowfullscreen>">
            </iframe>
		</div>
    </div>
    <hr class="featurette-divider">
    <div class="row">
        <a href="{{route('riot-result', ['gameId' => $match->gameId])}}" style="color:#fff" class="self-align-center"><button type="button" class="btn btn-danger">Résultats</button></a>
    </div>
</div>






        <!-- /END THE FEATURETTES -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-1.11.3.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.js"></script>

	<script src="JS/main.js"></script>
</body>
</html>

@endsection
