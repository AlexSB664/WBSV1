<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Competition[]|\Cake\Collection\CollectionInterface $competitions
 */
?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Todas las Competencias disponibles<small>Elige alguna y a pelear.</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="col-sm-6">
            <div class="dataTables_length" id="datatable_length"><label>Mostrar <select name="datatable_length" aria-controls="datatable" class="form-control input-sm">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select></label></div>
          </div>
          <div class="col-sm-6">
            <div id="datatable_filter" class="dataTables_filter"><label>Buscar:<input type="search" class="form-control input-sm" placeholder="Nombre o Liga" aria-controls="datatable"></label></div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th scope="col"><?= $this->Paginator->sort('date and hour') ?></th>
                <th>Competencia</th>
                <th scope="col"><?= $this->Paginator->sort('season_id') ?></th>
                <th>Liga</th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col">Info</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($competitionsIn as $competition) : ?>
                <tr>
                  <td> <?= $competition->id ?></td>
                  <td scope="row"><?= h($competition->date) ?></td>
                  <td>Competencia asd</td>
                  <td><?= $competition->has('season') ? $this->Html->link($competition->season->name, ['controller' => 'Seasons', 'action' => 'view', $competition->season->id]) : '' ?></td>
                  <td>xD</td>
                  <td><i class="fa fa-map-marker"></i><?= $competition->has('location') ? $this->Html->link($competition->location->name, ['controller' => 'Locations', 'action' => 'view', $competition->location->id]) : '' ?></td>
                  <td><a href="<?= $this->Url->build([
                                    'controller' => 'competitions',
                                    'action' => 'view',
                                    $competition->id
                                  ]); ?>">
                      <i class="fa fa-info-circle"></i></a></td>
                  <td>
                    <form action="<?= $this->Url->build([
                                      'controller' => 'competitions_users',
                                      'action' => 'unjoin',
                                      $competition->id
                                    ]); ?>">
                      <input type="submit" class="btn btn-danger" value="Salir" />
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>

              <?php foreach ($competitions as $competition) : ?>
                <tr>
                  <td> <?= $competition->id ?></td>
                  <td scope="row"><?= h($competition->date) ?></td>
                  <td>Competencia asd</td>
                  <td><?= $competition->has('season') ? $this->Html->link($competition->season->name, ['controller' => 'Seasons', 'action' => 'view', $competition->season->id]) : '' ?></td>
                  <td>xD</td>
                  <td><i class="fa fa-map-marker"></i><?= $competition->has('location') ? $this->Html->link($competition->location->name, ['controller' => 'Locations', 'action' => 'view', $competition->location->id]) : '' ?></td>
                  <td><a href="<?= $this->Url->build([
                                    'controller' => 'competitions',
                                    'action' => 'view',
                                    $competition->id
                                  ]); ?>">
                      <i class="fa fa-info-circle"></i></a></td>
                  <td>
                    <form action="<?= $this->Url->build([
                                      'controller' => 'competitions_users',
                                      'action' => 'join',
                                      $competition->id
                                    ]); ?>">
                      <input type="submit" class="btn btn-primary" value="Unirme" />
                    </form>

                  </td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
        <div class="paginator">
          <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
          </ul>
          <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</div>