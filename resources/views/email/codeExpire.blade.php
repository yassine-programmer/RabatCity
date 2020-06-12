@extends('layouts.app')
@section('css')
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <style>
        body {
            text-align: center;

        }
        .success {
            color: #DF4747;
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

    <div class="container align-items-center vertical-align-center" style="padding: 70px; margin: 0 auto;">
        <div class="d-flex align-items-center justify-content-center  " style="border-radius:200px; height:250px; width:250px; background: #F8FAF5; margin:0 auto; ">
            <img src="../img/emoji.png">
        </div>
        <div class="text-center">
            <h1 class="success ">Desole</h1>
            Ce lien de confirmation est juste, mais <b>expire</b> a cause des mauvaise tentatives.<br/>Nous avons automatiquement renvoye un autre email de confirmation.
            <br/>Veuillez utiliser le nouveau lien pour confirmer votre compte.</p><br>
            <a href="/"><button class="btn btn-success w-50">Revenir vers la page d'accueil</button></a>
            <br><br>
            <a href="/home" style="color: blue;"><-Revenir vers votre tableau de bord</a>
        </div>
    </div>
@endsection
