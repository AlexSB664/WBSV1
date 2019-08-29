<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Season $season
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
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
        <legend><?= __('Agregar Temporada') ?></legend>
        <div class="form-row">
            <div class="col">
                <?= $this->Form->label('Nombre', array('class'=> 'Nombre: ')); ?>
                <?= $this->Form->input('Nombre', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Descripcion', array('class'=> 'Descripcion: ')); ?>
                <?= $this->Form->input('Descripcion', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->input('Liga', ['options' => $leagues,'class'=>'form-control']); ?>
                <?= $this->Form->label('Estatus', array('class'=> 'Estatus: ')); ?>
                <?= $this->Form->input('Estatus', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Fecha de Inicio', array('class'=> 'Fecha de Inicio: ')); ?>
                <?= $this->Form->input('Fecha de Inicio', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Fecha Fin', array('class'=> 'Fecha Fin: ')); ?>
                <?= $this->Form->input('Fecha Fin', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Agregar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
