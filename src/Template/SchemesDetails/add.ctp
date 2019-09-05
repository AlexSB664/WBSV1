<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SchemesDetail $schemesDetail
 */
?>
 <!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Schemes Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schemes'), ['controller' => 'Schemes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheme'), ['controller' => 'Schemes', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="schemesDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($schemesDetail) ?>
    <fieldset>
        <legend><?= __('Add Schemes Detail') ?></legend>
        <div class="form-row">
            <div class="col">
                <?= $this->Form->input('Esquema: ', ['options' => $schemes], array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Posicion', array('class'=> 'Posicion: ')); ?>
                <?= $this->Form->input('Posicion', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Puntos', array('class'=> 'Puntos: ')); ?>
                <?= $this->Form->input('Puntos', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Puntos Adicionales', array('class'=> 'Puntos Adicionales: ')); ?>
                <?= $this->Form->input('Puntos Adicionales', array('label'=>false,'class'=>'form-control col-md-7 col-xs-12')); ?>
            </div>
        </div>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Enviar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
