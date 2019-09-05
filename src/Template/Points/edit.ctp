<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Point $point
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $point->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $point->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Points'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="points form large-9 medium-8 columns content">
    <?= $this->Form->create($point) ?>
    <fieldset>
        <legend><?= __('Edit Point') ?></legend>
        <?php
            echo $this->Form->control('points');
            echo $this->Form->control('competitions_users_id');
            echo $this->Form->control('stage');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
