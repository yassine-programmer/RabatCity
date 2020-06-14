



        <div class="wrapper fadeInDown col-md-8 " style="padding-top: 2% !important;">
            <div id="formContent">
                <!-- Tabs Titles -->
                <div class="card-body  justify-content-center" style="background-color: #fdfdfd;">
                      <div class="text-center" style="background-color: #fdfdfd;">
                          <img src="https://media.tenor.com/images/1bcfaadb7ed926566b25b16f256a5d1f/tenor.gif" style="width: 30%;">
                      </div>
                </div>
                    <div class="card-body  justify-content-center" style="background-color: #FFF;">
                      <div >
                          <h3><b>Email de confirmation</b></h3>
                          <div class="padding">
                              <p>Bonjour {{$user->name}}, vous etes presque pret pour utiliser RabatCity avec toute ses fonctionalites.
                              <br/>Veuillez verifier votre compte, en envoyant un lien de confirmation vers <b>{{$user->email}}</b>
                              <br/></p>

                           <a href="/sendVerificationCode/{{$user->id}}"><button class="btn btn-success w-100">Verifier mon compte</button></a>

                          </div>
                      </div>
                </div>
            </div>
        </div>

