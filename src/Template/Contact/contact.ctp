<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('/img/hero_bg_02.jpg');" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
		  		<h1 class="text-white">Ligas de BajaMx </h1>
    	    	<p>Contáctanos con nosotros mediante este formulario..</p>
			</div>
		</div>
	</div>
</div>
<div class="container-contact100">
		<div class="wrap-contact100">
			<div class="contact100-form-title" style="background-image: url(/img/hero_bg_02.jpg);">
				<span class="contact100-form-title-1">
					Contactanos
				</span>
				<span class="contact100-form-title-2">
				</span>
			</div>
			<?=$this->Form->create('',array('class'=>"contact100-form validate-form"))?>
				<div class="wrap-input100 validate-input" data-validate="El nombre es requerido">
					<span class="label-input100">Nombre: </span>
					<input class="input100" type="text" name="name" placeholder="Ingresa el nombre">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "El email es requiredo: ex@abc.xyz">
					<span class="label-input100">Email:</span>
					<input class="input100" type="text" name="email" placeholder="Ingresa la direccion de email">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate="El asunto es requirido">
					<span class="label-input100">Asunto:</span>
					<input class="input100" type="text" name="affair" placeholder="Ingresa el asunto">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Mensaje es requerido">
					<span class="label-input100">Mensaje:</span>
					<textarea class="input100" name="message" placeholder="Tu mensaje aqui..."></textarea>
					<span class="focus-input100"></span>
                </div>
                <div class="g-recaptcha" data-sitekey="6LcAYLsUAAAAAFpKhB4bKTdyzNO0ky_Zevv6YcMs"></div> 

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Enviar
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>
