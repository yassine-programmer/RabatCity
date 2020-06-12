@extends('layouts.app')
@section('css')
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <style>
        body {
            text-align: center;

        }
        .success {
            color: #88B04B;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
        }
        p {
            color: #404F5E;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size:20px;

        }
        i {
            color: #9ABC66;
            font-size: 100px;
            line-height: 200px;
            margin: 68px;
        }
        .card {
            padding: 60px;
            border-radius: 4px;
            box-shadow: 0 2px 3px #C8D0D8;
            display: inline-block;
            margin: 0 auto;
        }
    </style>
@endsection


@section('content')

    <div class="container align-items-center vertical-align-center" style="padding: 60px; margin: 0 auto;">
        <div class="align-items-center vertical-align-center" style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
            <div><i class="checkmark align-items-center vertical-align-center" >✓</i></div>
        </div>
        <div class="text-center">
            <h1 class="success">Compte deja verifie </h1>
            <p>Votre compte est deja verifie.<br/>Vous pouvez maintenant utiliser le site avec toute ces fonctionalites</p><br>
            <a href="/"><button class="btn btn-success w-50">Revenir vers la page d'accueil</button></a>
        </div>
    </div>
@endsection
