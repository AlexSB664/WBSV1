<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LeaguesUser $leaguesUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $leaguesUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $leaguesUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Leagues Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Leagues'), ['controller' => 'Leagues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New League'), ['controller' => 'Leagues', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="leaguesUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($leaguesUser) ?>
    <fieldset>
        <legend><?= __('Edit Leagues User') ?></legend>
        <?php
            echo $this->Form->control('league_id', ['options' => $leagues]);
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
