
@extends('layouts.app')

@section('content')
    <section class="fplus-about-us-area bg-gray section-padding-120" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header ">Dashboard @if(Session::get('role')=='admin')<div class="small">(Admin)</div>@endif</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if(Session::get('role')=='admin')
                            <div class="container text-center" >
                                <button  class="btn-lg" onclick="showdiv('users')">Afficher les utilisateurs</button>
                                    <br>
                                     @include('Dashboard.ListAllUsers')
                                <br>
                                <button  class="btn-lg" onclick="showdiv('journals')">Afficher le journal</button>
                                <br>
                                @include('Dashboard.Journal')
                            </div>
                                @endif

                                <br>
                                You are logged in!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script src="js/ListAllUsers.js"></script>
@endsection
