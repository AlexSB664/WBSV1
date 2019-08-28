<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $location->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]
            )
        ?></li>
       <!-- <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?></li> -->
    </ul>
</nav>
<div class="locations form large-9 medium-8 columns content">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Edita Dirección') ?></legend>
        <div class="form-row">
            <div class="col">
                <?= $this->Form->label('Nombre', array('class'=> 'Nombre: ')); ?>
                <?= $this->Form->input('Nombre', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Dirección', array('class'=> 'Dirección: ')); ?>
                <?= $this->Form->input('Dirección', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Latitud', array('class'=> 'Latitud: ')); ?>
                <?= $this->Form->input('Latitud', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Longitud', array('class'=> 'Longitud: ')); ?>
                <?= $this->Form->input('Longitud', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Tipo', array('class'=> 'Tipo: ')); ?>
                <?= $this->Form->input('Tipo', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Editar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
