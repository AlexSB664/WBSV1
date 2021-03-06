<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MatchesUser $matchesUser
 */
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Matches Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="matchesUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($matchesUser) ?>
    <fieldset>
        <legend><?= __('Agregar Combate') ?></legend>
        <?= $this->Form->label('combate', array('class'=> 'Combate: ')); ?>
            <?= $this->Form->control('match_id',array('class'=> 'form-control')); ?>
            <?= $this->Form->label('participante', array('class'=> 'Participante: ')); ?>
            <?= $this->Form->control('user_id', ['options' => $users,array('label'=>false,'class'=>'form-control')]); ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar'), array('class'=>'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>
