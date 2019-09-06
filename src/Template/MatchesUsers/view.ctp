<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MatchesUser $matchesUser
 */
?><!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Matches User'), ['action' => 'edit', $matchesUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Matches User'), ['action' => 'delete', $matchesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matchesUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Matches Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Matches User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>-->
<div class="matchesUsers view large-9 medium-8 columns content">
    <h3>Combate <?= h($matchesUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $matchesUser->has('user') ? $this->Html->link($matchesUser->user->id, ['controller' => 'Users', 'action' => 'view', $matchesUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($matchesUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Match Id') ?></th>
            <td><?= $this->Number->format($matchesUser->match_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($matchesUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($matchesUser->modified) ?></td>
        </tr>
    </table>
</div>
