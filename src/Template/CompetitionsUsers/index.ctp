<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompetitionsUser[]|\Cake\Collection\CollectionInterface $competitionsUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Competitions User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Seasons'), ['controller' => 'Seasons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Season'), ['controller' => 'Seasons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="competitionsUsers index large-9 medium-8 columns content">
    <h3><?= __('Competitions Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('season_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('localitation_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($competitionsUsers as $competitionsUser): ?>
            <tr>
                <td><?= $this->Number->format($competitionsUser->id) ?></td>
                <td><?= h($competitionsUser->date) ?></td>
                <td><?= $competitionsUser->has('season') ? $this->Html->link($competitionsUser->season->name, ['controller' => 'Seasons', 'action' => 'view', $competitionsUser->season->id]) : '' ?></td>
                <td><?= h($competitionsUser->status) ?></td>
                <td><?= $this->Number->format($competitionsUser->localitation_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $competitionsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $competitionsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $competitionsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $competitionsUser->id)]) ?>
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
