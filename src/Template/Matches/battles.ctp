<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match $match
 */
?>
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
        var classArray = ev.target.className.split(" ");
        if (classArray.includes("battle-container")) {
            if (classArray.includes("winner")) {
                if (ev.target.childElementCount != 0) {
                    ev.target.removeChild(ev.target.lastChild);
                }
                newElement = document.getElementById(data).cloneNode(true);
                ev.target.appendChild(newElement);
            } else {
                ev.target.appendChild(document.getElementById(data));
            }
            getData();
        }
    }

    function addBattleZone() {
        var newDiv = '<div class="battle"><div class="row"><div class="col-2"><h1><?= __('Winner') ?></h1><div class="row winner battle-container" style="background-color:#D4AF37;" ondrop="drop(event)" ondragover="allowDrop(event)"></div></div><div class="col-10"><h1><?= __('VS') ?></h1><div class="row vs battle-container" ondrop="drop(event)" ondragover="allowDrop(event)"></div></div></div></div>';
        document.getElementById('battle-zone').insertAdjacentHTML('beforeend', newDiv);
    }

    function removeBattleZone() {
        document.getElementById('battle-zone').removeChild(document.getElementById('battle-zone').lastChild);
    }

    function getData() {
        var data = {};
        var zone = document.getElementById('battle-zone');
        zone = zone.getElementsByClassName("battle");
        for (x = 0; x < zone.length; x++) {
            data[x] = {};
            var winner = zone[x].getElementsByClassName("winner")[0].getElementsByClassName("users-card");
            if (winner.length == 1) {
                data[x]['winner'] = winner[0].id;
            } else {
                winner = null;
            }
            var users = zone[x].getElementsByClassName("vs")[0].getElementsByClassName("users-card");
            data[x]['users'] = {};
            for (y = 0; y < users.length; y++) {
                data[x]['users'][y] = users[y].id;
            }
        }

        let JsonData = JSON.stringify(data);
        let Json64 = btoa(JsonData);
        document.getElementById("data").value=Json64;
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
        // echo $this->Form->label('winner');
        // echo $this->Form->control('user_id', ['label' => false]);
        // echo $this->Form->control('users._ids', ['options' => $users, 'multiple' => 'checkbox']);
        ?>
        <input type="hidden" id="data" name="data">
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
    <div class="row">
        <div class="col-12">
            <h1><?= __('Participants') ?></h1>
        </div>
    </div>
    <div class="row battle">
        <?php foreach ($users_cards as $user) : ?>
            <div id="<?= $user->id ?>" class="users-card" draggable="true" ondragstart="drag(event)">
                <?= $this->Html->image($user->avatar, ['id' => 'output', 'width' => '75', 'height' => '75', 'draggable' => 'false', 'id' => $user->id]); ?>
            </div>
        <?php endforeach ?>
    </div>
    <div id="battle-zone">
        <div class="battle">
            <div class="row">
                <div class="col-2">
                    <h1><?= __('Winner') ?></h1>
                    <div class="row winner battle-container" style="background-color:#D4AF37;" ondrop="drop(event)" ondragover="allowDrop(event)">
                    </div>
                </div>
                <div class="col-10">
                    <h1><?= __('VS') ?></h1>
                    <div class="row vs battle-container" ondrop="drop(event)" ondragover="allowDrop(event)">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <button type="button" class="btn btn-success btn-lg btn-block" onclick="addBattleZone()">+</button>
        <button type="button" class="btn btn-danger btn-lg btn-block" onclick="removeBattleZone()">-</button>
    </div>
    <br>
    <br>
    <?= $this->Form->button(__('Agregar'), array('class' => 'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>