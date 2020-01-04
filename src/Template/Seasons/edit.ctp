<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Season $season
 */
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $season->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $season->id)]
            )
            ?></li>
        <li><?= $this->Html->link(__('List Seasons'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Leagues'), ['controller' => 'Leagues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New League'), ['controller' => 'Leagues', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="seasons form large-9 medium-8 columns content">
    <?= $this->Form->create($season, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Editar Temporada') ?></legend>
        <?= $this->Form->label('nombre', array('class' => 'Nombre: ')); ?>
        <?= $this->Form->control('name', array('label' => false, 'class' => 'form-control')); ?>
        <?= $this->Form->label('descripcion', array('class' => 'Descripcion: ')); ?>
        <?= $this->Form->control('description', array('label' => false, 'class' => 'form-control')); ?>
        <?= $this->Form->control('league_id', ['options' => $leagues, 'class' => 'form-control']); ?>
        <?= $this->Form->label('estatus', array('class' => 'Estatus: ')); ?>
        <?= $this->Form->control('status', array('label' => false, 'class' => 'form-control')); ?>
        <?= $this->Form->label('slug', array('class' => 'Slug: ')); ?>
        <?= $this->Form->control('slug', array('label' => false, 'class' => 'form-control')); ?>
        <?= $this->Form->label('Flyer: '); ?>
        <?= $this->Form->file('flyer', array(
            'type' => 'file',
            'accept' => 'image/*',
            'onchange' => 'loadFile(event)',
            'class' => 'form-control',
        )); ?>
        <?= $this->Html->image($season->flyer, ['id' => 'output', 'width' => '75', 'height' => '75']); ?>
        <div class="row" style="padding-left: 20px; padding-right: 20px;">
            <div class="col-md-6 col-md-offset-3" style="clear:both;" id="img-alert">
            </div>
        </div>
        <script>
            var loadFile = function(event) {
                document.getElementById("img-alert").innerHTML = "";
                var output = document.getElementById('output');
                if (ValidateSize(event, output)) {
                    output.src = URL.createObjectURL(event.target.files[0]);
                }
            };

            function ValidateSize(event, output) {
                var accept = true;
                fileSize = event.target.files[0].size / 1024 / 1024;
                if (fileSize > 2) {
                    accept = false;
                    event.target.value = null;
                    showAlert();
                }
                return accept;
            }

            function showAlert() {
                document.getElementById("img-alert").innerHTML = '<div class="alert alert-dismissible alert-danger text-center" id="img-alert-div"></div>';
                document.getElementById("img-alert-div").innerHTML = '<button type="button" class="close" data-dismiss="alert">×</button>';
                document.getElementById("img-alert-div").innerHTML += 'La foto sobrepasa los 2 MB por favor intenta con otra  :(';

            }
        </script>
        <br>
        <?= $this->Form->label('inicio', array('class' => 'Inicio: ')); ?>
        <?= $this->Form->control('date_start', array('label' => false, 'type' => 'datetime-local')); ?>
        <?= $this->Form->label('fin', array('class' => 'Fin: ')); ?>
        <?= $this->Form->control('date_end', array('label' => false, 'type' => 'datetime-local')); ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar'), array('class' => 'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>