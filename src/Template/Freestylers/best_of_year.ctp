<!-- HEADER -->
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('/img/hero_bg_02.jpg');" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
    <div class="container">
        <div class="freestyler align-items-center justify-content-center">
            <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                <h1 class="league-title text-white">WBS Coliseum</h1>
                <h2 class="seasson-title">Presenta</h2>
                <h2 class="event-title">Top 100 de Freestylers</h2>
            </div>
        </div>
    </div>
</div>
<!-- END HEADER -->
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        </div>
    </div>
</nav>
<!-- END NAVBAR -->
<!-- Freestyler -->
<div class="col-sm-auto text-center">
    <table class="table leaderboard">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Posición</th>
                <th scope="col">Avatar</th>
                <th scope="col">Freestyler</th>
                <th scope="col">Puntos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($freestylers as $freestyler) : ?>
                <tr>
                    <td><?= $freestyler['position'] ?></td>
                    <td>
                        <?= $this->Html->image($freestyler['avatar'], ['alt' => "default-avatar",  'class' => 'img-fluid img-thumbnail img-max']); ?>
                    </td>
                    <td> <?= $freestyler['aka'] ?> </td>
                    <td><?= $freestyler['points'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- END Freestyler -->