<body>
<div class="leagues index large-9 medium-8 columns content">
    <h3><?= __('Leagues') ?></h3>
    <table class="table striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('logo') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leagues as $league) : ?>
                <tr>
                    <td onclick="window.location='<?= $this->Url->build([
                            'controller' => 'leaderboard',
                            'action' => 'seasons',
                            $league->id
                        ]); ?>'">
                        <p>
                            <h3>Nombre:</h1>
                        </p>
                        <?= h($league->name) ?>
                        <br>
                        <?= $this->Html->image($league->logo, [
                                'alt' => "default-avatar",
                                'width' => '250', 'height' => '250'
                            ]); ?>
                        <br>
                        <p>Descripcion:</p>
                        <?= h($league->description) ?>
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