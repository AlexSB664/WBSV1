<!DOCTYPE html>
<html lang="en">

<head>
  <title>Coliseum WBS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
