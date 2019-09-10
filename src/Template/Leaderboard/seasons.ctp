<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Season[]|\Cake\Collection\CollectionInterface $seasons
 */
?>
<body>
<div class="seasons index large-9 medium-8 columns content">
    <h3><?= __('Temporadas') ?></h3>
    <table class="table striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('flyer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($seasons as $season): ?>
            <tr>
                <td><?= $this->Html->image($season->flyer?$season->flyer:'no', ['alt' => "default-avatar",'width'=>'65','height'=>'55']); ?></td>
                <td><?= h($season->name) ?></td>
                <td><?= h($season->description) ?></td>
                <td><i class="material-icons dp48" onclick="window.location='<?= $this->Url->build([
                            'controller' => 'leaderboard',
                            'action' => 'competitions',
                            $season->id
                        ]); ?>'">info</i>
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