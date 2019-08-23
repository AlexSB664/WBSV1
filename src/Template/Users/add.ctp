<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Crews'), ['controller' => 'Crews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crew'), ['controller' => 'Crews', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('fullname');
            echo $this->Form->control('aka');
            echo $this->Form->control('crew_id', ['options' => $crews, 'empty' => true]);
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('role');
            echo $this->Form->control('status');
            echo $this->Form->control('telephone');
            echo $this->Form->control('avatar');
            echo $this->Form->control('matches._ids', ['options' => $matches]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
