<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scheme $scheme
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $scheme->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $scheme->id)]
            )
        ?></li>
       <!-- <li><?= $this->Html->link(__('List Schemes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Leagues'), ['controller' => 'Leagues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New League'), ['controller' => 'Leagues', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schemes Details'), ['controller' => 'SchemesDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schemes Detail'), ['controller' => 'SchemesDetails', 'action' => 'add']) ?></li> -->
    </ul>
</nav>
<div class="schemes form large-9 medium-8 columns content">
    <?= $this->Form->create($scheme) ?>
    <fieldset>
        <legend><?= __('Editar Esquema') ?></legend>
        <div class="form-row">
            <div class="col">
                <?= $this->Form->label('Nombre', array('class'=> 'Nombre: ')); ?>
                <?= $this->Form->input('Nombre', array('label'=> false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->input('Liga', ['options' => $leagues],array('class'=> 'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Valor Predeterminado', array('class'=> 'Valor Predeterminado: ')); ?>
                <?= $this->Form->input('Valor Predeterminado',array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Enviar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
