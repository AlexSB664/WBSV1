<style>
    img.flyer-square {
        max-height: 90px;
        max-width: 110px;
        min-height: 90px;
        min-width: 110px;
        height: auto;
        width: auto;
    }

    p.flyer-square {
        max-width: 100px;
        min-width: 100px;
        max-height: 42px;
        min-height: 42px;
    }
</style>
<div>
    <?php if (isset($league_id)) : ?>
        <div class="row">
            <div class="col-6">
                <h1>Escoje una competencia</h1>
            </div>
            <div class="col-6">
                <?= $this->Form->control(
                    'season_id',
                    [
                        'options' => $seasons,
                        'default' => $season_id ?: '',
                        'class' => 'form-control', 'label' => 'Escoje una Temporada',
                        'id' => 'seasons'
                    ]
                ); ?>
                <script>
                    const selectElement = document.getElementById('seasons');
                    selectElement.addEventListener('change', (event) => {
                        window.location.replace("<?= $this->Url->build(['controller' => 'Competitions', 'action' => 'myCompetitions', $league_id]) ?>/" + event.target.value);
                        console.log('You like ' + event.target.value);
                    });
                </script>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button class='btn btn-outline-success' onclick="window.location='<?= $this->Url->build(['controller' => 'Competitions', 'action' => 'add', $season_id]) ?>'"><?= __('Add Competition') ?></button>
            </div>
        </div>
    <?php else : ?>
        <h1>Escoje una de tus ligas</h1>
    <?php endif ?>
    <ul style="list-style:none;margin:0 auto;max-width: 900px;width:100%;text-align:center;padding:0;display: block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;padding-inline-start: 40px;background-color:#bebebe;" id="actions">
        <?php foreach ($info as  $data) : ?>
            <li style="display: inline-block;box-sizing: border-box;text-align: left;font: bold 18px sans-serif;background-color: #ffffff;border: 1px solid #dbe3e7;border-radius: 3px;box-shadow: 1px 3px 1px rgba(0, 0, 0, 0.08);max-width:162px;max-height:199px;min-width:162px;min-height:199px;height:auto;width: auto;margin: 10px;padding: 25px;" onclick="window.location='<?= isset($league_id) ? $this->Url->build(['controller' => 'Competitions', 'action' => 'edit', $data->id]) : $this->Url->build(['controller' => 'Competitions', 'action' => 'myCompetitions', $data->id]); ?>'">

                <?= $this->Html->image($data->logo ? $data->logo : $data->flyer, ['id' => 'output', 'class' => 'flyer-square']) ?>
                <h6><?= $data->name ?></h6>
                <?php if (isset($league_id)) : ?>
                    <p class="flyer-square"><?= $data->season->name ?></p>
                <?php endif ?>
            </li>
        <?php endforeach ?>
    </ul>
</div>