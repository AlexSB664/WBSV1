<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ColiseumWBS | Ligas </title>
    <link rel="stylesheet" type="text/css" href="/css/mosaic.css">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <?= $this->Html->meta(
    		'img/favicon-wbs.png',
    		'/img/favicon-wbs.png',
    		['type' => 'icon']
    	); 
    ?>
</head>
<div class="container">
	<?php echo $this->element('content') ?>
</div>
            	
<!--===============================================================================================-->
	<script src="<?php echo $this->request->webroot; ?>vendors/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $this->request->webroot; ?>js/mosaic.js"></script>
<!--===============================================================================================-->
</body>
</html>
