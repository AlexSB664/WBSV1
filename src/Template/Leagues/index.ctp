<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\League[]|\Cake\Collection\CollectionInterface $leagues
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New League'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schemes'), ['controller' => 'Schemes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheme'), ['controller' => 'Schemes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Seasons'), ['controller' => 'Seasons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Season'), ['controller' => 'Seasons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="leagues index large-9 medium-8 columns content">
    <h3><?= __('Leagues') ?></h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('social_facebook') ?></th>
                <th scope="col"><?= $this->Paginator->sort('social_twitter') ?></th>
                <th scope="col"><?= $this->Paginator->sort('social_instagram') ?></th>
                <th scope="col"><?= $this->Paginator->sort('social_youtube') ?></th>
                <th scope="col"><?= $this->Paginator->sort('social_website') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leagues as $league): ?>
            <tr>
                <td><?= $this->Number->format($league->id) ?></td>
                <td><?= $this->Html->image($league->logo, ['alt' => "default-avatar",'width'=>'65','height'=>'55']); ?></td>
                <td><?= h($league->name) ?></td>
                <td><?= h($league->description) ?></td>
                <td><?= h($league->social_facebook) ?></td>
                <td><?= h($league->social_twitter) ?></td>
                <td><?= h($league->social_instagram) ?></td>
                <td><?= h($league->social_youtube) ?></td>
                <td><?= h($league->social_website) ?></td>
                <td><?= h($league->contact_phone) ?></td>
                <td><?= h($league->contact_email) ?></td>
                <td><?= h($league->created) ?></td>
                <td><?= h($league->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $league->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $league->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $league->id], ['confirm' => __('Are you sure you want to delete # {0}?', $league->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
