<div class="content">

    <div class="center grow">

        <?= $this->Html->image('logo-wbs.png', ['alt' => 'Logo WBS', 'class' => 'logos', 'width' => '100', 'height' => '100']); ?>
        <div class="logos">
            <h1 class="league-title"><?= isset($leagues) ? $leagues->name : 'Selecciona una liga' ?></h1>
            <h2 class="seasson-title"> <?= isset($seasons_slug) ? 'Temporada: ' . $seasons_slug : 'Selecciona una temporada' ?></h2>
            <h2 class="event-title"> <?= isset($competition_slug) ? 'Competencia: ' . $competition_slug : 'Selecciona una jornada' ?></h2>
        </div>
        <?= $this->Html->image(isset($leagues) ? $leagues->logo : 'logo-wbs.png', ['alt' => 'Logo Liga', 'class' => 'logos', 'width' => '100', 'height' => '100']); ?>
    </div>

    <div class="leaderboard flex column wrap">
        <div class="leaderboard-table flex column" style="color:black">
            <?php if (isset($competition_slug)) : ?>
                <div class="leaderboard-header flex column grow">

                    <div class="filter-by flex grow wrap">
                        <div class="time-filter flex grow">
                            <div class="row-button pointer align-center <?= $competition_slug === 'all'  ?  'row-button--active' : '' ?>" onclick="window.location='<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board', $leagues->slug, $seasons_slug, 'all']); ?>'">General</div>
                            <?php foreach ($competitions as $competition) : ?>
                                <div class="row-button pointer align-center <?= $competition_slug === $competition->slug  ?  'row-button--active' : '' ?>" onclick="window.location='<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board', $leagues->slug, $seasons_slug, $competition->slug]); ?>'">
                                    <?= $competition->slug ?></div>
                            <?php endforeach ?>
                        </div>
                        <div class="subject-filter flex grow">

                        </div>
                    </div>

                    <div class="leaderboard-row flex align-center row--header" style="border-radius: 0 !important;">
                        <div class="row-position">Posicion</div>
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
                                            ]) ?>?colum=points&direction=asc">Points</a>
                        </div>
                        <div class="row-calls">
                            <a href="<?= $this->Url->build([
                                                'controller' => 'leaderboard',
                                                'action' => 'board',
                                                $leagues->slug,
                                                $seasons_slug,
                                                $competition_slug
                                            ]) ?>?colum=score&direction=asc">Score</a>
                        </div>
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
                            <div class="row-calls"> <?= $row['score'] ?></div>
                        <?php else : ?>
                            <div class="row-collapse flex align-center" onclick="window.location='<?= $this->Url->build(['controller' => 'leaderboard', 'action' => 'board', (isset($leagues) ? $leagues->slug : ''), $row->slug, (isset($leagues) ? 'all' : ''),]); ?>'">
                                <div class="row-caller flex">
                                    <?= $this->Html->image(($row->logo ? $row->logo : $row->flyer), ['alt' => "default-avatar", 'class' => 'avatar']); ?>
                                    <div class="row-user"> <?= $row->name ?></div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                <?php endforeach ?>


            </div>
        </div>

    </div>

</div>