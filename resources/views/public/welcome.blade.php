@extends('layouts.app')

@section('content')
<style>

    #demo {
        width: auto;
    }
</style>

<div class="container">
    <div class="row" style="margin: auto; margin-left: 10%">
        <img class="img-fluid" src="{{ asset('img/presentation.png')}}" alt="Chania" width="80%">
    </div>
    <hr class="divider">
    <div class="row">
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/hcoin_sans_etincelles.png')}}" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">Découvrir le concept</h4>
                    <p class="card-text">Prennez le temps de découvrir la présentation que l'on a préparer pour le jury du Hackathon</p>
                    <a href="{{ route('public.team')}}" class="btn btn-primary">Regarder</a>
                </div>
            </div>
        </div>
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('img/hcoin_no_color_sans_etincelles.png')}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Découvrir</h4>
                        <p class="card-text">Vous pouvez vous connectez en vous inscrivant (Aucun e-mail envoyé ni vérifié) ou utiliser un login pré-définis. <br>
                            Login : utilisateur <br>
                            Mot de passe : utilisateur
                        </p>
                        <a href="{{route('login')}}" class="btn btn-primary">Se connecter</a>
                        <a href="{{route('register')}}" class="btn btn-primary">S'inscrire</a>
                    </div>
                </div>
            </div>

    </div>

</div>

@endsection
