
<div id="formContent" style="text-align: left">
    <!-- Tabs Titles -->
    {!! Form::open(['action' => ['ProfileController@update',Auth::id()], 'method' => 'post','id'=>'form']) !!}
    <div class="card-header  justify-content-start" >
        <div class="row d-flex align-items-center">
            <div class="col-4">
            </div>
            <div class="col-8">
                <b id="result" style="font-size: 150%"> Changer le Mot passe :</b>
            </div>
            <div class="col-12 pt-5">
                <div class="row d-flex align-items-center ">

                    <div class="col-4">
                        <b style="font-size: 20px">Email</b>
                    </div>
                    <div class="col-8 justify-content-start">
                        <input type="email" name="email" value="{{$user->email}}" disabled>
                    </div>

                    <div class="col-4">
                        <b style="font-size: 20px">Mot de passe actuel :</b>
                    </div>
                    <div class="col-8 justify-content-start">
                        <input type="password" class="form-control" name="pwActuel" placeholder="Actuel" required>
                    </div>

                    <div class="col-4">
                        <b style="font-size: 20px">Nouveau mot de passe :</b>
                    </div>
                    <div class="col-8 justify-content-start">
                        <input id="password" type="password" placeholder="Nouveau" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="new-password">
                    </div>


                    <div class="col-4">
                        <b style="font-size: 20px">Confirmer mot de passe :</b>
                    </div>
                    <div class="col-8 justify-content-start">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmer">
                    </div>

                </div>


            </div>
        </div>
        <div id="formFooter" style="margin-top: 20px;">
            <button type="submit" id="btn_pw" name="modify" value="pw" class="btn btn-primary">Confirmer
            </button>
        </div>
    </div>
    {!! Form::hidden('_method','PUT') !!}
    {!! Form::close() !!}
</div>
