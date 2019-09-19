<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Crews'), ['controller' => 'Crews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crew'), ['controller' => 'Crews', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['type' => 'file']); ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('username',array( 'class'=>'form-control'));
            echo $this->Form->control('fullname',array( 'class'=>'form-control'));
            echo $this->Form->control('aka',array( 'class'=>'form-control'));
            echo $this->Form->control('crew_id', ['options' => $crews, 'empty' => true,'class'=>'form-control']);
            echo $this->Form->control('email',array( 'class'=>'form-control'));
            echo $this->Form->control('password',array( 'class'=>'form-control'));
            echo $this->Form->control('role',array( 'class'=>'form-control'));
            echo $this->Form->control('status',array( 'class'=>'form-control'));
            echo $this->Form->control('telephone',array( 'class'=>'form-control'));
            echo $this->Form->control('avatar',['class'=>'form-control','type'=>'file']);
            echo $this->Form->control('head_bg',['class'=>'form-control','type'=>'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
