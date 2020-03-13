<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match $match
 */
?>
<style>
    div.battle-container {
        width: auto;
        height: auto;
        padding: 10px;
        border: 1px solid #aaaaaa;
    }
</style>
<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        var str = ev.target.className;
        var classArray = ev.target.className.split(" ");
        console.log(classArray);
        if (classArray.includes("battle-container")) {
            ev.target.appendChild(document.getElementById(data));
        }
    }
</script>
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
    <div class="row battle">
        <?php foreach ($users_cards as $user) : ?>
            <div id="<?= $user->id ?>" draggable="true" ondragstart="drag(event)">
            <?= $this->Html->image($user->avatar, ['id' => 'output', 'width' => '75', 'height' => '75', 'draggable' => 'false', 'id' => $user->id]); ?>
            </div>
        <?php endforeach ?>
    </div>
    <div class="row">
        <div class="col-2">
            Ganador
            <div class="battle-container" style="background-color:#D4AF37;" ondrop="drop(event)" ondragover="allowDrop(event)">
            </div>
        </div>
        <div class="col-10">
            Tiro
            <div class="row battle-container" ondrop="drop(event)" ondragover="allowDrop(event)">
            </div>
        </div>
    </div>
    <br>
    <br>
    <?= $this->Form->button(__('Agregar'), array('class' => 'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>