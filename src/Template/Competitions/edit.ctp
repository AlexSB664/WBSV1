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
    <?= $this->Form->create($competition, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Editar Competencia') ?></legend>
        <?= $this->Form->label('Nombre: '); ?>
        <?= $this->Form->control('name', array('label' => false, 'class' => 'form-control')); ?>
        <?= $this->Form->label('Flyer: '); ?>
        <?= $this->Form->file('flyer', array(
            'type' => 'file',
            'accept' => 'image/*',
            'onchange' => 'loadFile(event)',
            'class' => 'form-control',
        )); ?>
        <?= $this->Html->image($competition->flyer, ['id' => 'output', 'width' => '75', 'height' => '75']); ?>

        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        <br>
        <?= $this->Form->label('Slug: '); ?>
        <?= $this->Form->control('slug', array('label' => false, 'class' => 'form-control')); ?>
        <?= $this->Form->label('Fecha: '); ?>
        <?= $this->Form->control('date', ['type' => 'datetime-local', 'label' => false, 'value' => strftime('%Y-%m-%dT%H:%M:%S', strtotime($competition->date))]); ?>
        <?= $this->Form->label('Temporada: '); ?>
        <?= $this->Form->control('season_id', ['options' => $seasons, 'class' => 'form-control', 'label' => false]); ?>
        <?= $this->Form->label('Activo: '); ?>
        <?= $this->Form->control('status', ['class' => 'form-control', 'label' => false]); ?>
        <?= $this->Form->label('Localización: '); ?>
        <?= $this->Form->control('location_id', ['options' => $locations, 'class' => 'form-control', 'label' => false]); ?>
        <?= $this->Form->label('Esquema: '); ?>
        <?= $this->Form->control('scheme_id', ['options' => $schemes, 'empty' => true, 'class' => 'form-control', 'label' => false]); ?>
        <?= $this->Form->label('Bonus: '); ?>
        <?= $this->Form->control('bonus', ['label' => false]); ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Guardar'), array('class' => 'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>