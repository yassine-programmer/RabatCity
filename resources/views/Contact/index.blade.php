

@if(!empty($result))
    @if($result == 'Y')
        <script>alert('Votre message ete envoye avec succes')</script>
        @else
        <script>alert('Votre n est pas bie envoye. Resssayez plus tard')</script>
        @endif
@endif
	<div class="container-contact100">
		<div class="wrap-contact100">

            {!! Form::open(['action' => 'EmailController@store', 'method' => 'post']) !!}
			<div class="contact100-form validate-form"  style="border:1px solid #ccc!important;
    													box-shadow: 2px 4px 6px #b8b894;
    													padding-left: 20px;padding-top: 20px;border-radius: 12px">
				<span class="contact100-form-title">
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


				<div class="container-contact100-form-btn">
                    {{Form::submit('Envoyer',['class' =>'contact100-form-btn'])}}
				</div>
				<span class="contact100-more text-end" style="padding-top: 40px">
				Pour plus d'information 24/7 apeler le centre: <span class="contact100-more-highlight">+212 537 45 44 40</span>
				</span>
                {!! Form::close() !!}


			</div>


		</div>
	</div>




