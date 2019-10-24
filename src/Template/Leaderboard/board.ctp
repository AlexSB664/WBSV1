<!-- HEADER -->
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('/img/hero_bg_02.jpg');" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
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
    <!-- COMPETITIONS NAVAR -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board', $leagues->slug, $seasons_slug, 'all']); ?>">
            <?= $this->Html->image($leagues->logo, ['alt' => 'Logo Liga', 'class' => 'd-inline-block align-top', 'width' => '30', 'height' => '30']); ?>
            General
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php foreach ($competitions as $competition) : ?>
                    <a class="nav-item nav-link active" href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board', $leagues->slug, $seasons_slug, $competition->slug]); ?>">
                        <?= $competition->slug ?>
                    </a>
                <?php endforeach ?>
                <a class="nav-item nav-link active" href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board', $leagues->slug]); ?>"> Otras Temporadas</a>
                <a class="nav-item nav-link active" href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board']); ?>">Otras Ligas</a>
                <a class="nav-item nav-link active" href="<?= $this->Url->build(['controller' => 'matches-users', 'action' => 'list-by-competition', $competition->id]); ?>">Ver Tiros</a>
	    </div>
        </div>
    </nav>

<?php elseif (isset($leagues)) : ?>

    <!--  SEASONS NAVAR  -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <?= $this->Html->image($leagues->logo, ['alt' => 'Logo Liga', 'class' => 'd-inline-block align-top', 'width' => '30', 'height' => '30']); ?>
            Elige Temporada
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php foreach ($board as $row) : ?>
                    <a class="nav-item nav-link active" href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board', $leagues->slug, $row->slug, 'all']); ?>">
                        <?= $row->slug ?>
                    </a>
                <?php endforeach ?>
                <a class="nav-item nav-link active" href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board']); ?>">Otras Ligas</a>
            </div>
        </div>
    </nav>
<?php endif; ?>

<?php if (isset($competition_slug)) : ?>

    <!--  COMPETITIONS BOARD  -->

    <div class="col-sm-auto text-center">
        <table class="table leaderboard">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Posición</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Freestyler</th>
                    <th scope="col" onclick="window.location='<?= $this->Url->build([
                                                                        'controller' => 'leaderboard',
                                                                        'action' => 'board',
                                                                        $leagues->slug,
                                                                        $seasons_slug,
                                                                        $competition_slug
                                                                    ]) ?>'">Points</th>
                    <?php if (!$emptyScore) : ?>
                        <th scope="col" onclick="window.location='<?= $this->Url->build([
                                                                                'controller' => 'leaderboard',
                                                                                'action' => 'board',
                                                                                $leagues->slug,
                                                                                $seasons_slug,
                                                                                $competition_slug
                                                                            ]); ?>?colum=score&direction=asc'">Score</th>
                    <?php endif ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($board as $row) : ?>
                    <tr>
                        <td><?= $row['position'] ?></td>
                        <td>
                            <?= $this->Html->image($row['avatar'], ['alt' => "default-avatar",  'class' => 'img-fluid img-thumbnail img-max']); ?>
                        </td>
                        <td> <?= $row['aka'] ?> </td>
                        <td><?= $row['points'] ?></td>
                        <?php if (!$emptyScore) : ?>
                            <td> <?= $row['score'] ?> </td>
                        <?php endif ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php elseif (isset($leagues)) : ?>

    <!--  SEASONS BOARD  -->

    <div class="col-sm-auto text-center">
        <table class="table leaderboard">
            <tbody class="thead-dark">

    		<?php foreach ($board as $row) : ?>
		<tr>
            		<td class="col-md-6 col-xs-6 text-right">
                		<a href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board', $leagues->slug, $row->slug, 'all']); ?>">
                    		<?= $this->Html->image(($row->flyer), ['alt' => "default-avatar", 'class' => 'logos', 'width' => '100', 'height' => '100']); ?>
                		</a>
            		</td>
            		<td class="col-md-6 col-xs-6">
                		<a href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board',  $leagues->slug, $row->slug, 'all']); ?>">
                    		<h3><?= $row->name ?></h3>
                		</a>
            		</td>
        	</tr>
    		<?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>

    <!--  LEAGUES BOARD  -->

    <div class="col-sm-auto text-center">
        <table class="table leaderboard">
            <tbody class="thead-dark">
    		<?php foreach ($board as $row) : ?>

		<tr>
                        <td> <a href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board', $row->slug]); ?>">
                                <?= $this->Html->image(($row->logo), ['alt' => "default-avatar", 'class' => 'logos', 'width' => '100', 'height' => '100']); ?>
                        </a>
                        </td>
                        <td> <a href="<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board',  $row->slug]); ?>">
                                <h3><?= $row->name ?></h3>
                             </a>
                        </td>
		</tr>
    		<?php endforeach; ?>
            </tbody>
        </table>
    </div>


<?php endif ?>
