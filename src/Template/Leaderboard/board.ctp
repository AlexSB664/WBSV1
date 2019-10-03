<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('/img/hero_bg_02.jpg');"
    data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
                <div class="row align-items-center justify-content-center">
                        <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                                <h1 class="league-title text-white"><?= isset($leagues) ? $leagues->name : 'Selecciona una liga' ?></h1>
	 			<h2 class="seasson-title"> <?= isset($seasons_slug) ? 'Temporada: ' . $seasons_slug : 'Selecciona una temporada' ?></h2>
            			<h2 class="event-title"> <?= isset($competition_slug) ? 'Competencia: ' . $competition_slug : 'Selecciona una jornada' ?></h2>
			</div>
                </div>
        </div>
</div>

<?php if (isset($competition_slug)) : ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board', $leagues->slug, $seasons_slug, 'all']); ?>">
  <?= $this->Html->image(isset($leagues) ? $leagues->logo : 'logo-wbs.png', ['alt' => 'Logo Liga', 'class' => 'd-inline-block align-top', 'width' => '30', 'height' => '30']); ?>
  General </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <?php foreach ($competitions as $competition) : ?>
    <a class="nav-item nav-link active" href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board', $leagues->slug, $seasons_slug, $competition->slug]); ?>"> <?= $competition->slug ?></a>
    <?php endforeach ?>
    <a class="nav-item nav-link active" href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board', $leagues->slug]); ?>"> Otras Temporadas</a>
    <a class="nav-item nav-link active" href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board']); ?>">Otras Ligas</a>
    </div>
  </div>
</nav>
<?php elseif(isset($leagues)): ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
  <?= $this->Html->image(isset($leagues) ? $leagues->logo : 'logo-wbs.png', ['alt' => 'Logo Liga', 'class' => 'd-inline-block align-top', 'width' => '30', 'height' => '30']); ?>
  Elige Temporada </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <?php foreach ($board as $row) : ?>
    <a class="nav-item nav-link active" href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board', (isset($leagues) ? $leagues->slug : ''), $row->slug, (isset($leagues) ? 'all' : ''),]); ?>"> <?= $row->slug ?></a>
    <?php endforeach ?>
    <a class="nav-item nav-link active" href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board']); ?>">Otras Ligas</a>
    </div>
  </div>
</nav>
<?php endif; ?>

<?php if (isset($competition_slug)) : ?>
<div class="table-responsive-xl">
<table class="table table-striped leaderboard">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Posicion</th>
      <th scope="col">Avatar</th>
      <th scope="col">Freestyler</th>
      <th scope="col">Points</th>
      <?php if(!$emptyScore):?>
      <th scope="col">Score</th>
      <?php endif ?>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($board as $row) : ?>
    <tr>
      <td><?= $row['position'] ?></th>
      <td>
            <?= $this->Html->image($row['avatar'], ['alt' => "default-avatar",  'class' => 'img-fluid img-thumbnail img-max']); ?>
      </td>
      <td>  <?= $row['aka'] ?> </td>
      <td><?= $row['points'] ?></td>
      <?php if(!$emptyScore):?>
      <td> <?= $row['score'] ?> </td>
      <?php endif ?>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php endif ?>
</div>

<div class="content">
    <div class="column wrap">
        <div class="leaderboard-table flex column" style="color:black">
            <?php if (isset($competition_slug)) : ?>
                <div class="leaderboard-header flex column grow">
                    <div class="filter-by flex grow wrap">
                        <div class="time-filter flex grow">
                        </div>
                        <div class="subject-filter flex grow">

                        </div>
                    </div>

                    <div class="leaderboard-row flex align-center row--header" style="border-radius: 0 !important;">
                        <div class="row-collapse flex align-center">Posicion</div>
                        <div class="row-collapse flex align-center">
                            <div class="row-user--header">Freestyler</div>
                            <div class="row-team--header">Crew</div>
                        </div>
                        <div class="row-calls">
                            <a href="<?= $this->Url->build([
                                                'controller' => 'leaderboard',
                                                'action' => 'board',
                                                $leagues->slug,
                                                $seasons_slug,
                                                $competition_slug
                                            ]) ?>">Points</a>
                        </div>
                        <?php if(!$emptyScore):?>
                        <div class="row-calls">
                            <a href="<?= $this->Url->build([
                                                'controller' => 'leaderboard',
                                                'action' => 'board',
                                                $leagues->slug,
                                                $seasons_slug,
                                                $competition_slug
                                            ]) ?>?colum=score&direction=asc">Score</a>
                        </div>
                        <?php endif ?>
                    </div>
                </div>
            <?php endif ?>


            <div class="leaderboard-body flex column grow">
                <?php foreach ($board as $row) : ?>
                    <div class="leaderboard-row flex align-center">
                        <?php if (isset($competition_slug)) : ?>
                            <div class="row-position"> <?= $row['position'] ?></div>
                            <div class="row-collapse flex align-center">
                                <div class="row-caller flex">
                                    <?= $this->Html->image($row['avatar'], ['alt' => "default-avatar", 'class' => 'avatar']); ?>
                                    <div class="row-user"> <?= $row['aka'] ?></div>
                                </div>
                                <div class="row-team"> <?= $row['crew'] ?></div>
                            </div>
                            <div class="row-calls"> <?= $row['points'] ?></div>
                            <?= $emptyScore?'':'<div class="row-calls">'.$row['score'].'</div>'?>
                        <?php else : ?>
                            <div class="row-collapse flex align-center" onclick="window.location='<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board', (isset($leagues) ? $leagues->slug : ''), $row->slug, (isset($leagues) ? 'all' : ''),]); ?>'">
                            
                                <div class="column">
                                    <?= $this->Html->image(($row->logo ? $row->logo : $row->flyer), ['alt' => "default-avatar", 'class' => 'logos', 'width' => '100', 'height' => '100']); ?>
                                    <div class="column"> <?= $row->name ?></div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endforeach ?>


            </div>
        </div>

    </div>

</div>
