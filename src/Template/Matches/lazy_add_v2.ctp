<?php if (isset($competition_id)) : ?>
    <div class="container">
        <div class="table-responsive">
        <table>
            <tbody>
                <tr>
                    <th>Info de la competencia seleccionada: </th>
                </tr>
                <tr>
                    <th>
                        <h2>Liga:</h2>
                        <h3><?= $competition_id->season->league->name ?></h3>
                        <?= $this->Html->image($competition_id->season->league->logo, ['alt' => 'Logo Liga', 'class' => 'logos', 'width' => '100', 'height' => '100']); ?>
                    </th>
                    <th>
                        <h2>Temporada:</h2>
                        <h3><?= $competition_id->season->name ?></h3>
                        <?= $this->Html->image($competition_id->season->flyer, ['alt' => 'Logo Liga', 'class' => 'logos', 'width' => '100', 'height' => '100']); ?>
                    </th>
                    <th>
                        <h2>Competencia:</h2>
                        <h3><?= $competition_id->name ?></h3>
                        <?= $this->Html->image($competition_id->flyer, ['alt' => 'Logo Liga', 'class' => 'logos', 'width' => '100', 'height' => '100']); ?>
                    </th>
                </tr>
                <!-- Apartado para las acciones -->
                <tr>
                    <th><h1>Acciones para esta competencia: </h1> </th>
                </tr>
                <tr>
                    <th>
                        <h2>Editar</h2>
                        <a href="<?= $this->Url->build(['controller' => 'Competitions', 'action' => 'edit', $competition_id->id]); ?>"><i class="fa fa-edit fa-w-18 fa-5x"></i></a>

                    </th>
                    <th>
                        <h2>Agregar Combate en Esta Competencia</h2>
                        <a href="<?= $this->Url->build(['controller' => 'Matches', 'action' => 'lazyAdd', $competition_id->id]); ?>"><i class="fa fa-plus-circle fa-w-18 fa-5x"></i></a>
                    </th>
                    <th>
                        <h2>Lista de Batallas</h2>
                        <a href="<?= $this->Url->build(['controller' => 'MatchesUsers', 'action' => 'listByCompetition', $competition_id->id]) ?>"><i class="fa fa-sitemap fa-w-18 fa-5x"></i></a>
                    </th>
                    <th>
                        <h2>Susbribir Usuarios A Esta Competencia</h2>
                        <a href="<?= $this->Url->build(['controller' => 'CompetitionsUsers', 'action' => 'lazyAdd', $competition_id->id]); ?>"><i class="fa fa-users fa-w-18 fa-5x"></i></a>
                    </th>
                    <th>
                        <h2>Tomar Asistencia</h2>
                        <a href="<?= $this->Url->build(['controller' => 'CompetitionsUsers', 'action' => 'index', $competition_id->id]) ?>"><i class="fa fa-check-square fa-w-18 fa-5x"></i></a>
                    </th>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
<?php else : ?>
    <div class=" container">
        <?php foreach ($list as $item) : ?>
            <div class="row" onclick="window.location='<?= $this->Url->build([
                                                                    'controller' => 'matches',
                                                                    'action' => 'lazyAddV2',
                                                                    (isset($league_id) ? $league_id : $item->id),
                                                                    (isset($league_id) ? isset($season_id) ? $season_id : $item->id : ''),
                                                                    (isset($league_id) ? isset($season_id) ? isset($competition_id) ? $competition_id : $item->id : '' : ''),
                                                                ]); ?>'">
                <div class="col-sm">
                    <h3><?= $item->name ?></h3>
                    <?= $this->Html->image($item->logo ? $item->logo : $item->flyer, ['alt' => 'Logo Liga', 'class' => 'logos', 'width' => '100', 'height' => '100']); ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>