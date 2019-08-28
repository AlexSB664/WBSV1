<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\League $league
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Leagues'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schemes'), ['controller' => 'Schemes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheme'), ['controller' => 'Schemes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Seasons'), ['controller' => 'Seasons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Season'), ['controller' => 'Seasons', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="leagues form large-9 medium-8 columns content">
    <?= $this->Form->create($league) ?>
    <fieldset>
        <legend><?= __('Agregar Liga') ?></legend>
        <div class="form-row">
            <div class="col">
                <?= $this->Form->label('Nombre', array('class'=> 'Nombre: ')); ?>
                <?= $this->Form->input('Nombre',array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Descripción', array('class'=> 'Descripción: ')); ?>
                <?= $this->Form->input('Descripción', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Facebook', array('class'=>'Facebook: ')); ?>
                <?= $this->Form->input('Facebook', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Twitter', array('class'=>'Twitter: ')); ?>
                <?= $this->Form->input('Twitter', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Instagram', array('class'=>'Instagram: ')); ?>
                <?= $this->Form->input('Instagram', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Youtube', array('class'=>'Youtube: ')); ?>
                <?= $this->Form->input('Youtube', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Website', array('class'=>'Website: ')); ?>
                <?= $this->Form->input('Website', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Teléfono', array('class'=>'Teléfono: ')); ?>
                <?= $this->Form->input('Teléfono', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Email', array('class'=>'Email: ')); ?>
                <?= $this->Form->input('Email', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Agregar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
