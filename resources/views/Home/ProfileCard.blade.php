<div id="ProfileCardChild_{{$user->id}}">
    <div  class="ProfileCardChild align-items-center">
        <img class="profilepic4" src="{{$user->image}}">
        <div style="margin-bottom: 30px"><b>{{$user->name}} </b><small>({{$user->role}})</small>  @if($user->confirmed) <i class="fa fa-check-circle " aria-hidden="true"></i>@endif</div>
        <div class="w-100 text-center pb-3" style="margin-left: 7rem" >
            @if(isset($user->Nom))<div class="p"><div class="float-left ProfileCardTitre">-Nom:</div>{{$user->Nom}} </div>@endif
            @if(isset($user->Prenom))<div class="p"><div class="float-left ProfileCardTitre">-Prenom: </div> {{$user->Prenom}}</div>@endif
            @if(isset($user->sexe))<div class="p"><div class="float-left ProfileCardTitre">-Sexe:</div> {{$user->sexe}}</div>@endif
            @if(isset($user->CIN))<div class="p"><div class="float-left ProfileCardTitre">-CIN:</div> {{$user->CIN}}</div>@endif
            @if(isset($user->Tel))<div class="p"><div class="float-left ProfileCardTitre">-Tel:</div> {{$user->Tel}}</div>@endif
            <div class="p" style="font-size: 10px; margin-top: 10px"><div class="float-left ProfileCardTitre" style="left: 15px">-Created at:</div> {{$user->created_at}}</div>
        </div>
    </div>
</div>
