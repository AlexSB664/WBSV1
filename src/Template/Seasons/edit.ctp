<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Season $season
 */
?> <!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $season->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $season->id)]
            )
        ?></li>
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
        <legend><?= __('Editar Temporada') ?></legend>
            <?= $this->Form->label('nombre', array('class'=>'Nombre: ')); ?>
            <?= $this->Form->control('name', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
            <?= $this->Form->label('descripcion', array('class'=>'Descripcion: ')); ?>
            <?= $this->Form->control('description', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
            <?= $this->Form->label('liga', array('class'=>'Liga: ')); ?>
            <?= $this->Form->control('league_id', ['options' => $leagues]); ?>
            <?= $this->Form->label('estatus', array('class'=>'Estatus: ')); ?>
            <?= $this->Form->control('status', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
            <?= $this->Form->label('slug', array('class'=>'Slug: ')); ?>
            <?= $this->Form->control('slug', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
            <?= $this->Form->label('inicio', array('class'=>'Inicio: ')); ?>
            <?= $this->Form->control('date_start'); ?>
            <?= $this->Form->label('fin', array('class'=>'Fin: ')); ?>
            <?= $this->Form->control('date_end'); ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
