<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('/img/hero_bg_02.jpg');" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                <h1 class="league-title text-white">Batallas</h1>
                <h2 class="seasson-title">del</h2>
                <h2 class="event-title">Evento</h2>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-auto text-center">
    <div class="container">
        <?php foreach ($list as $key =>  $item) : ?>
            <!-- Stage -->
            <div class="d-flex p-2">
                <div class="col">
                    <h1><?= $key ?></h1>
                </div>
            </div>
            <!-- Battles in stage -->
            <?php foreach ($item as  $match) : ?>
            <div class="d-flex p-2"><div class="col">
                <h2>VS</h2></div>
            </div>
                <div class="d-flex p-2">
                    <?php foreach ($match as  $user) : ?>
                        <div class="col">
                            <!-- user card -->

                            <!-- Section: Personal card -->
                            <section class="my-5">

                                        <!-- Card -->
                                        <div class="card card-personal">

                                            <!-- Card image-->
                                            <?= $this->Html->image(($user->avatar), ['alt' => "$user->aka", 'class' => 'card-img-top']); ?>
                                            <!-- Card image-->

                                            <!-- Card content -->
                                            <div class="card-body bg-black d-none d-sm-block" >
                                                <!-- Title-->
                                                <a>
                                                    <h4 style="font-size:4vw;"><?= $user->aka ?></h4>
                                                </a>
                                                <!-- <p class="card-meta"><?= $user->crew?$user->crew->name:'NA'?></p> -->
                                                <!-- Text -->
                                            </div>
                                            <!-- Card content -->

                                        </div>
                                        <!-- Card -->

                            </section>
                            <!-- Section: Personal card -->
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endforeach ?>
        <?php endforeach ?>
    </div>
</div>