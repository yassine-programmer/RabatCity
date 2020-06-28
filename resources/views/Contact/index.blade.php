

@if(session()->has('result'))
    @if(session('result') == 'Y')
        <script>alert('Votre message ete envoye avec succes')</script>
        @else
        <script>alert('Votre message n est envoye. Resssayez plus tard ')</script>
        @endif
@endif
    @php(print (session('result')))
	<div class="container-contact100">
		<div class="wrap-contact100">

            {!! Form::open(['action' => 'EmailController@store', 'method' => 'post']) !!}
			<div class="contact100-form validate-form"  style="border:1px solid #ccc!important;
    													box-shadow: 2px 4px 6px #b8b894;
    													padding-left: 20px;padding-top: 20px;border-radius: 12px">
				<span class="pl-3 contact100-form-title grow homeTitle">
					Contactez Nous
				</span>

				<div class="wrap-input100 rs1-wrap-input100 " data-validate="Name is required">
                    <b><span class="label-input100">Nom</span></b>
					<input class="input100" type="text" name="name" placeholder="Entrez votre nom" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <b><span class="label-input100">Email</span></b>
					<input class="input100" type="text" name="email" placeholder="Entrez votre adresse mail" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
                    <b><span class="label-input100">Message</span></b>
					<textarea class="input100" name="message" placeholder="Votre message ici..." required></textarea>
					<span class="focus-input100"></span>
				</div>

                <div class=" container row d-flex align-items-center justify-content-center ">
                    <!--reCAPTCHA -->
                    <div id="captcha" class="col-6 float-right">
                        <div class="g-recaptcha" data-sitekey="{{env('reCAPTCHA_site_key')}}" required></div>
                        @if($errors->has('g-recaptcha-response'))
                            <span class="invalid-feedback" style="display: block">
                             <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                         </span>
                        @endif
                    </div>
                    <div class="container-contact100-form-btn col-6" style="margin-top:0; padding-left:14%">
                        {{Form::submit('Envoyer',['class' =>'contact100-form-btn'])}}
                    </div>

                </div>
				<span class="contact100-more text-end" style="padding-top: 40px">
				Pour plus d'information 24/7 apeler le centre: <span class="contact100-more-highlight">+212 537 45 44 40</span>
				</span>
                {!! Form::close() !!}


            </div>
		</div>
	</div>
<script>
    var captcha ={
        "success": true|false,
        "challenge_ts": timestamp,  // timestamp of the challenge load (ISO format yyyy-MM-dd'T'HH:mm:ssZZ)
        "hostname": string,         // the hostname of the site where the reCAPTCHA was solved
        "error-codes": 'Faut'        // optional
    }

</script>



