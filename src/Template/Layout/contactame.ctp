<!DOCTYPE html>
<html lang="en">
<head>
	<title>Coliseum WBS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/contactme/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="/contactme/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/contactme/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/contactme/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="/contactme/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="/contactme/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="/contactme/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="/contactme/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="/contactme/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="/contactme/css/util.css">
	<link rel="stylesheet" type="text/css" href="/contactme/css/main.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Oswald:400,700">
  	<link rel="stylesheet" href="/css/icomoon.css">
	<link rel="stylesheet" href="/css/deejee/bootstrap.min.css">
	<link rel="stylesheet" href="/css/deejee//magnific-popup.css">
	<link rel="stylesheet" href="/css/deejee/jquery-ui.css">
	<link rel="stylesheet" href="/css/deejee/owl.carousel.min.css">
	<link rel="stylesheet" href="/css/deejee/owl.theme.default.min.css">
	<link rel="stylesheet" href="/css/deejee/bootstrap-datepicker.css">
	<link rel="stylesheet" href="/css/deejee/mediaelementplayer.css">
	<link rel="stylesheet" href="/css/deejee/animate.css">
	<link rel="stylesheet" href="/css/flaticon.css">
	<link rel="stylesheet" href="/css/deejee/fl-bigmug-line.css">
	<link rel="stylesheet" href="/css/deejee/aos.css">
	<link rel="stylesheet" href="/css/deejee/style.css">
	<?= $this->Html->meta(
    		'img/favicon-wbs.png',
    		'/img/favicon-wbs.png',
    		['type' => 'icon']
    	); 
    ?>
</head>
<body>
    <div class="site-wrap">
		<?php echo $this->element('header_deejee') ?>
		<?= $this->fetch('content') ?>
		<?php echo $this->element('footer_deejee') ?>
    </div>
	<script src="/contactme/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="/contactme/vendor/animsition/js/animsition.min.js"></script>
	<script src="/contactme/vendor/bootstrap/js/popper.js"></script>
	<script src="/contactme/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/contactme/vendor/select2/select2.min.js"></script>
	<script src="/contactme/vendor/daterangepicker/moment.min.js"></script>
	<script src="/contactme/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="/contactme/vendor/countdowntime/countdowntime.js"></script>
	<script src="/contactme/js/main.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!--	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script> -->
	<script src="/js/deejee//jquery-3.3.1.min.js"></script>
	<script src="/js/deejee//jquery-migrate-3.0.1.min.js"></script>
	<script src="/js/deejee//jquery-ui.js"></script>
	<script src="/js/deejee//popper.min.js"></script>
	<script src="/js/deejee//bootstrap.min.js"></script>
	<script src="/js/deejee//owl.carousel.min.js"></script>
	<script src="/js/deejee//mediaelement-and-player.min.js"></script>
	<script src="/js/deejee//jquery.stellar.min.js"></script>
	<script src="/js/deejee//jquery.countdown.min.js"></script>
	<script src="/js/deejee//jquery.magnific-popup.min.js"></script>
	<script src="/js/deejee//bootstrap-datepicker.min.js"></script>
	<script src="/js/deejee//aos.js"></script>
	<script src="/js/deejee//main.js"></script>
	<?php echo $this->element('google') ?>
	</body>
</html>
