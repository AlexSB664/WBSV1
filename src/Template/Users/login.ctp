<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WBS! | Login</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login" background="images/rappers-collage.jpg">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                        <h1>Login</h1>
                        <?= $this->Form->create(); ?>
                        <?= $this->Form->input('email',array(
                            'type'=>'email',
                            'placeholder'=>'Correo',
                            'label' => false
                            ));?>
                        <?= $this->Form->input('password', array(
                            'type' => 'password',
                            'placeholder'=>'Contraseña',
                            'label' => false
                        ));?>
                        <?= $this->Form->submit('login', array('class' => 'btn btn-default btn-lg')); ?>
                        <?= $this->Form->end(); ?>
                        <div>
                            <a class="reset_pass" href="#">Olvidaste la contraseña?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Eres nuevo?
                                <a href="" class="to_register"> Crear Cuenta </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-microphone"></i> WBS!</h1>
                                <p>©2019 Todos los derechos reservados. Terminos de privacidad.</p>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>