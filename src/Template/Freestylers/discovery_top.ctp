<?php foreach ($userTop as $user_info) : ?>
    <!-- Freestylers -->
    <div class="row coliseum">
        <div class="col-12 text-center" >
            <?= $this->Html->image($user_info->user->head_bg, ['alt' => "jeje"]); ?>
        </div>
    </div>
    <div class="row coliseum">
        <div class="col-12 text-center py-12">
            <h1>Top <?= $user_info->position ?> : <?= $user_info->user->aka ?> </h1>
            <h2>Puntos: <?= $user_info->points ?></h2>
            <button type="button" class="btn btn-outline-info btn-lg" onclick="window.open('<?= $this->Url->build(['controller' => 'users', 'action' => 'profile', $user_info->user->id]); ?>','_blank'); ">Perfil</button>
        </div>
    </div>
    <!-- Freestylers END -->

    <!-- PAGINATE -->
    <div class="container paginate-alex" style="padding: 50px 250px;">
        <div class="row">
            <div class="col-6 text-center py-6">
                <?php if ($this->Paginator->hasPrev()) : ?>
                    <?= $this->Paginator->prev(__('Anterior')) ?>
                <?php endif ?>
            </div>
            <div class="col-6 text-center py-6">
                <?php if ($this->Paginator->hasNext()) : ?>
                    <?= $this->Paginator->next(__('Siguiente')) ?>
                <?php endif ?>
            </div>
        </div>
    </div>
    <!-- PAGINATE END -->
<?php endforeach ?>