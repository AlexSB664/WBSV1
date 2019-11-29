<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LeaguesUser $leaguesUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Leagues User'), ['action' => 'edit', $leaguesUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Leagues User'), ['action' => 'delete', $leaguesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leaguesUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Leagues Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Leagues User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Leagues'), ['controller' => 'Leagues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New League'), ['controller' => 'Leagues', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="leaguesUsers view large-9 medium-8 columns content">
    <h3><?= h($leaguesUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('League') ?></th>
            <td><?= $leaguesUser->has('league') ? $this->Html->link($leaguesUser->league->name, ['controller' => 'Leagues', 'action' => 'view', $leaguesUser->league->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $leaguesUser->has('user') ? $this->Html->link($leaguesUser->user->Array, ['controller' => 'Users', 'action' => 'view', $leaguesUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($leaguesUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($leaguesUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($leaguesUser->modified) ?></td>
        </tr>
    </table>
</div>
