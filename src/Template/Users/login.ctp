<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ColiseumWBS | Login</title>
    <link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet"> 
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendors/bootstrap/dist/css/bootstrap.min.css">
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendors/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendors/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendors/animate/animate.css">
    <!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendors/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendors/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendors/select2/select2.min.css">
    <!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendors/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <?= $this->Html->meta(
    		'img/favicon-wbs.png',
    		'/img/favicon-wbs.png',
    		['type' => 'icon']
    	); 
    ?>
</head>
<body class="login">
    <div class="limiter">
    <!--    <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a> -->
        <div class="container-login100" style="background-image: url('../images/bg-02.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form">
                    <span class="login100-form-logo">
                         <img src="/images/logo-wbs.png" alt="Colisem Web Battle System Logo" height="120" width="120">
					</span>
                    <span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
                    <div class="wrap-input100 validate-input" data-validate = "Ingresa Email">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Ingresa password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
                    <div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Recuerda mi sesión
						</label>
					</div>
                    <div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>
                    <div class="text-center p-t-90">
						<a class="txt1" href="#">
							Olvidaste tu contraseña?
						</a>   |
                        <a class="txt1" href="#">
							Eres nuevo? Crea tu cuenta ahora
						</a>
					</div>
                </form>
            </div>
        <!--    <div class="animate form login_form">
                <section class="login_content">
                    <h1>Login</h1>
                    <?= $this->Form->create(); ?>
                    <?= $this->Form->input('email', array(
                        'class' => 'col-xs-6',
                        'type' => 'email',
                        'placeholder' => 'Correo',
                        'label' => false
                    )); ?>
                    <?= $this->Form->input('password', array(
                        'class' => 'col-xs-6',
                        'type' => 'password',
                        'placeholder' => 'Contraseña',
                        'label' => false
                    )); ?>
                    <?= $this->Form->submit('login', array(
                        'class' => 'btn btn-default btn-lg'
                    )); ?>
                    <?= $this->Form->end(); ?>
                    <div>
                        <a class="reset_pass" href="#">Olvidaste la contraseña?</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <p class="change_link">Eres nuevo?
                            <a href="<?= $this->Url->build([
                                            "controller" => "users",
                                            "action" => "singup"
                                        ]);
                                        ?>" class="to_register"> Crear Cuenta </a>
                        </p>
                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h1><i class="fa fa-microphone"></i> WBS!</h1>
                            <p>©2019 Todos los derechos reservados. Terminos de privacidad.</p>
                        </div>
                    </div>
                </section>
            </div> -->
        </div>
    </div>
    	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo $this->request->webroot; ?>vendors/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $this->request->webroot; ?>vendors/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $this->request->webroot; ?>vendors/bootstrap/js/popper.js"></script>
	<script src="<?php echo $this->request->webroot; ?>vendors/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $this->request->webroot; ?>vendors/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $this->request->webroot; ?>vendors/daterangepicker/moment.min.js"></script>
	<script src="<?php echo $this->request->webroot; ?>vendors/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $this->request->webroot; ?>vendors/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
</body>
</html>
