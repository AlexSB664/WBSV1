<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match $match
 */
?>
<?php if (isset($competition)) : ?>
    <div class="matches form large-9 medium-8 columns content">
        <?= $this->Form->create($match) ?>
        <fieldset>
            <h3>Agregando combate para la temporada <?= $competition2->season->name ?> de la liga <?= $competition2->season->league->name ?></h3>
            <h2>Id de la temporada <?= $competition2->season->name ?> es <?= $competition2->season->id ?> </h2>
            <legend><?= __('Add Match') ?></legend>
            <?php
                echo $this->Form->control('competition_id', ['options' => $competition]);
                echo $this->Form->control('stage', [
                    'options' => $stages,
                    //'values'=>array_column($stages, 'name'),
                    'onchange' => 'loadPoints(value)'
                ]);
                echo $this->Form->control('points', ['readonly' => 'readonly']);
                echo $this->Form->control('score');
                echo $this->Form->label('winner');
                echo $this->Form->control('user_id', ['label' => false]);
                echo $this->Form->control('users._ids', ['options' => $users, 'multiple' => 'checkbox']);
                ?>
        </fieldset>
        <script type="text/javascript">
            function loadPoints(value) {

                var xhttp = new XMLHttpRequest();
                xhttp.open("GET",
                    "<?= $this->Url->build([
                                'controller' => 'schemesDetails',
                                'action' => 'getPoints'
                            ]);
                            ?>?stage=" + value + "&scheme_id=<?= $competition2->scheme_id ?> ");
                xhttp.onreadystatechange = function(e) {
                    if (xhttp.readyState == 4) {
                        if (xhttp.status === 200) {
                            xhttp.addEventListener('load', function(e) {
                                document.getElementById("points").value = xhttp.responseText;
                            });
                        } else {
                            console.error(xhttp.status);
                        }
                    }
                }
                xhttp.send();
            }
        </script>
        <?= $this->Form->button(__('Agregar'), array('class' => 'btn btn-outline-success')) ?>
        <?= $this->Form->end() ?>
    </div>
<?php else : ?>
    <table class="table">
        <thead>
            <tr>
                <th>Liga</th>
                <th>Temporada</th>
                <th>para crear combate</th>
                <th>suscribir a patin</th>
                <th>tomar asistencia</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($competitions as $competition) : ?>
                <tr>
                    <td><?= $competition->season->league->name ?></td>
                    <td><?= $competition->season->name ?></td>
                    <td> + <?= $this->Html->link('agrega un combate para ' . $competition->name, ['controller' => 'Matches', 'action' => 'lazyAdd', $competition->id]) ?></td>
                    <td> + <?= $this->Html->link('susbribir en ' . $competition->name, ['controller' => 'CompetitionsUsers', 'action' => 'lazyAdd', $competition->id]) ?></td>
                    <td>+ <?= $this->Html->link('Asistencia de ' . $competition->name, ['controller' => 'CompetitionsUsers', 'action' => 'index', $competition->id]) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>