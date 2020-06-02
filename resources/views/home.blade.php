
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
                                <button  class="btn btn-outline-secondary" onclick="showdiv('users')" style="width: 300px">Afficher les utilisateurs</button>
                                <br>
                                @include('Dashboard.ListAllUsers')
                                <br>
                                <button  class="btn btn-outline-secondary" onclick="showdiv('journals')" style="width: 300px">Afficher le journal</button>
                                <br>
                                @include('Dashboard.Journal')
                                <br>
                                <a href="/scraping" class="btn btn-outline-secondary" style="width: 300px">Update Post Facebook</a>
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
