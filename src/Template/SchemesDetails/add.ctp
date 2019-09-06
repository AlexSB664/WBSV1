<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SchemesDetail $schemesDetail
 */
?> <!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Schemes Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schemes'), ['controller' => 'Schemes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheme'), ['controller' => 'Schemes', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="schemesDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($schemesDetail) ?>
    <fieldset>
        <legend><?= __('Agregar Detalle de Esquema') ?></legend>
            <?= $this->Form->label('esquema', array('class'=> 'Esquema: ')); ?>
            <?= $this->Form->control('scheme_id', ['options' => $schemes, 'class'=>'form-control col-md-7 col-xs-12', 'label'=>false]); ?>
            <?= $this->Form->label('posicion', array('class'=> 'Posicion: ')); ?>
            <?= $this->Form->control('position',array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
            <?= $this->Form->label('puntos', array('class'=> 'Puntos: ')); ?>
            <?= $this->Form->control('points',array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
            <?= $this->Form->label('puntos Adicionales', array('class'=> 'puntosAdicionales: ')); ?>
            <?= $this->Form->control('aditional_points',array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Agregar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
