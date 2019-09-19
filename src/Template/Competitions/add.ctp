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
    <?= $this->Form->create($competition, ['type' => 'file']); ?>
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
            <legend><?= __('Agregar Competencia') ?></legend>
            <?= $this->Form->label('Nombre: '); ?>
            <?= $this->Form->input('name', ['label' => false, 'class' => 'form-control']); ?>
            <?= $this->Form->label('Fecha: '); ?>
            <?= $this->Form->control('date', array('label' => false)); ?>
            <?= $this->Form->label('Slug: '); ?>
            <?= $this->Form->control('slug', ['label' => false]); ?>
            <?= $this->Form->label('Temporada: '); ?>
            <?= $this->Form->control('season_id', ['options' => $seasons, 'class' => 'form-control', 'label' => false]); ?>
            <?= $this->Form->label('Activa?:'); ?>
            <?= $this->Form->control('status', ['label' => false]); ?>
            <?= $this->Form->label('Localización: '); ?>
            <?= $this->Form->control('location_id', ['options' => $locations, 'class' => 'form-control', 'label' => false]); ?>
            <?= $this->Form->label('Esquema: '); ?>
            <?= $this->Form->control('scheme_id', ['options' => $schemes, 'empty' => true, 'class' => 'form-control', 'label' => false]); ?>
        </fieldset>
        <br>
        <?= $this->Form->button(__('Agregar'), array('class' => 'btn btn-default btn-lg')) ?>
        <?= $this->Form->end() ?>
</div>