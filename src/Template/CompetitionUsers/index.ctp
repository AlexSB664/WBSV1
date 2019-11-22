<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompetitionUser[]|\Cake\Collection\CollectionInterface $competitionUsers
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Competition User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="competitionUsers index large-9 medium-8 columns content" id="divCompetitionUsers">
    <h3><?= __('Assistance') ?></h3>
            <?= $this->Form->create($competitionsUser) ?>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered dataTable no-footer">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('aka') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('avatar') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assistance') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($competitionsUser as $competitionUser): ?>
            <tr>
                <td id="tdaka"><?= $competitionUser->user->aka ?> </td>
                <td id="tdfullname"><?= $competitionUser->user->fullname ?> </td>
                <td id="tdavatar"><?= $competitionUser->user->avatar ?> </td>
                <td id="tdassistance"> 
                    <form action="<?= $this->Url->build([
                        'controller' => 'competitions_users',
                        'action' => 'unjoin', $competitionUser->id]); ?>">
                        <input type="submit" class="btn btn-danger" value="No asistio" />
                    </form>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $competitionUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $competitionUser->id)]); ?>
                </td>
            </tr> 
            <?php endforeach; ?>
            <?php foreach ($competitionsUser as $competitionUser) : ?>
            <tr>
                <td id="tdaka"><?= $competitionUser->user->aka ?> </td>
                <td id="tdfullname"><?= $competitionUser->user->fullname ?> </td>
                <td>Competencia asd</td>
                <td id="tdavatar"><?= $competitionUser->user->avatar ?> </td>
                <td id="tdassistance"> 
                    <form action="<?= $this->Url->build([
                                      'controller' => 'competitions_users',
                                      'action' => 'join',
                                      $competitionUser->id]); ?>">
                      <input type="submit" class="btn btn-primary" value="Asitio" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Form->button(__('Agregar'),array('class'=>'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>