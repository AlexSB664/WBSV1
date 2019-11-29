<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <div class="form-row">
            <div class="col">
                <?= $this->Form->label('Username', array('class'=> 'Username: ')); ?>
                <?= $this->Form->input('Username', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Nombre Completo', array('class'=> 'Nombre Completo: ')); ?>
                <?= $this->Form->input('Nombre Completo', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12'));?>
                <?= $this->Form->label('Aka', array('class'=> 'Aka: ')); ?>
                <?= $this->Form->input('Aka', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->input('Crew', ['options' => $crews, 'empty' => true,'class'=>'form-control']); ?>
                <?= $this->Form->label('Email', array('class'=> 'Email: ')); ?>
                <?= $this->Form->input('Email', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('contraseña', array('class'=> 'contraseña: ')); ?>
                <?= $this->Form->input('contraseña', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
            </div>
            <div class="col">
                <?= $this->Form->label('Rol', array('class'=> 'Rol: ')); ?>
                <?= $this->Form->input('Rol', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Estatus', array('class'=> 'Estatus: ')); ?>
                <?= $this->Form->input('Estatus', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Telefono', array('class'=> 'Telefono: ')); ?>
                <?= $this->Form->input('Telefono', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
                <?= $this->Form->label('Avatar', array('class'=> 'Avatar: ')); ?>
                <?= $this->Form->input('Avatar', array('label'=>false, 'class'=>'form-control col-md-7 col-xs-12')); ?>
            </div>
        </div>
        <br>
    </fieldset>
    <?= $this->Form->button(__('Agregar'), array('class'=>'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>
