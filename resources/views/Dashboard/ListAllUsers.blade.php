<div id="listeAlluser" style="width: 700px;">
<div id="users" style=" margin-top: 50px;" class="container text-center">
    {!! Form::open([ 'action' => ['HomeController@update',$users[0]->id],'method' => 'post']) !!}
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
                <input class="d-inline" type="hidden" value="{{$user->id}}" name="" id="hidden_id_user_{{$user->id}}">
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td >
                        <div id="name_user_{{$user->id}}" onclick="textToInput('name',{{$user->id}})">{{$user->name}}</div>
                        <input id="name_user_input_{{$user->id}}" oninput="showvalider({{$user->id}})" class="d-none" type="text" name="" value="{{$user->name}}">
                    </td>
                    <td>
                        <div id="email_user_{{$user->id}}" onclick="textToInput('email',{{$user->id}})">{{$user->email}}</div>
                        <input id="email_user_input_{{$user->id}}" oninput="showvalider({{$user->id}})" class="d-none" type="text" name="" value="{{$user->email}}">
                    </td>
                    <td>
                        <div id="role_user_{{$user->id}}" onclick="textToselect({{$user->id}})">{{$user->role}}</div>

                        <select  class="d-none" id="role_user_select_{{$user->id}}" onclick="addToSelect(this.id,'{{$user->role}}')" onchange="showvalider({{$user->id}})" name="">
                            <option selected="selected">{{$user->role}}</option>
                        </select>


                    </td>
                    <td>

                        <input type="submit" value="Valider" onclick="AddNameAttribute({{$user->id}})" class="btn-success d-none" id="valider_user_{{$user->id}}">
                        {!! Form::hidden('_method','PUT') !!}
                        {!! Form::close() !!}
                        {!! Form::open([ 'action'=>['HomeController@destroy',$user->id],'method' => 'post','class'=>'d-inline','onsubmit' => 'return confirm("Est-ce que vous voulez supprimer cette utilisateur ?");']) !!}
                        {{ Form::hidden('_method','DELETE') }}
                        {{ Form::submit('X',['class'=>'btn-danger ']) }}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
</div>

</div>
