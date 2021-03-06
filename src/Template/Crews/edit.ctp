<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Crew $crew
 */
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $crew->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $crew->id)]
            )
        ?></li>
     <!--   <li><?= $this->Html->link(__('List Crews'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li> -->
    </ul>
</nav> -->
<div class="crews form large-9 medium-8 columns content">
    <?= $this->Form->create($crew) ?>
    <fieldset>
        <legend><?= __('Editar Crew') ?></legend>
            <?= $this->Form->label('nombre', array('class'=> 'Nombre: ')); ?>
            <?= $this->Form->control('name', array('label'=>false, 'class'=>'form-control'));?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Guardar'), array('class'=>'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>
