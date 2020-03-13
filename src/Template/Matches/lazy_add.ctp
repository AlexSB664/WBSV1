<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match $match
 */
?>
<div class="matches form large-9 medium-8 columns content">
    <?= $this->Form->create($match) ?>
    <fieldset>
        <h3>Agregando combate para la temporada <?= $competition->season->name ?> de la liga <?= $competition->season->league->name ?></h3>
        <h2>Id de la temporada <?= $competition->season->name ?> es <?= $competition->season->id ?> </h2>
        <legend><?= __('Add Match') ?></legend>
        <?php
        echo $this->Form->control('competition_id', ['options' => [$competition->id => $competition->name]]);
        echo $this->Form->control('stage', [
            'options' => $stages,
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
                    ?>?stage=" + value + "&scheme_id=<?= $competition->scheme_id ?> ");
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
        loadPoints(document.getElementById("stage").value);
    </script>
    <?= $this->Form->button(__('Agregar'), array('class' => 'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>