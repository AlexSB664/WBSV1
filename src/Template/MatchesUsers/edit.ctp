<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MatchesUser $matchesUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $matchesUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $matchesUser->id)]
            )
        ?></li>
     <!--   <li><?= $this->Html->link(__('List Matches Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li> -->
    </ul>
</nav>
<div class="matchesUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($matchesUser) ?>
    <fieldset>
        <legend><?= __('Edita Versus') ?></legend>
        <div class="form-row">
            <div class="col">
                <?= $this->Form->input('Emparejamiento: ', ['options' => $matches]); ?>
                <?= $this->Form->input('Competidores: ', ['options' => $users]); ?>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit'), array('class'=>'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
