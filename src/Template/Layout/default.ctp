<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html lang="en" class=" ">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coliseum | Web Battle System </title>

    <!-- Bootstrap -->
    <link href="<?php echo $this->request->webroot;  ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $this->request->webroot;  ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo $this->request->webroot;  ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo $this->request->webroot;  ?>vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo $this->request->webroot;  ?>build/css/custom.min.css" rel="stylesheet">

    <?= $this->Html->meta(
                'img/favicon-wbs.png',
                '/img/favicon-wbs.png',
                ['type' => 'icon']
        );
    ?>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php echo $this->element('sidebar') ?>
            <?php if($this->request->session()->read('Auth.User.username')): ?>
                    <?php echo $this->element('top_bar') ?>
            <?php endif; ?>
            <!-- contenido -->
            <?php echo $this->element('content') ?>
            <?php echo $this->element('footer') ?>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo $this->request->webroot;  ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo $this->request->webroot;  ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo $this->request->webroot;  ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo $this->request->webroot;  ?>vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo $this->request->webroot;  ?>vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo $this->request->webroot;  ?>vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo $this->request->webroot;  ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo $this->request->webroot;  ?>vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo $this->request->webroot;  ?>vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo $this->request->webroot;  ?>vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo $this->request->webroot;  ?>vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo $this->request->webroot;  ?>vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo $this->request->webroot;  ?>vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo $this->request->webroot;  ?>vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo $this->request->webroot;  ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo $this->request->webroot;  ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo $this->request->webroot;  ?>vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo $this->request->webroot;  ?>vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo $this->request->webroot;  ?>vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo $this->request->webroot;  ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo $this->request->webroot;  ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo $this->request->webroot;  ?>vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo $this->request->webroot;  ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo $this->request->webroot;  ?>build/js/custom.min.js"></script>
</body>

</html>
