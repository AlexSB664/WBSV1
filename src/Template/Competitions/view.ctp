<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\League $league
 */
?>
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('/img/hero_bg_02.jpg');" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">

        <h1 class="text-white">Eventos de BajaMx - <?= h($competition->name) ?></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 ml-auto order-lg-2 mb-5" data-aos="fade-up" data-aos-delay="200">
        <?= $this->Html->image($competition->flyer, ['alt' => "$competition->name", 'class' => 'img-fluid']); ?>
      </div>
      <div class="col-lg-6 order-lg-1" data-aos="fade-up" data-aos-delay="100">
        <div class="site-section-heading text-left mb-5 w-border">
          <h2>Acerca de <?= h($competition->name) ?></h2>
        </div>
        <p class="lead">Aqui va una descripcion de las ligas que aún no tenemos.... :( Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate accusamus porro, iusto id
          iste, quo nulla. Quisquam quia reiciendis iste earum mollitia officiis pariatur, culpa ab rerum quam, sint
          veritatis?</p>
        <p>Nobis rem impedit eligendi! Temporibus dolorum rerum quod autem, iusto excepturi distinctio maxime, deserunt,
          odio veritatis aliquid illo dolorem! Odio quibusdam repellat dolores dolor ipsum perferendis id, quod
          voluptates amet.</p>
        <p>Perspiciatis porro cumque dicta laborum laudantium quia et expedita dolorum, quis id facilis repudiandae
          nostrum nam temporibus dolores impedit tempora! Blanditiis tenetur neque harum molestiae ipsa minus. Nulla
          nemo, quis.</p>
        <div class="text">
          <h2 class="mb-2 font-weight-light h4"> <?= $competition->season->league->name; ?> </h2>
          <span class="d-block mb-2 text-white-opacity-05">Telefono: <?= $competition->season->league->social_telephone; ?></span>
          <p class="mb-4"> Email: <?= $competition->season->league->social_email; ?>.</p>
          <p>
            <a href="<?= $competition->season->league->social_facebook; ?>" class="text-white p-2"><span class="icon-facebook"></span></a>
            <a href="<?= $competition->season->league->social_twitter; ?>" class="text-white p-2"><span class="icon-twitter"></span></a>
            <a href="<?= $competition->season->league->social_instagram; ?>" class="text-white p-2"><span class="icon-instagram"></span></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
        <h2 class="mb-5"> Eventos</h2>
        <p> En esta sección aparecen todos los evento de la liga <?= h($league->name) ?></p>
      </div>
    </div>
    <?= empty($league->seasons) ? '<h3 class="mb-5"> No hay eventos de esta liga :( </h3>'  : '' ?>
    <?php foreach ($league->seasons as $season) : ?>
      <div class="row">
        <h3 class="mb-5"> Eventos de <?= $season->name ?></h3>
      </div>
      <div class="row">
        <?= empty($season->competitions) ? '<h3 class="mb-5"> No hay eventos  de esta temporada :( </h3>'  : '' ?>
        <?php foreach ($season->competitions as $competition) : ?>
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <a href="/eventos/<?= $competition->id; ?>">
              <img src="/img/<?= $competition->flyer; ?>" alt="<?= $competition->name ?>" class="img-fluid">
            </a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase"><?= date("l, F jS, Y", strtotime($competition->date)) ?> </span>
              <h2 class="h5 text-black mb-3">
                <a href="/eventos/<?= $competition->id; ?>">
                  <?= $competition->name ?>
                </a>
              </h2>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    <?php endforeach ?>
  </div>
</div>
