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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
<?php echo $this->element('content') ?>            	
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
