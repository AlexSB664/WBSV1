<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SchemesDetail[]|\Cake\Collection\CollectionInterface $schemesDetails
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Schemes Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schemes'), ['controller' => 'Schemes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheme'), ['controller' => 'Schemes', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="schemesDetails index large-9 medium-8 columns content">
    <h3><?= __('Schemes Details') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered dataTable no-footer">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scheme_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                <th scope="col"><?= $this->Paginator->sort('points') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aditional_points') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schemesDetails as $schemesDetail): ?>
            <tr>
                <td><?= $this->Number->format($schemesDetail->id) ?></td>
                <td><?= $schemesDetail->has('scheme') ? $this->Html->link($schemesDetail->scheme->name, ['controller' => 'Schemes', 'action' => 'view', $schemesDetail->scheme->id]) : '' ?></td>
                <td><?= h($schemesDetail->position) ?></td>
                <td><?= $this->Number->format($schemesDetail->points) ?></td>
                <td><?= $this->Number->format($schemesDetail->aditional_points) ?></td>
                <td><?= h($schemesDetail->created) ?></td>
                <td><?= h($schemesDetail->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $schemesDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $schemesDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $schemesDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schemesDetail->id)]) ?>
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
