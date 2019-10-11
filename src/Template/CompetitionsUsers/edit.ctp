<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompetitionsUser $competitionsUser
 */
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $competitionsUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $competitionsUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Competitions Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="competitionsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($competitionsUser) ?>
    <fieldset>
        <legend><?= __('Edit Competitions User') ?></legend>
        <?php
            echo $this->Form->control('competitions_id', ['options' => $competitions,'class' => 'form-control']);
            echo $this->Form->control('users_id', ['options' => $users,'class' => 'form-control']);
            echo $this->Form->control('assistance');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editar'),array('class' => 'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
