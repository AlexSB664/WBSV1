<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SchemesDetail $schemesDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Schemes Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schemes'), ['controller' => 'Schemes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheme'), ['controller' => 'Schemes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schemesDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($schemesDetail) ?>
    <fieldset>
        <legend><?= __('Add Schemes Detail') ?></legend>
        <?php
            echo $this->Form->control('scheme_id', ['options' => $schemes]);
            echo $this->Form->control('position');
            echo $this->Form->control('points');
            echo $this->Form->control('aditional_points');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
