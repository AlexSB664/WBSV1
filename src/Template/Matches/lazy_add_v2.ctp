<?php if (isset($competition_id)) : ?>
    <div class="row">
        <div class="col">
            <th>Info de la competencia seleccionada: </th>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h2>Liga:</h2>
            <h3><?= $competition_id->season->league->name ?></h3>
            <?= $this->Html->image($competition_id->season->league->logo, ['alt' => 'Logo Liga', 'class' => 'logos', 'width' => '100', 'height' => '100']); ?>
        </div>
        <div class="col">
            <h2>Temporada:</h2>
            <h3><?= $competition_id->season->name ?></h3>
            <?= $this->Html->image($competition_id->season->flyer, ['alt' => 'Logo Liga', 'class' => 'logos', 'width' => '100', 'height' => '100']); ?>
        </div>
        <div class="col">
            <h2>Competencia:</h2>
            <h3><?= $competition_id->name ?></h3>
            <?= $this->Html->image($competition_id->flyer, ['alt' => 'Logo Liga', 'class' => 'logos', 'width' => '100', 'height' => '100']); ?>
        </div>
    </div>
    <!-- Apartado para las acciones -->
    <div class="row">
        <div class="col">
            <h1>Acciones para esta competencia: </h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h2>Editar</h2>
            <a href="<?= $this->Url->build(['controller' => 'Competitions', 'action' => 'edit', $competition_id->id]); ?>"><i class="fa fa-edit fa-w-18 fa-5x"></i></a>

        </div>
        <div class="col">
            <h2>Agregar Combate en Esta Competencia</h2>
            <a href="<?= $this->Url->build(['controller' => 'Matches', 'action' => 'lazyAdd', $competition_id->id]); ?>"><i class="fa fa-plus-circle fa-w-18 fa-5x"></i></a>
        </div>
        <div class="col">
            <h2>Ver Combates de esta Competencia</h2>
            <a href="<?= $this->Url->build(['controller' => 'Matches', 'action' => 'index', $competition_id->id]); ?>"><i class="fa fa-eye fa-w-18 fa-5x"></i></a>
        </div>
        <div class="col">
            <h2>Lista de Batallas</h2>
            <a href="<?= $this->Url->build(['controller' => 'MatchesUsers', 'action' => 'listByCompetition', $competition_id->id]) ?>"><i class="fa fa-sitemap fa-w-18 fa-5x"></i></a>
        </div>
        <div class="col">
            <h2>Suscribir Usuarios A Esta Competencia</h2>
            <a href="<?= $this->Url->build(['controller' => 'CompetitionsUsers', 'action' => 'lazyAdd', $competition_id->id]); ?>"><i class="fa fa-users fa-w-18 fa-5x"></i></a>
        </div>
        <div class="col">
            <h2>Desuscribir Usuarios de esta Competencia</h2>
            <a href="<?= $this->Url->build(['controller' => 'CompetitionsUsers', 'action' => 'lazyDelete', $competition_id->id]); ?>"><i class="fa fa-trash fa-w-18 fa-5x"></i></a>
        </div>
        <div class="col">
            <h2>Tomar Asistencia</h2>
            <a href="<?= $this->Url->build(['controller' => 'CompetitionsUsers', 'action' => 'index', $competition_id->id]) ?>"><i class="fa fa-check-square fa-w-18 fa-5x"></i></a>
        </div>
    </div>
<?php else : ?>
    <!-- ADD ITEM -->
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1"></h2>
                <?php if ($this->request->getSession()->read('Auth.User.role') == 'organizers') : ?>
                    <button class="au-btn au-btn-icon au-btn--green" onclick="window.location='<?= $this->Url->build([
                                                                                                            'controller' => 'matches',
                                                                                                            'action' => 'lazyAddV2'
                                                                                                        ]); ?>'">
                        <i class="fa fa-home"></i>Home</button>
                <?php endif ?>
                <?php if (isset($season_id)) : ?>
                    <button class="au-btn au-btn-icon au-btn--blue" onclick="window.location='<?= $this->Url->build([
                                                                                                            'controller' => 'competitions',
                                                                                                            'action' => 'add',
                                                                                                            $season_id
                                                                                                        ]); ?>'">
                        <i class="zmdi zmdi-plus"></i>Agregar Jornada</button>
                <?php elseif (isset($league_id)) : ?>
                    <button class="au-btn au-btn-icon au-btn--blue" onclick="window.location='<?= $this->Url->build([
                                                                                                            'controller' => 'seasons',
                                                                                                            'action' => 'add',
                                                                                                            $league_id
                                                                                                        ]); ?>'">
                        <i class="zmdi zmdi-plus"></i>Agregar Temporada</button>
                <?php else : ?>
                    <?php if ($this->request->getSession()->read('Auth.User.role') == 'admin') : ?>
                        <button class="au-btn au-btn-icon au-btn--blue" onclick="window.location='<?= $this->Url->build([
                                                                                                                    'controller' => 'leagues',
                                                                                                                    'action' => 'add'
                                                                                                                ]); ?>'">
                            <i class="zmdi zmdi-plus"></i>Add League</button>
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div>
    </div>
    <!-- END ADD ITEM -->
    <?php foreach ($list as $item) : ?>
        <div class="row" onclick="window.location='<?= $this->Url->build([
                                                                'controller' => 'matches',
                                                                'action' => 'lazyAddV2',
                                                                (isset($league_id) ? $league_id : $item->id),
                                                                (isset($league_id) ? isset($season_id) ? $season_id : $item->id : ''),
                                                                (isset($league_id) ? isset($season_id) ? isset($competition_id) ? $competition_id : $item->id : '' : ''),
                                                            ]); ?>'">
            <div class="col">
                <h3><?= $item->name ?></h3>
                <?= $this->Html->image($item->logo ? $item->logo : $item->flyer, ['alt' => 'Logo Liga', 'class' => 'logos', 'width' => '100', 'height' => '100']); ?>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>