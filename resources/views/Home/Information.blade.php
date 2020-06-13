{!! Form::open(['action' => ['ProfileController@update',Auth::id()], 'method' => 'post','id'=>'form']) !!}
        <div id="formContent" style="text-align: left">
            <!-- Tabs Titles -->
            <div class="card-header  justify-content-start" >
                <div class="row d-flex align-items-center">
                    <div class="col-1">

                    </div>
                    <div class="col-8">
                        <b id="result" style="font-size: 150%"> Profile :</b>
                    </div>
                    <div class="col-3 justify-content-end">

                        <!--
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white bg-transparent">
                            <img src="{{$user->image}}" class="imgHome">
                        </a>

                        <input id="thumbnail" class="form-control input100" type="text" name="image" hidden="">
                        -->



                            <div class="d-flex  align-items-center vertical-align-top text-center ">
                            <a href="#" class=" bg-transparent" data-toggle="modal" data-target="#profileModal">
                                <img src="{{$user->image}}" class="profilepic">
                                <br>
                                <div class="mt-3 mr-3">Modifier</div>
                            </a>

                            </div>

                    </div>
                    <div class="col-1">

                    </div>
                    <div class="col-11 pt-5">
                        <div class="row d-flex align-items-center ">
                            <div class="col-3">
                                <b style="font-size: 20px">Pseudo :</b>
                            </div>
                            <div class="col-9 justify-content-start">
                                <input type="text" name="pseudo" placeholder="Pseudo" value="{{$user->name}}">
                            </div>

                            <div class="col-3">
                                <b style="font-size: 20px">Nom :</b>
                            </div>
                            <div class="col-9 justify-content-start">
                                <input type="text" name="nom" placeholder="NOM" value="{{$user->Nom}}">
                            </div>

                            <div class="col-3">
                                <b style="font-size: 20px">Prenom :</b>
                            </div>
                            <div class="col-9 justify-content-start">
                                <input type="text" name="prenom" placeholder="PRENOM" value="{{$user->Prenom}}">
                            </div>

                            <div class="col-3">
                                <b style="font-size: 19px">Date Naissance :</b>
                            </div>
                            <div class="col-9 justify-content-start">
                                <input type="date" name="date_naissance" placeholder="Date NAISSANCE" value="{{$user->Date_naissance}}">
                            </div>

                            <div class="col-3">
                                <b style="font-size: 20px">sexe :</b>
                            </div>
                            <div class="col-9 justify-content-center ">
                                <input name="sexe" type="radio" value="M" @if($user->sexe == 'M') checked @endif style="margin-left: 15%"><b> Masculin  </b>  <input name="sexe" type="radio" value="F" @if($user->sexe == 'F') checked @endif style="margin-left: 15%" ><b> Féminin </b>
                            </div>

                            <div class="col-3">
                                <b style="font-size: 20px">CIN :</b>
                            </div>
                            <div class="col-9 justify-content-start">
                                <input type="text" name="cin" placeholder="CIN" value="{{$user->CIN}}">
                            </div>

                            <div class="col-3">
                                <b style="font-size: 20px">Adresse :</b>
                            </div>
                            <div class="col-9 justify-content-start">
                                <input type="text" name="adresse" placeholder="ADRESSE" value="{{$user->Adresse}}" >
                            </div>

                            <div class="col-3">
                                <b style="font-size: 20px">Tel :</b>
                            </div>
                            <div class="col-9 justify-content-start">
                                <input type="text" name="tel" placeholder="TEL" value="{{$user->Tel}}">
                            </div>
                        </div>


                    </div>
                </div>
                <div id="formFooter" style="margin-top: 20px;">
                    <button type="submit" name="modify" value="profil" class="btn btn-primary" onclick="document.getElementById('form').submit();">Modifier
                    </button>

                </div>
            </div>
        </div>
{!! Form::hidden('_method','PUT') !!}
{!! Form::close() !!}
