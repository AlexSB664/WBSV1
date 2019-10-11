<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompetitionsUser $competitionsUser
 */
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Competitions User'), ['action' => 'edit', $competitionsUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Competitions User'), ['action' => 'delete', $competitionsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $competitionsUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Competitions Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Competitions User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->
<div class="competitionsUsers view large-9 medium-8 columns content">
    <h3><?= h($competitionsUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Competition') ?></th>
            <td><?= $competitionsUser->has('competition') ? $this->Html->link($competitionsUser->competition->id, ['controller' => 'Competitions', 'action' => 'view', $competitionsUser->competition->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $competitionsUser->has('user') ? $this->Html->link($competitionsUser->user->id, ['controller' => 'Users', 'action' => 'view', $competitionsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($competitionsUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($competitionsUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($competitionsUser->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assistance') ?></th>
            <td><?= $competitionsUser->assistance ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
