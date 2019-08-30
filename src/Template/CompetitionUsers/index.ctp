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
<div class="competitionUsers index large-9 medium-8 columns content">
    <h3><?= __('Competition Users') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered dataTable no-footer">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('competitions_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assistance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($competitionUsers as $competitionUser): ?>
            <tr>
                <td><?= $this->Number->format($competitionUser->id) ?></td>
                <td><?= $competitionUser->has('competition') ? $this->Html->link($competitionUser->competition->id, ['controller' => 'Competitions', 'action' => 'view', $competitionUser->competition->id]) : '' ?></td>
                <td><?= $competitionUser->has('user') ? $this->Html->link($competitionUser->user->id, ['controller' => 'Users', 'action' => 'view', $competitionUser->user->id]) : '' ?></td>
                <td><?= h($competitionUser->assistance) ?></td>
                <td><?= h($competitionUser->created) ?></td>
                <td><?= h($competitionUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $competitionUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $competitionUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $competitionUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $competitionUser->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
