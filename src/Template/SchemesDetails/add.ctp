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
            <?= $this->Form->label('Esquema: '); ?>
            <?= $this->Form->control('scheme_id', ['options' => $schemes, 'class'=>'form-control', 'label'=>false]); ?>
            <?= $this->Form->label('Posicion: '); ?>
            <?= $this->Form->control('position',array('label'=>false, 'class'=>'form-control')); ?>
            <?= $this->Form->label('Puntos :'); ?>
            <?= $this->Form->control('points',array('label'=>false,'class'=>'form-control')); ?>
            <?= $this->Form->label('Puntos Adicionales: '); ?>
            <?= $this->Form->control('aditional_points',array('label'=>false,'class'=>'form-control')); ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Agregar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
