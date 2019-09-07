		
<?= $this->Form->create(); ?>
		    
<span class="login100-form-logo">
	<img src="/images/logo-wbs.png" alt="Colisem Web Battle System Logo" height="120" width="120">				
</span>
		    
<span class="login100-form-title p-b-34 p-t-27"> Log in </span>
		    
<div class="wrap-input100 validate-input" data-validate = "Ingresa Email">
	<?= $this->Form->input('email', array(
		'class' => 'input100',
		'type' => 'Email',
		'placeholder' => 'Email',
		'label' => false
	)); ?>					
	<span class="focus-input100" data-placeholder="&#xf207;"></span>
					
</div>
		    
<div class="wrap-input100 validate-input" data-validate="Ingresa password">

	<?= $this->Form->input('password', array(
		'class' => 'input100',
		'type' => 'password',
		'placeholder' => 'Password',
		'label' => false
	)); ?>
						
	<span class="focus-input100" data-placeholder="&#xf191;"></span>
					
</div>
		    
<div class="contact100-form-checkbox">
	<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
	<label class="label-checkbox100" for="ckb1"> Recuerda mi sesión </label>					
</div>
		    
<div class="container-login100-form-btn">
	<?= $this->Form->submit('Login', array(
		'class' => 'login100-form-btn'	
	)); ?>					
</div>
		    
<div class="text-center p-t-90">
        <a class="txt1" href="#"> Olvidaste tu contraseña?</a>   |
        <a class="txt1" href="/users/singup">  Eres nuevo? Crea tu cuenta ahora  </a>
</div>

<div>
        <p> C4 Technologies© 2019 Todos los derechos reservados. Terminos de privacidad.</p>

</div>

<?= $this->Form->end(); ?>
      
