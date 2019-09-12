<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\League[]|\Cake\Collection\CollectionInterface $leagues
 */
?>
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('img/hero_bg_02.jpg');"
    data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
				<h1 class="text-white">Ligas BajaMX</h1>
				<p>Conoce las ligas de Freestyle en Baja California.</p>
			</div>
		</div>
	</div>
</div>

<div class="site-section">
	<div class="container" data-aos="fade-up">
		<div class="row">

		<?php foreach ($leagues as $league): ?>

			<div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
				<div class="team-member">
					<img src="/img/<?= $league->logo; ?>" alt="Image" class="img-fluid">
					<div class="text">
						<h2 class="mb-2 font-weight-light h4"> <?= $league->name; ?> </h2>
						<span class="d-block mb-2 text-white-opacity-05">Telefono: <?= $league->social_telephone; ?></span>
						<p class="mb-4"> Email: <?= $league->social_email; ?>.</p>
						<p>
							<a href="<?= $league->social_facebook; ?>" class="text-white p-2"><span class="icon-facebook"></span></a>
							<a href="<?= $league->social_twitter; ?>" class="text-white p-2"><span class="icon-twitter"></span></a>
							<a href="<?= $league->social_instagram; ?>" class="text-white p-2"><span class="icon-instagram"></span></a>
						</p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</div>
