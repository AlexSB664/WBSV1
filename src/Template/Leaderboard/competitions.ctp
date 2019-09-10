<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Competition[]|\Cake\Collection\CollectionInterface $competitions
 */
?>

<body class="login">



    <?php foreach ($competitions as $competition) : ?>
        <tr>
            <td><?= $this->Html->image($competition->flyer ? $competition->flyer : 'no', ['alt' => "default-avatar", 'width' => '65', 'height' => '55']); ?></td>
            <td><?= h($competition->name) ?></td>
            <td><?= h($competition->date) ?></td>
        <?php endforeach; ?>
        <div class="competitions index large-9 medium-8 columns content">
            <h3><?= __('Competencia') ?></h3>
            <table class="table striped">
                <thead>
                    <tr>
                        <th scope="col">Posicion</th>
                        <th scope="col">Freestyler</th>
                        <th scope="col">Crew</th>
                        <th scope="col">Puntos</th>
                    </tr>
                </thead>
                <tbody>

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