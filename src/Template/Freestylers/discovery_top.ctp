<!-- HEADER -->
<?php $user_info=null;foreach ($userTop as $info){$user_info=$info;}?>
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('/img/<?= $user_info->user->head_bg ?>');" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                <h1 class="league-title text-white">WBS Coliseum</h1>
                <h1 class="seasson-title">Presenta</h1>
                    <h1 class="event-title">Top <?= $user_info->position ?> de Freestylers</h1>
            </div>
        </div>
    </div>
</div>
<!-- HEADER END -->
<?php if (!$user_info) : ?>
    <div class="col-12 text-center py-12">
        <h1> Estamos trabajando en la tabla :(</h1>
    </div>
<?php endif ?>

<!-- Freestylers -->
<div class="row">
        <div class="col-12 text-center py-12">
            <h1>Top <?= $user_info->position ?> </h1>
            <?= $this->Html->image($user_info->user->avatar, ['alt' => "", 'width' => '350px', 'height' => '350px']); ?>
            <br>
            <h1><?= $user_info->user->aka ?> </h1>
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