<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MatchesUser[]|\Cake\Collection\CollectionInterface $matchesUsers
 */
?><!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Matches User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
<div class="matchesUsers index large-9 medium-8 columns content">
    <h3><?= __('Combates') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('match_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matchesUsers as $matchesUser): ?>
            <tr>
                <td><?= $this->Number->format($matchesUser->id) ?></td>
                <td><?= $this->Number->format($matchesUser->match_id) ?></td>
                <td><?= $matchesUser->has('user') ? $this->Html->link($matchesUser->user->id, ['controller' => 'Users', 'action' => 'view', $matchesUser->user->id]) : '' ?></td>
                <td><?= h($matchesUser->created) ?></td>
                <td><?= h($matchesUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $matchesUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $matchesUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $matchesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matchesUser->id)]) ?>
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
