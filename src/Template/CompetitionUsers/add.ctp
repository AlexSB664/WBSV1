<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompetitionUser $competitionUser
 */
?>
<div class="competitionUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($competitionUser) ?>
    <fieldset>
        <legend><?= __('Agregar Asistencia') ?></legend>
        <div class="form-row">
            <div class="col">
                <?= $this->Form->input('competitions_id', ['options' => $competitions, 'class'=>'form-control']); ?>
                <?= $this->Form->input('users_id', ['options' => $users, 'class'=>'form-control']); ?>
                <?= $this->Form->control('assistance', array('class'=> 'js-switch')); ?>
            </div>
        </div>
        <br>
    </fieldset>
    <?= $this->Form->button(__('Agregar'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
