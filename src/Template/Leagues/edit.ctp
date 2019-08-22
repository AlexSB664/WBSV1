<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\League $league
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $league->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $league->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Leagues'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schemes'), ['controller' => 'Schemes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheme'), ['controller' => 'Schemes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Seasons'), ['controller' => 'Seasons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Season'), ['controller' => 'Seasons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="leagues form large-9 medium-8 columns content">
    <?= $this->Form->create($league) ?>
    <fieldset>
        <legend><?= __('Edit League') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('social_facebook');
            echo $this->Form->control('social_twitter');
            echo $this->Form->control('social_instagram');
            echo $this->Form->control('social_youtube');
            echo $this->Form->control('social_website');
            echo $this->Form->control('contact_phone');
            echo $this->Form->control('contact_email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
