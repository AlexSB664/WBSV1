<!-- HEADER -->
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('/img/hero_bg_02.jpg');" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="400">
                <h1 class="league-title text-white">WBS Coliseum</h1>
                <h2 class="seasson-title">Presenta</h2>
                <h2 class="event-title">Top 100 de Freestylers</h2>
                <h2 class="event-title">De <?= $freestylers_count ?> Freestylers en este año</h2>
            </div>
        </div>
    </div>
</div>
<!-- END HEADER -->
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?php if ($calculated) : ?>
        <?= $this->Form->create(null, ['url' => ['action' => 'save']]); ?>
        <input type="hidden" name="data" value="<?= base64_encode(serialize($freestylers)) ?>">
        <input type="hidden" name="count" value="<?= $freestylers_count ?>">
        <?= $this->Form->submit('Guardar', ['class' => 'btn btn-success']); ?>
        <?= $this->Form->end(); ?>
    <?php endif ?>
</nav>
<!-- END NAVBAR -->
<!-- Freestyler -->
<div class="col-sm-auto text-center">
    <table class="table leaderboard">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Posición</th>
                <th scope="col">Avatar</th>
                <th scope="col">Freestyler</th>
                <th scope="col">Puntos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($freestylers as $freestyler) : ?>
                <tr>
                    <td><?= $freestyler->position ?></td>
                    <td>
                        <?= $this->Html->image($freestyler->avatar ? $freestyler->avatar : $freestyler->user->avatar, ['alt' => "default-avatar",  'class' => 'img-fluid img-thumbnail img-max']); ?>
                    </td>
                    <td> <?= $freestyler->aka ? $freestyler->aka : $freestyler->user->aka ?> </td>
                    <td><?= $freestyler->points ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php if (!$calculated) : ?>
        <div class="container paginate-alex" style="padding: 50px 50px;">
            <div class="row">
                <div class="col-6 text-center py-6">
                    <?php if ($this->Paginator->hasPrev()) : ?>
                        <?= $this->Paginator->prev( __('Previous')) ?>
                    <?php endif ?>
                </div>
                <div class="col-6 text-center py-6">
                    <?php if ($this->Paginator->hasNext()) : ?>
                        <?= $this->Paginator->next(__('Next'), ['class'=>'list-group-item'], ['class'=>'list-group-item'], ['class'=>'list-group-item']); ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>
<!-- END Freestyler -->