<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match $match
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $match->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $match->id)]
            )
        ?></li>
       <!-- <li><?= $this->Html->link(__('List Matches'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li> -->
    </ul>
</nav>
<div class="matches form large-9 medium-8 columns content">
    <?= $this->Form->create($match) ?>
    <fieldset>
        <legend><?= __('Edita Versus') ?></legend>
        <div class="form-row">
            <div class="col">
                <?= $this->Form->input('Competencia', ['options' => $competitions], array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Nivel', array('class'=> 'Nivel: ')); ?>
                <?= $this->Form->input('Nivel', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Puntos', array('class'=> 'Puntos: ')); ?>
                <?= $this->Form->input('Puntos', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Competidores', array('class'=> 'Competidores: ')); ?>
                <?= $this->Form->input('users._ids', ['options' => $users], array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Guardar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
