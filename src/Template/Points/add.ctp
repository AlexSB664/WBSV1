<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Point $point
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Points'), ['action' => 'index']) ?></li>
    </ul>
</nav> 
<div class="points form large-9 medium-8 columns content">
    <?= $this->Form->create($point) ?>
    <fieldset>
        <legend><?= __('Agrega Punto') ?></legend>
        <div class="form-row">
            <div class="col">
                <?= $this->Form->label('Puntos', array('class'=> 'Puntos: ')); ?>
                <?= $this->Form->input('Puntos',array('label'=>false,'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Competidor', array('class'=> 'Competidor: ')); ?>
                <?= $this->Form->input('Competidor',array('label'=>false,'class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Nivel', array('class'=> 'Nivel: ')); ?>
                <?= $this->Form->input('Nivel',array('label'=>false,'class'=> 'form-control col-md-7 col-xs-12')); ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Enviar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
