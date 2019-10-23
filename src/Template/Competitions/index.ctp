<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Competition[]|\Cake\Collection\CollectionInterface $competitions
 */
?>
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('/img/hero_bg_02.jpg');"
    data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
                <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
                                <h1 class="text-white">Eventos de Freestyle</h1>
                                <p>Conoce los eventos de Freestyle en Baja California.</p>
                        </div>
                </div>
        </div>
</div>

<div class="container">
	<div class="row">
		<?php foreach ($competitions as $competition): ?>
		<div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
			<a href="/eventos/<?= $competition->id; ?>">
				<img src="/img/<?= $competition->flyer; ?>" 
		     			alt="<?= $competition->season->league->name ?> - <?= $competition->season->name ?> - <?= $competition->name ?>" 
		     			class="img-fluid">
	    		</a>
                	<div class="p-4 bg-white">
			<span class="d-block text-secondary small text-uppercase"><?= date("l, F jS, Y g:i a", strtotime($competition->date)) ?> </span>
                    		<h2 class="h5 text-black mb-3">
                			<a href="/eventos/<?= $competition->id; ?>"> 
						<?= $competition->season->league->name ?> - <?= $competition->season->name ?> - <?= $competition->name ?>
                			</a>
				</h2>
				<h5 class="location" > En <?= $competition->location->name ?> @ <?= $competition->location->city ?> </h5>
                	</div>
        </div>
            <?php endforeach; ?>
    </div>
	<div class="container mt-5" data-aos="fade-up">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="site-block-27">
					<ul>
						<?= $this->Paginator->numbers() ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} eventos de {{count}} en total')]) ?></p>
</div>