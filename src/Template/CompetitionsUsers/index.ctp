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
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="competitionsUsers index large-9 medium-8 columns content">
    <h3><?= __('Competitions Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
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
            <?php foreach ($competitionsUsers as $competitionsUser): ?>
            <tr>
                <td><?= $this->Number->format($competitionsUser->id) ?></td>
                <td><?= $competitionsUser->has('competition') ? $this->Html->link($competitionsUser->competition->id, ['controller' => 'Competitions', 'action' => 'view', $competitionsUser->competition->id]) : '' ?></td>
                <td><?= $competitionsUser->has('user') ? $this->Html->link($competitionsUser->user->id, ['controller' => 'Users', 'action' => 'view', $competitionsUser->user->id]) : '' ?></td>
                <td><?= h($competitionsUser->assistance) ?></td>
                <td><?= h($competitionsUser->created) ?></td>
                <td><?= h($competitionsUser->modified) ?></td>
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
