<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Competition $competition
 */
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $competition->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $competition->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Competitions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Seasons'), ['controller' => 'Seasons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Season'), ['controller' => 'Seasons', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schemes'), ['controller' => 'Schemes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheme'), ['controller' => 'Schemes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Competitions Users'), ['controller' => 'CompetitionsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competitions User'), ['controller' => 'CompetitionsUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="competitions form large-9 medium-8 columns content">
    <?= $this->Form->create($competition) ?>
    <fieldset>
        <legend><?= __('Editar Competencia') ?></legend>
            <?= $this->Form->label('fecha', array('class'=> 'Fecha: ')); ?>
            <?= $this->Form->control('date', array('label'=>false)); ?>
            <?= $this->Form->label('temporada', array('class'=> 'Temporada: ')); ?>
            <?= $this->Form->control('season_id', ['options' => $seasons, 'class'=>'form-control col-md-7 col-xs-12','label'=>false]); ?>
            <?= $this->Form->control('status'); ?>
            <?= $this->Form->label('localización', array('class'=> 'Localizacion: ')); ?>
            <?= $this->Form->control('location_id', ['options' => $locations, 'class'=>'form-control col-md-7 col-xs-12','label'=>false]); ?>
            <?= $this->Form->label('esquema', array('class'=> 'Esquema: ')); ?>
            <?= $this->Form->control('scheme_id', ['options' => $schemes, 'empty' => true, 'class'=>'form-control col-md-7 col-xs-12','label'=>false]); ?>
            <?= $this->Form->label('nombre', array('class'=> 'nombre: ')); ?>
            <?= $this->Form->control('name', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Guardar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
