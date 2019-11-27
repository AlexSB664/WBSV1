<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Season $season
 */
?> <!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
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
    <?= $this->Form->create($season, ['type' => 'file']); ?>
    <fieldset>
        <legend><?= __('Add League') ?></legend>
        <?= $this->Form->file('flyer', array(
            'type' => 'file',
            'accept' => 'image/*',
            'onchange' => 'loadFile(event)'
        )); ?>
        <img id="output" width="75" height="75" />
        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
    <fieldset>
        <legend><?= __('Agrega Temporada') ?></legend>
            <?= $this->Form->label('nombre', array('class'=>'Nombre: ')); ?>
            <?= $this->Form->control('name', array('label'=>false, 'class'=>'form-control')); ?>
            <?= $this->Form->label('descripcion', array('class'=>'Descripcion: ')); ?>
            <?= $this->Form->control('description', array('label'=>false, 'class'=>'form-control')); ?>
            <?= $this->Form->label('liga', array('class'=>'Liga: ')); ?>
            <?= $this->Form->control('league_id', ['options' => $leagues, 'label'=> false, 'class'=>'form-control']); ?>
            <?= $this->Form->control('status'); ?>
            <?= $this->Form->control('slug',array('class'=>'form-control')); ?>
            <?= $this->Form->label('inicio', array('class'=>'Inicio: ')); ?>
            <?= $this->Form->control('date_start', array('label'=>false,'type'=>'datetime-local')); ?>
            <?= $this->Form->label('fin', array('class'=>'Fin: ')); ?>
            <?= $this->Form->control('date_end', array('label'=>false,'type'=>'datetime-local')); ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Agregar'), array('class'=>'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>
