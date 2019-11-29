<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompetitionsUser $competitionsUser
 */
?>
<div class="competitionsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($competitionsUser) ?>
    <fieldset>
        <legend><?= __('Add Competitions User') ?></legend>
        <?php
        echo $this->Form->control('competitions_id', ['options' => $competitions]);
        echo $this->Form->control('users_id', ['options' => $users, 'multiple' => 'checkbox']);
        echo $this->Form->control('assistance', ['hidden' => true, 'label' => false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar'), array('class' => 'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>