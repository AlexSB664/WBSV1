<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompetitionsUser $competitionsUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Competitions User'), ['action' => 'edit', $competitionsUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Competitions User'), ['action' => 'delete', $competitionsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $competitionsUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Competitions Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Competitions User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Seasons'), ['controller' => 'Seasons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Season'), ['controller' => 'Seasons', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="competitionsUsers view large-9 medium-8 columns content">
    <h3><?= h($competitionsUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Season') ?></th>
            <td><?= $competitionsUser->has('season') ? $this->Html->link($competitionsUser->season->name, ['controller' => 'Seasons', 'action' => 'view', $competitionsUser->season->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($competitionsUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Localitation Id') ?></th>
            <td><?= $this->Number->format($competitionsUser->localitation_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($competitionsUser->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $competitionsUser->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
