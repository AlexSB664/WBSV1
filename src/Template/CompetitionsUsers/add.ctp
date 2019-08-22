<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompetitionsUser $competitionsUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Competitions Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Seasons'), ['controller' => 'Seasons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Season'), ['controller' => 'Seasons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="competitionsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($competitionsUser) ?>
    <fieldset>
        <legend><?= __('Add Competitions User') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('season_id', ['options' => $seasons]);
            echo $this->Form->control('status');
            echo $this->Form->control('localitation_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
