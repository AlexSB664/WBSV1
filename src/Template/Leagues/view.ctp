<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\League $league
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit League'), ['action' => 'edit', $league->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete League'), ['action' => 'delete', $league->id], ['confirm' => __('Are you sure you want to delete # {0}?', $league->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Leagues'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New League'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schemes'), ['controller' => 'Schemes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scheme'), ['controller' => 'Schemes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Seasons'), ['controller' => 'Seasons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Season'), ['controller' => 'Seasons', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="leagues view large-9 medium-8 columns content">
    <h3><?= h($league->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Logo') ?></th>
            <td><?= h($league->logo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($league->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($league->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Social Facebook') ?></th>
            <td><?= h($league->social_facebook) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Social Twitter') ?></th>
            <td><?= h($league->social_twitter) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Social Instagram') ?></th>
            <td><?= h($league->social_instagram) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Social Youtube') ?></th>
            <td><?= h($league->social_youtube) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Social Website') ?></th>
            <td><?= h($league->social_website) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Phone') ?></th>
            <td><?= h($league->contact_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Email') ?></th>
            <td><?= h($league->contact_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($league->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($league->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($league->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Schemes') ?></h4>
        <?php if (!empty($league->schemes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('League Id') ?></th>
                <th scope="col"><?= __('Is Default') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($league->schemes as $schemes): ?>
            <tr>
                <td><?= h($schemes->id) ?></td>
                <td><?= h($schemes->name) ?></td>
                <td><?= h($schemes->league_id) ?></td>
                <td><?= h($schemes->is_default) ?></td>
                <td><?= h($schemes->created) ?></td>
                <td><?= h($schemes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Schemes', 'action' => 'view', $schemes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Schemes', 'action' => 'edit', $schemes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Schemes', 'action' => 'delete', $schemes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schemes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Seasons') ?></h4>
        <?php if (!empty($league->seasons)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('League Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Date Start') ?></th>
                <th scope="col"><?= __('Date End') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($league->seasons as $seasons): ?>
            <tr>
                <td><?= h($seasons->id) ?></td>
                <td><?= h($seasons->name) ?></td>
                <td><?= h($seasons->description) ?></td>
                <td><?= h($seasons->league_id) ?></td>
                <td><?= h($seasons->status) ?></td>
                <td><?= h($seasons->date_start) ?></td>
                <td><?= h($seasons->date_end) ?></td>
                <td><?= h($seasons->created) ?></td>
                <td><?= h($seasons->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Seasons', 'action' => 'view', $seasons->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Seasons', 'action' => 'edit', $seasons->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Seasons', 'action' => 'delete', $seasons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seasons->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
