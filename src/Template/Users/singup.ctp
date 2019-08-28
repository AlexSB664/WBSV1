<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>WBS | Singup</title>

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
  <script>
    var check = function() {
      if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'coincide';
        document.getElementById("registrar-btn").disabled = false;
      } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'no coincide';
        document.getElementById("registrar-btn").disabled = true;
      }
    }
  </script>
</head>

<body class="login" background="">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <?= $this->Flash->render('error'); ?>

    <div class="login_wrapper">
      <div id="register" class="animate form">
        <section class="login_content">
          <?= $this->Form->create(null,['type' => 'file']); ?>
          <h1>Crear Cuenta</h1>
          <div>
            <?= $this->Form->input('username', array(
              'class' => 'col-xs-6',
              'type' => 'text',
              'placeholder' => 'Nombre de usuario',
              'label' => false
            )); ?>
          </div>
          <div>
            <?= $this->Form->input('fullname', array(
              'class' => 'col-xs-6',
              'type' => 'text',
              'placeholder' => 'Nombre Completo',
              'label' => false
            )); ?>
          </div>
          <div>
            <?= $this->Form->input('aka', array(
              'class' => 'col-xs-6',
              'type' => 'text',
              'placeholder' => 'Nombre de Rapero',
              'label' => false
            )); ?>
          </div>
          <div>
            <?= $this->Form->input('crew_id', array(
              'class' => 'col-xs-6',
              'type' => 'text',
              'placeholder' => 'Clan, Grupo o Crew',
              'label' => false
            )); ?>
          </div>
          <div>
            <?= $this->Form->input('email', array(
              'class' => 'col-xs-6',
              'type' => 'email',
              'placeholder' => 'Correo',
              'label' => false
            )); ?>
          </div>
          <div>
            <?= $this->Form->input('password', array(
              'class' => 'col-xs-6',
              'type' => 'password',
              'placeholder' => 'Contraseña',
              'label' => false,
              'onchange' => 'check();'
            )); ?>
          </div>
          <div>
            <div class="input password">
              <input type="password" name="confirm_password" class="col-xs-6" placeholder="Confirma Contraseña" id="confirm_password" onkeyup='check();'>
              <span id='message'></span>
            </div>
          </div>
          <div>
            <?= $this->Form->input('telephone', array(
              'class' => 'col-xs-6',
              'type' => 'text',
              'placeholder' => 'Telefono',
              'label' => false
            )); ?>
          </div>
          <div>
            <?= $this->Form->file('avatar', array(
              'type' => 'file',
              'accept' => 'image/*',
              'onchange' => 'loadFile(event)'
            )); ?>
            <img id="output" width="75" height="75" />
            <script>
              var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
              };
            </script>
          </div>
          <div>
            <?= $this->Form->submit('Registrar', array(
              'class' => 'btn btn-default btn-lg',
              'id' => 'registrar-btn',
              'disabled' => 'true'
            )); ?>
          </div>
          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link">Ya eres miembro ?
              <a href="#signin" class="to_register"> Log in </a>
            </p>

            <div class="clearfix"></div>
            <br />

            <div>
              <h1><i class="fa fa-microphone"></i> WBS!</h1>
              <p>©2019 Todos los derechos reservados. Terminos de privacidad.</p>
            </div>
          </div>
        </section>
        <?= $this->Form->end(); ?>
      </div>
    </div>
  </div>
</body>
</html>