<?php foreach ($userTop as $info) : ?>
    <h1>Top <?= $info->position ?> </h1>
    <?= $this->Html->image($info->user->avatar, ['alt' => "", 'width' => '350px', 'height' => '350px']); ?>
    <br>
    <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'profile',$info->user->id]); ?>"  target="_blank">
        <h2><?= $info->user->aka ?> </h2>
    </a>
    <h3>Puntos: <?= $info->points ?></h3>
<?php endforeach ?>

<div class="pagination p11" style="padding: 30px 0;">
    <ul class="pagination">
        <?php if ($this->Paginator->hasPrev()) : ?>
            <?= $this->Paginator->prev('<' . __('previous')) ?>
        <?php endif ?>
    </ul>
    <ul class="pagination">
        <?php if ($this->Paginator->hasNext()) : ?>
            <?= $this->Paginator->next(__('next') . '>') ?>
        <?php endif ?>
    </ul>
</div>