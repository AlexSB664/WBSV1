<div>
    <?php if (isset($league_id)) : ?>
        <h1>Escoje una competencia</h1>
    <?php else : ?>
        <h1>Escoje una de tus ligas</h1>
    <?php endif ?>
    <ul style="list-style:none;margin:0 auto;max-width: 900px;width:100%;text-align:center;padding:0;display: block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;padding-inline-start: 40px;background-color:#bebebe;" id="actions">
        <?php foreach ($info as  $data) : ?>
            <?php if (isset($league_id)) : ?>
                <li style="display: inline-block;box-sizing: border-box;text-align: left;font: bold 18px sans-serif;background-color: #ffffff;border: 1px solid #dbe3e7;border-radius: 3px;box-shadow: 1px 3px 1px rgba(0, 0, 0, 0.08);max-width: 225;max-height:200px;height:200;width: 225;margin: 10px;padding: 25px;">
                <?php else : ?>
                <li style="display: inline-block;box-sizing: border-box;text-align: left;font: bold 18px sans-serif;background-color: #ffffff;border: 1px solid #dbe3e7;border-radius: 3px;box-shadow: 1px 3px 1px rgba(0, 0, 0, 0.08);max-width: 225;max-height:200px;height:200;width: 225;margin: 10px;padding: 25px;" onclick="window.location='<?= isset($league_id) ? '' : $this->Url->build(['controller' => 'Competitions', 'action' => 'myCompetitions', $data->id]); ?>'">
                <?php endif ?>

                <?= $this->Html->image($data->logo ? $data->logo : $data->flyer, ['id' => 'output', 'width' => '110px', 'height' => '90px']) ?>
                <h6><?= $data->name ?></h6>
                <?php if (isset($league_id)) : ?>
                    <?= $this->Html->link(__('editar'), ['action' => 'edit', $data->id]) ?>
                <?php endif ?>
                </li>
            <?php endforeach ?>
    </ul>
</div>