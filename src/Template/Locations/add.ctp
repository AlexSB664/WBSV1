<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?></li>
    </ul>
</nav> -->
<div class="locations form large-9 medium-8 columns content">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Agregar Dirección') ?></legend>
        <div class="form-row">
            <div class="col">
                <?= $this->Form->label('nombre', array('class'=> 'Nombre: ')); ?>
                <?= $this->Form->input('name', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('dirección', array('class'=> 'Dirección: ')); ?>
                <?= $this->Form->input('direction', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('latitud', array('class'=> 'Latitud: ')); ?>
                <?= $this->Form->input('latitude', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('longitud', array('class'=> 'Longitud: ')); ?>
                <?= $this->Form->input('Longitud', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('tipo', array('class'=> 'Tipo: ')); ?>
                <?= $this->Form->input('type', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
            </div>
        </div>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Agregar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
