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
    <link href="/vendor/boostrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendor/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/vendor/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendor/boostrap/dist/css/bootstrap-grid.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendor/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendors/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>vendor/daterangepicker/daterangepicker.css">
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
        <div class="container-login100" style="background-image: url('/images/bg-02.jpg');">
            <div class="wrap-login100">
                <?php echo $this->element('content') ?>
            </div>
        </div>

        <!--===============================================================================================-->
        <script src="<?php echo $this->request->webroot; ?>vendors/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo $this->request->webroot; ?>vendors/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo $this->request->webroot; ?>vendors/bootstrap/js/popper.js"></script>
        <script src="<?php echo $this->request->webroot; ?>vendors/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo $this->request->webroot; ?>vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo $this->request->webroot; ?>vendor/daterangepicker/moment.min.js"></script>
        <script src="<?php echo $this->request->webroot; ?>vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="<?php echo $this->request->webroot; ?>vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
</body>

</html>