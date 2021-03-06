<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LeaguesUser[]|\Cake\Collection\CollectionInterface $leaguesUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Leagues User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Leagues'), ['controller' => 'Leagues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New League'), ['controller' => 'Leagues', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="leaguesUsers index large-9 medium-8 columns content">
    <h3><?= __('Leagues Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('league_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leaguesUsers as $leaguesUser): ?>
            <tr>
                <td><?= $this->Number->format($leaguesUser->id) ?></td>
                <td><?= $leaguesUser->has('league') ? $this->Html->link($leaguesUser->league->name, ['controller' => 'Leagues', 'action' => 'view', $leaguesUser->league->id]) : '' ?></td>
                <td><?= $leaguesUser->has('user') ? $this->Html->link($leaguesUser->user->Array, ['controller' => 'Users', 'action' => 'view', $leaguesUser->user->id]) : '' ?></td>
                <td><?= h($leaguesUser->created) ?></td>
                <td><?= h($leaguesUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $leaguesUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $leaguesUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $leaguesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leaguesUser->id)]) ?>
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
