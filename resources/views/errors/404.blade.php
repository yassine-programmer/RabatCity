@extends('layouts.app')
@section('css')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>404 HTML Template by Colorlib</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/css/error.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

@endsection


@section('content')
<div id="notfound">
    <div class="notfound">
        <div class="notfound-404"></div>
        <h1>404</h1>
        <h2>Oops! La page demandée n'existe pas ou n'est plus en ligne.</h2>
        <p>Mais nous allons vous aider à retrouver votre chemin.</p>
        <?php $actual_link = "$_SERVER[REQUEST_URI]";
        $words = str_replace('/',' ',$actual_link);
        ?>
        <a href="/search/{{$words ?? ''}}">Rechercher : {{$words ?? ''}}</a>
        <br>
        <a href="/">Revenir a la page d'accueil</a>
    </div>
</div>
@endsection
