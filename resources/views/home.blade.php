@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard @if(Session::get('role')=='admin')<div class="small">(Admin)</div>@endif</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Session::get('role')=='admin')
                    <div class="container text-center" >
                        <button  class="btn-lg" onclick="showusers()">Afficher les utilisateurs</button>
                            <br>

                               <div id="users" style="display: none; margin-top: 50px;" class="container text-center ">
                                   <table class="table table-striped">
                                       <thead class="thead-dark">
                                       <tr>
                                           <th scope="col">#</th>
                                           <th scope="col">Nom</th>
                                           <th scope="col">Email</th>
                                           <th scope="col">Role</th>
                                       </tr>
                                       </thead>
                                       <tbody>

                                           @if(isset($users))
                                               @foreach($users as $user)
                                                   <tr>
                                                   <th scope="row">{{$user->id}}</th>
                                                   <td>{{$user->name}}</td>
                                                   <td>{{$user->email}}</td>
                                                   <td>{{$user->role}}</td>
                                                   </tr>
                                                   @endforeach
                                               @endif

                                       </tbody>
                                   </table>
                               </div>
                        @endif
                        </div>
                        <br>
                        You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function showusers() {
        var x = document.getElementById("users");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
