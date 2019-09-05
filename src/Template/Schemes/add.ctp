<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scheme $scheme
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Schemes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Leagues'), ['controller' => 'Leagues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New League'), ['controller' => 'Leagues', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schemes Details'), ['controller' => 'SchemesDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schemes Detail'), ['controller' => 'SchemesDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schemes form large-9 medium-8 columns content">
    <?= $this->Form->create($scheme) ?>
    <fieldset>
        <legend><?= __('Add Scheme') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('league_id', ['options' => $leagues]);
            echo $this->Form->control('is_default');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
