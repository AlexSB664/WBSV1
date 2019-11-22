<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Point $point
 */
?> <!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Points'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Competitions Users'), ['controller' => 'CompetitionsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competitions User'), ['controller' => 'CompetitionsUsers', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="points form large-9 medium-8 columns content">
    <?= $this->Form->create($point) ?>
    <fieldset>
        <legend><?= __('Agregar Puntos') ?></legend>
            <?= $this->Form->label('puntos', array('class'=> 'Puntos: ')); ?>
            <?= $this->Form->control('points', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
            <?= $this->Form->label('participante', array('class'=> 'Participante: ')); ?>
            <?= $this->Form->control('matches_user_id', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
            <?= $this->Form->label('nivel', array('class'=> 'Nivel: ')); ?>
            <?= $this->Form->control('stage', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Agregar'), array('class'=>'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>
