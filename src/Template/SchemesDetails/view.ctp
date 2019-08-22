<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SchemesDetail $schemesDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Schemes Detail'), ['action' => 'edit', $schemesDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Schemes Detail'), ['action' => 'delete', $schemesDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schemesDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schemes Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schemes Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schemes'), ['controller' => 'Schemes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scheme'), ['controller' => 'Schemes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="schemesDetails view large-9 medium-8 columns content">
    <h3><?= h($schemesDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Scheme') ?></th>
            <td><?= $schemesDetail->has('scheme') ? $this->Html->link($schemesDetail->scheme->name, ['controller' => 'Schemes', 'action' => 'view', $schemesDetail->scheme->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($schemesDetail->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($schemesDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Points') ?></th>
            <td><?= $this->Number->format($schemesDetail->points) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aditional Points') ?></th>
            <td><?= $this->Number->format($schemesDetail->aditional_points) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($schemesDetail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($schemesDetail->modified) ?></td>
        </tr>
    </table>
</div>
