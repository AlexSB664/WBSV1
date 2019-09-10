<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match $match
 */
?><!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $match->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $match->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
<div class="matches form large-9 medium-8 columns content">
    <?= $this->Form->create($match) ?>
    <fieldset>
        <legend><?= __('Editar Pelea') ?></legend>
            <?= $this->Form->label('competencia', array('class'=> 'Competencia: ')); ?>
            <?= $this->Form->control('competition_id', ['options' => $competitions, 'class'=>'form-control col-md-7 col-xs-12', 'label'=>false]);?>
            <?= $this->Form->label('nivel', array('class'=> 'Nivel: ')); ?>
            <?= $this->Form->control('stage', array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12'));?>
            <?= $this->Form->label('puntos', array('class'=> 'Puntos: ')); ?>
            <?= $this->Form->control('points',array('label'=>false, 'class'=> 'form-control col-md-7 col-xs-12')); ?>
            <?= $this->Form->label('competidores', array('class'=> 'Competidores: ')); ?>
            <?= $this->Form->control('users._ids', ['options' => $users, 'class'=>'form-control col-md-7 col-xs-12', 'label'=>false]); ?>
            <?= $this->Form->label('ganador', array('class'=> 'Ganador: ')); ?>
            <?= $this->Form->control('winner', ['options' => $users, 'class'=>'form-control col-md-7 col-xs-12', 'label'=>false]); ?>
            
    </fieldset>
    <br>
    <?= $this->Form->button(__('Guardar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
