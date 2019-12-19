<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\user $user
 */
?>
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('/img/hero_bg_02.jpg');" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
        <h1 class="text-white">Perfil de <?= $user->aka ?></h1>
      </div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 ml-auto order-lg-2 mb-5" data-aos="fade-up" data-aos-delay="200">
        <?= $this->Html->image($user->avatar, ['alt' => "$user->name", 'class' => 'img-fluid', 'weight' => '50px']); ?>
      </div>
      <div class="col-lg-6 order-lg-1" data-aos="fade-up" data-aos-delay="100">
        <div class="site-section-heading text-left mb-5 w-border">
          <h2>Acerca de <?= h($user->aka) ?></h2>
        </div>
        <p class="lead">
          <div class="text">
            <h2 class="mb-2 font-weight-light h4"> Nombre: <?= $user->fullname; ?> </h2>

            <p class="mb-4"> Email: <?= $user->email; ?>.</p>
            <p>

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
        <h2 class="mb-5"> Ligas </h2>
        <p> Ligas donde pariticipo  <?= h($user->aka) ?> este año <?= date('Y') ?></p>
      </div>
    </div>

    <div class="row">
      <?php foreach ($data as $info) : ?>
        <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
          <a href="<?= $this->Url->build([
                                            'controller' => 'Users',
                                            'action' => 'profile',
                                            $user->id,
                                            $info['id']
                                        ]);
                                        ?>">
            <img src="/img/<?= $info['flyer']; ?>" class="img-fluid">
          </a>
          <div class="p-4 bg-white">
            <span class="d-block text-secondary small text-uppercase"><?= date("l, F jS, Y", strtotime($info['date'])) ?> </span>
            <h2 class="h5 text-black mb-3">
              <a href="#">
                <?= $info['name']; ?>
              </a>
            </h2>
            <h2 class="h5 text-black mb-3">
            Puntos Coliseum: <?= $info['points']?>
            </h2>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>