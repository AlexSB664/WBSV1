<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match $match
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Competitions'), ['controller' => 'Competitions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Competition'), ['controller' => 'Competitions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<?php if (isset($competition)) : ?>
    <div class="matches form large-9 medium-8 columns content">
        <?= $this->Form->create($match) ?>
        <fieldset>
            <legend><?= __('Add Match') ?></legend>
            <?php
                echo $this->Form->control('competition_id', ['options' => $competition]);
                echo $this->Form->control('stage');
                echo $this->Form->control('points');
                echo $this->Form->label('winner');
                echo $this->Form->control('user_id', ['label' => false]);
                echo $this->Form->control('users._ids', ['options' => $users,'multiple'=>'checkbox']);
                ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
<?php else : ?>
    <table class="table">
        <thead>
            <tr>
                <th>all competitions</th>
                <th>suscribir a patin</th>
                <th>tomar asistencia</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($competitions as $competition) : ?>
                <tr>
                    <td> + <?= $this->Html->link($competition->name, ['controller' => 'Matches', 'action' => 'lazyAdd', $competition->id]) ?></td>
                    <td> + <?= $this->Html->link('susbribir en '.$competition->name, ['controller' => 'CompetitionsUsers', 'action' => 'lazyAdd', $competition->id]) ?></td>
                    <td>+ <?= $this->Html->link( 'Asistencia de '.$competition->name, ['controller' => 'CompetitionsUsers', 'action' => 'index', $competition->id]) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>