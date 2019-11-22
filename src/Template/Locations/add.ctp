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
                <?= $this->Form->label('Nombre: '); ?>
                <?= $this->Form->input('name', array('label'=>false, 'class'=> 'form-control')); ?>
                <?= $this->Form->label('Ciudad:'); ?>
                <?= $this->Form->input('city', array('label'=>false, 'class'=> 'form-control')); ?>
                <?= $this->Form->label('Dirección:'); ?>
                <?= $this->Form->input('address', array('label'=>false, 'class'=> 'form-control')); ?>
                <?= $this->Form->label('Latitud: '); ?>
                <?= $this->Form->input('lat', array('label'=>false, 'class'=> 'form-control')); ?>
                <?= $this->Form->label('Longitud: '); ?>
                <?= $this->Form->input('lng', array('label'=>false, 'class'=> 'form-control')); ?>
                <?= $this->Form->label('Tipo: '); ?>
                <?= $this->Form->input('type', array('label'=>false, 'class'=> 'form-control')); ?>
            </div>
        </div>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Agregar'), array('class'=>'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>
