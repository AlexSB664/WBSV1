<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Competition $competition
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Competitions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Seasons'), ['controller' => 'Seasons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Season'), ['controller' => 'Seasons', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="competitions form large-9 medium-8 columns content">
    <?= $this->Form->create($competition) ?>
    <fieldset>
        <legend><?= __('Agregar Competencia') ?></legend>
        <div class="form-row">
            <div class="col">
                <?= $this->Form->label('Fecha', array('class'=> 'Fecha: ')); ?>
                <?= $this->Form->control('Fecha',array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Hora', array('class'=> 'Hora: ')); ?>
                <?= $this->Form->div('Hora', array('label'=>false,'type'=>'time', 'name'=>'appt', 'class'=>'input-group date')); ?>
                <?= $this->Form->input('Temporada:',['options' => $seasons,'class'=>'form-control']); ?>
                <?= $this->Form->input('Localizacion', ['options'=> $locations,'class'=>'form-control']); ?>
            </div>
        </div>
        <br>
    </fieldset>
    <?= $this->Form->button(__('Agregar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
