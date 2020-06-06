

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
			<div class="contact100-form validate-form">
				<span class="contact100-form-title">
					Contact Nous
				</span>

				<div class="wrap-input100 rs1-wrap-input100 " data-validate="Name is required">
                    <b><span class="label-input100">Nom</span></b>
					<input class="input100" type="text" name="name" placeholder="Enter your name" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <b><span class="label-input100">Email</span></b>
					<input class="input100" type="text" name="email" placeholder="Enter your email addess" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
                    <b><span class="label-input100">Message</span></b>
					<textarea class="input100" name="message" placeholder="Your message here..." required></textarea>
					<span class="focus-input100"></span>
				</div>


				<div class="container-contact100-form-btn">
                    {{Form::submit('Envoyer',['class' =>'contact100-form-btn'])}}
				</div>
                {!! Form::close() !!}
			</div>

			<span class="contact100-more">
				Pour plus d'information 24/7 apeler le centre: <span class="contact100-more-highlight">+212 537 45 44 40</span>
			</span>
		</div>
	</div>




