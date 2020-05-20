@extends('layouts.app')

@section('content')
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
                        <button  class="btn-lg" onclick="showusers()">Afficher les utilisateurs</button>
                            <br>
                               <div id="users" style=" margin-top: 50px;" class="container text-center d-none">
                                   <table class="table table-striped" >
                                       <thead class="thead-dark">
                                       <tr>
                                           <th scope="col">#</th>
                                           <th scope="col">Nom</th>
                                           <th scope="col">Email</th>
                                           <th scope="col">Role</th>
                                           <th scope="col">Action</th>
                                       </tr>
                                       </thead>
                                       <tbody>

                                           @if(isset($users))
                                               @foreach($users as $user)
                                                   <tr>
                                                    <th scope="row">{{$user->id}}</th>
                                                    <td >
                                                       <div id="name_user_{{$user->id}}" onclick="textToInput('name',{{$user->id}})">{{$user->name}}</div>
                                                       <input id="name_user_input_{{$user->id}}" oninput="showvalider({{$user->id}})" class="d-none" type="text" name="username" value="{{$user->name}}">
                                                    </td>
                                                    <td>
                                                        <div id="email_user_{{$user->id}}" onclick="textToInput('email',{{$user->id}})">{{$user->email}}</div>
                                                        <input id="email_user_input_{{$user->id}}" oninput="showvalider({{$user->id}})" class="d-none" type="text" name="username" value="{{$user->email}}">
                                                    </td>
                                                    <td>
                                                        <div id="role_user_{{$user->id}}" onclick="textToselect({{$user->id}})">{{$user->role}}</div>

                                                            <select  class="d-none" id="role_user_select_{{$user->id}}" onclick="addToSelect(this.id,'{{$user->role}}')" onchange="showvalider({{$user->id}})">
                                                                <option selected="selected">{{$user->role}}</option>
                                                            </select>


                                                    </td>
                                                    <td>
                                                        <button  class="btn-success d-none" id="valider_user_{{$user->id}}">Valider</button>
                                                        <button class="btn-danger d-inline">X</button>
                                                    </td>

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
        if (x.classList.contains("d-none")) {
            x.classList.remove('d-none');
            x.classList.add('d-inline');
        } else {
            x.classList.remove('d-inline');
            x.classList.add('d-none');
        }
    }
    function showvalider($id){
        var v=document.getElementById("valider_user_"+$id);
        if(v.classList.contains('d-none')){
        v.classList.remove('d-none');
        v.classList.add('d-inline');
        }

    }
    function textToInput($nameId,$id){
        var i=document.getElementById($nameId+'_user_input_'+$id);
        document.getElementById($nameId+'_user_'+$id).classList.add('d-none');
        document.getElementById($nameId+'_user_input_'+$id).classList.remove('d-none');
        document.getElementById($nameId+'_user_input_'+$id).classList.add('d-inline');
        i.size = Math.max(i.value.length, 1);
    }
    function textToselect($id ){
        var i=document.getElementById('role_user_select_'+$id);
        document.getElementById('role_user_'+$id).classList.add('d-none');
        document.getElementById('role_user_select_'+$id).classList.remove('d-none');
        document.getElementById('role_user_select_'+$id).classList.add('d-inline');


        //i.size = Math.max(i.value.length, 1);
    }
    function addToSelect($id,$role) {
        var x = document.getElementById($id).options.length;
        if(x<3){
        $role=String($role);

        if($role == 'admin'){

            addOption($id,'moderator');
            addOption($id,'user');
        }
        else if($role=='moderator'){

            addOption($id,'user');
            addOption($id,'admin');
        }
        else{

            addOption($id,'moderator');
            addOption($id,'admin');
        }
        }
    }
    function addOption($id,$text){
        var sel = document.getElementById($id);

       // create new option element
        var opt = document.createElement('option');

       // create text node to add to option element (opt)
        opt.appendChild( document.createTextNode($text) );

       // set value property of opt
        //opt.value = 'option value';

       // add opt to end of select box (sel)
        sel.appendChild(opt);
    }

</script>
