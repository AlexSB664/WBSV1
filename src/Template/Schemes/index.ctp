<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scheme[]|\Cake\Collection\CollectionInterface $schemes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Scheme'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Leagues'), ['controller' => 'Leagues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New League'), ['controller' => 'Leagues', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schemes Details'), ['controller' => 'SchemesDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schemes Detail'), ['controller' => 'SchemesDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schemes index large-9 medium-8 columns content">
    <h3><?= __('Schemes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('league_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_default') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schemes as $scheme): ?>
            <tr>
                <td><?= $this->Number->format($scheme->id) ?></td>
                <td><?= h($scheme->name) ?></td>
                <td><?= $scheme->has('league') ? $this->Html->link($scheme->league->name, ['controller' => 'Leagues', 'action' => 'view', $scheme->league->id]) : '' ?></td>
                <td><?= h($scheme->is_default) ?></td>
                <td><?= h($scheme->created) ?></td>
                <td><?= h($scheme->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $scheme->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scheme->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $scheme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheme->id)]) ?>
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
