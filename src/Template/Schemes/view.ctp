<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scheme $scheme
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Scheme'), ['action' => 'edit', $scheme->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Scheme'), ['action' => 'delete', $scheme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scheme->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schemes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scheme'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Leagues'), ['controller' => 'Leagues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New League'), ['controller' => 'Leagues', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schemes Details'), ['controller' => 'SchemesDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schemes Detail'), ['controller' => 'SchemesDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="schemes view large-9 medium-8 columns content">
    <h3><?= h($scheme->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($scheme->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('League') ?></th>
            <td><?= $scheme->has('league') ? $this->Html->link($scheme->league->name, ['controller' => 'Leagues', 'action' => 'view', $scheme->league->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($scheme->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($scheme->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($scheme->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Default') ?></th>
            <td><?= $scheme->is_default ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Schemes Details') ?></h4>
        <?php if (!empty($scheme->schemes_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Scheme Id') ?></th>
                <th scope="col"><?= __('Position') ?></th>
                <th scope="col"><?= __('Points') ?></th>
                <th scope="col"><?= __('Aditional Points') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($scheme->schemes_details as $schemesDetails): ?>
            <tr>
                <td><?= h($schemesDetails->id) ?></td>
                <td><?= h($schemesDetails->scheme_id) ?></td>
                <td><?= h($schemesDetails->position) ?></td>
                <td><?= h($schemesDetails->points) ?></td>
                <td><?= h($schemesDetails->aditional_points) ?></td>
                <td><?= h($schemesDetails->created) ?></td>
                <td><?= h($schemesDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SchemesDetails', 'action' => 'view', $schemesDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SchemesDetails', 'action' => 'edit', $schemesDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SchemesDetails', 'action' => 'delete', $schemesDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schemesDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
