<div>
    <?php if (isset($league_id)) : ?>
        <h1>Escoje una Temporada</h1>
    <?php else : ?>
        <h1>Escoje una de tus ligas</h1>
    <?php endif ?>
    <ul style="list-style:none;margin:0 auto;max-width: 900px;width:100%;text-align:center;padding:0;display: block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;padding-inline-start: 40px;background-color:#bebebe;" id="actions">
        <?php foreach ($info as  $data) : ?>
            <li style="display: inline-block;box-sizing: border-box;text-align: left;font: bold 18px sans-serif;background-color: #ffffff;border: 1px solid #dbe3e7;border-radius: 3px;box-shadow: 1px 3px 1px rgba(0, 0, 0, 0.08);max-width:162px;max-height:199px;min-width:162px;min-height:199px;height:auto;width: auto;margin: 10px;padding: 25px;" onclick="window.location='<?= isset($league_id) ? $this->Url->build(['controller' => 'Seasons', 'action' => 'edit', $data->id]) : $this->Url->build(['controller' => 'Seasons', 'action' => 'mySeasons', $data->id]); ?>'">

                <?= $this->Html->image($data->logo ? $data->logo : $data->flyer, ['id' => 'output', 'class' => 'flyer-square']) ?>
                <h6><?= $data->name ?></h6>
            </li>
        <?php endforeach ?>
    </ul>

    <div class="row">
        <div class="col-md-1">
            <?php if ($this->Paginator->hasPrev()) : ?>
                <ul class="pagination">
                    <?= $this->Paginator->first('<<' . __('first')) ?>
                </ul>
            <?php endif ?>
        </div>
        <div class="col-md-1">
            <?php if ($this->Paginator->hasPrev()) : ?>
                <ul class="pagination">
                    <?= $this->Paginator->prev('<' . __('prev.')) ?>
                </ul>
            <?php endif ?>
        </div>
        <div class="col-md-8">
            <ul class="pagination">
                <?= $this->Paginator->numbers() ?>
            </ul>
        </div>
        <div class="col-md-1">
            <?php if ($this->Paginator->hasNext()) : ?>
                <ul class="pagination">
                    <?= $this->Paginator->next(__('next') . '>') ?>
                </ul>
            <?php endif ?>
        </div>
        <div class="col-md-1">
            <?php if ($this->Paginator->hasNext()) : ?>
                <ul class="pagination">
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
            <?php endif ?>
        </div>
    </div>
</div>