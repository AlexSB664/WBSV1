<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Season $season
 */
?> <!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Seasons'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Leagues'), ['controller' => 'Leagues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New League'), ['controller' => 'Leagues', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="seasons form large-9 medium-8 columns content">
    <?= $this->Form->create($season) ?>
    <fieldset>
        <legend><?= __('Agrega Temporada') ?></legend>
            <?= $this->Form->label('nombre', array('class'=>'Nombre: ')); ?>
            <?= $this->Form->control('name', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
            <?= $this->Form->label('descripcion', array('class'=>'Descripcion: ')); ?>
            <?= $this->Form->control('description', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
            <?= $this->Form->label('liga', array('class'=>'Liga: ')); ?>
            <?= $this->Form->control('league_id', ['options' => $leagues, 'label'=> false, 'class'=>'form-control col-md-7 col-xs-12']); ?>
            <?= $this->Form->control('status'); ?>
            <?= $this->Form->label('inicio', array('class'=>'Inicio: ')); ?>
            <?= $this->Form->control('date_start', array('label'=>false)); ?>
            <?= $this->Form->label('fin', array('class'=>'Fin: ')); ?>
            <?= $this->Form->control('date_end', array('label'=>false)); ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Agregar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
