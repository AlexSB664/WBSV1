<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Point $point
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Points'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Competitions Users'), ['controller' => 'CompetitionsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competitions User'), ['controller' => 'CompetitionsUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="points form large-9 medium-8 columns content">
    <?= $this->Form->create($point) ?>
    <fieldset>
        <legend><?= __('Add Point') ?></legend>
        <?php
            echo $this->Form->control('points');
            echo $this->Form->control('matches_user_id');
            echo $this->Form->control('stage');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
