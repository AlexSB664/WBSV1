<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Season $season
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Seasons'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Leagues'), ['controller' => 'Leagues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New League'), ['controller' => 'Leagues', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Competitions Users'), ['controller' => 'CompetitionsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competitions User'), ['controller' => 'CompetitionsUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="seasons form large-9 medium-8 columns content">
    <?= $this->Form->create($season) ?>
    <fieldset>
        <legend><?= __('Add Season') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('league_id', ['options' => $leagues]);
            echo $this->Form->control('status');
            echo $this->Form->control('date_start');
            echo $this->Form->control('date_end');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
