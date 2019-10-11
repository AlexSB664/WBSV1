<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompetitionUser $competitionUser
 */
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Competition User'), ['action' => 'edit', $competitionUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Competition User'), ['action' => 'delete', $competitionUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $competitionUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Competition Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Competition User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav> -->
<div class="competitionUsers view large-9 medium-8 columns content">
    <h3><?= h($competitionUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Competition') ?></th>
            <td><?= $competitionUser->has('competition') ? $this->Html->link($competitionUser->competition->id, ['controller' => 'Competitions', 'action' => 'view', $competitionUser->competition->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $competitionUser->has('user') ? $this->Html->link($competitionUser->user->id, ['controller' => 'Users', 'action' => 'view', $competitionUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($competitionUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($competitionUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($competitionUser->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assistance') ?></th>
            <td><?= $competitionUser->assistance ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
