<?= $this->Form->create(null, ['type' => 'file']); ?>

<span class="login100-form-logo">
	<img src="/images/logo-wbs.png" alt="Colisem Web Battle System Logo" height="120" width="120">
</span>

<span class="login100-form-title p-b-34 p-t-27">
	Registro
</span>
<div class="wrap-input100 validate-input" data-validate="Ingresa de Usuario">
	<?= $this->Form->input('username', array(
		'class' => 'input100',
		'type' => 'text',
		'placeholder' => 'Nombre de usuario',
		'label' => false
	)); ?>
	<span class="focus-input100" data-placeholder="&#xf207;"></span>
</div>

<div class="wrap-input100 validate-input" data-validate="Ingresa nombre Completo">
	<?= $this->Form->input('fullname', array(
		'class' => 'input100',
		'type' => 'text',
		'placeholder' => 'Nombre de Completo',
		'label' => false
	)); ?>
	<span class="focus-input100" data-placeholder="&#xf207;"></span>
</div>

<div class="wrap-input100 validate-input" data-validate="Ingresa A.K.A. / Alias">
	<?= $this->Form->input('aka', array(
		'class' => 'input100',
		'type' => 'text',
		'placeholder' => 'A.K.A. / Alias',
		'label' => false
	)); ?>
	<span class="focus-input100" data-placeholder="&#xf206;"></span>
</div>

<div class="wrap-input100 validate-input" data-validate="Ingresa Email">
	<?= $this->Form->input('email', array(
		'class' => 'input100',
		'type' => 'text',
		'placeholder' => 'Email',
		'label' => false
	)); ?>
	<span class="focus-input100" data-placeholder="&#xf200;"></span>
</div>


<div class="wrap-input100 validate-input" data-validate="Ingresa Crew">
	<?= $this->Form->input('crew', array(
		'class' => 'input100',
		'type' => 'text',
		'placeholder' => 'Crew / Clan',
		'label' => false
	)); ?>
	<span class="focus-input100" data-placeholder="&#xf209;"></span>
</div>

<div class="wrap-input100 validate-input" data-validate="Ingresa password">
	<?= $this->Form->input('password', array(
		'class' => 'input100',
		'type' => 'password',
		'placeholder' => 'Contraseña',
		'label' => false,
		'onchange' => 'check();'
	)); ?>
	<span class="focus-input100" data-placeholder="&#xf191;"></span>
</div>


<div class="wrap-input100 validate-input" data-validate="Ingresa password">
	<input type="password" name="confirm_password" class="input100" placeholder="Confirma Contraseña" id="confirm_password" onkeyup='check();'>
	<span class="focus-input100" data-placeholder="&#xf191;"></span>
</div>


<div class="wrap-input100 validate-input" data-validate="Ingresa Telefono">
	<?= $this->Form->input('telephone', array(
		'class' => 'input100',
		'type' => 'text',
		'placeholder' => 'Telefono',
		'label' => false

	)); ?>
	<span class="focus-input100" data-placeholder="&#xf195;"></span>
</div>

<div>
	<?= $this->Form->file('avatar', array(
		'type' => 'file',
		'accept' => 'image/*',
		'onchange' => 'loadFile(event)'
	)); ?>
	<img id="output" width="75" height="75" />
	<div class="row" style="padding-left: 20px; padding-right: 20px;">
		<div class="col-md-6 col-md-offset-3" style="clear:both;" id="img-alert">
		</div>
	</div>
	<script>
		var loadFile = function(event) {
			document.getElementById("img-alert").innerHTML = "";
			var output = document.getElementById('output');
			if (ValidateSize(event, output)) {
				output.src = URL.createObjectURL(event.target.files[0]);
			}
		};

		function ValidateSize(event, output) {
			var accept = true;
			fileSize = event.target.files[0].size / 1024 / 1024;
			if (fileSize > 2) {
				accept = false;
				event.target.value = null;
				showAlert();
			}
			return accept;
		}

		function showAlert() {
			document.getElementById("img-alert").innerHTML = '<div class="alert alert-dismissible alert-danger text-center" id="img-alert-div"></div>';
			document.getElementById("img-alert-div").innerHTML = '<button type="button" class="close" data-dismiss="alert">×</button>';
			document.getElementById("img-alert-div").innerHTML += 'La foto sobrepasa los 2 MB por favor intenta con otra  :(';

		}
	</script>
</div>


<div class="container-login100-form-btn">
	<?= $this->Form->submit('Login', array(
		'class' => 'login100-form-btn'
	)); ?>
</div>
<div class="text-center p-t-90">
	<a class="txt1" href="#"> Olvidaste tu contraseña?</a> |
	<a class="txt1" href="/users/login"> Ya tienes cuenta? Ingresa ahora </a>
</div>

<div>
	<p> C4 Technologies© 2019 Todos los derechos reservados. Terminos de privacidad.</p>

</div>

<?= $this->Form->end(); ?>