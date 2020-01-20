<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompetitionsUser $competitionsUser
 */
?>
<div class="competitionsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($competitionsUser) ?>
    <fieldset>
        <legend><?= __('Add Competitions User') ?></legend>
        <?php
        echo $this->Form->control('competitions_id', ['options' => $competitions]);
        // echo $this->Form->control('users_id', ['options' => $users, 'multiple' => 'checkbox']);
        echo $this->Form->control('assistance', ['hidden' => true, 'label' => false]);
        ?>
        <div id="users-selects-form">
        </div>
        <?= $this->Form->button(__('Guardar'), array('class' => 'btn btn-outline-success')) ?>
        <?= $this->Form->end() ?>
    </fieldset>
    <input type="text" id="freestylers-search" onkeyup="loadUsers(value)">
    <ul style="list-style:none;margin:0 auto;max-width: 900px;width:100%;text-align:center;padding:0;display: block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;padding-inline-start: 40px;background-color:#bebebe;" id="freestylers-selects"></ul>
</div>
<fieldset>
    <ul style="list-style:none;margin:0 auto;max-width: 900px;width:100%;text-align:center;padding:0;display: block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;padding-inline-start: 40px;" id="results">Por favor escribe algun nombre para buscar</ul>
</fieldset>
</div>
<script type="text/javascript">
    function loadUsers(value) {
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "<?= $this->Url->build(['controller' => 'users', 'action' => 'getUsers']); ?>?name=" + value);
        console.log("<?= $this->Url->build(['controller' => 'users', 'action' => 'getUsers']); ?>?name=" + value);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = function(e) {
            if (xhttp.readyState == 4) {
                if (xhttp.status === 200) {
                    xhttp.addEventListener('load', function(e) {
                        users_div = document.getElementById('results');
                        users_div.innerHTML = "no hay resultados :c";
                        if (!xhttp.response == "") {
                            var freestylers = JSON.parse(xhttp.response);
                            document.getElementById("results").innerHTML = "";
                            writeFresstylers(freestylers);
                        }
                    });
                } else {
                    console.error(xhttp.status);
                }
            }
        }
        xhttp.send();
    }

    function writeFresstylers(freestylers) {
        select = document.getElementById('results');
        var limit = 52;
        if (freestylers.data.length != 0) {
            for (var i = 0; i < freestylers.data.length; i++) {
                if (!document.getElementById('users_id' + freestylers.data[i].id)) {
                    var new_div = "<li style='display: inline-block;box-sizing: border-box;text-align: left;font: bold 18px sans-serif;background-color: #ffffff;border: 1px solid #dbe3e7;border-radius: 3px;box-shadow: 1px 3px 1px rgba(0, 0, 0, 0.08);max-width: 250px;max-height:200px;height:200px;width: 250px;margin: 10px;padding: 25px;' id='users_list_" + freestylers.data[i].id + "'>";
                    new_div += "<a href='#'>";
                    new_div += "<img src='/img/" + freestylers.data[i].avatar + "' alt='Avatar' style='width:50px;height:50px''>";
                    new_div += "</a>";
                    new_div += "<p style='font-size:auto;'>" + freestylers.data[i].aka + "</p>";
                    new_div += "<p style='font-size:1vw;'>" + freestylers.data[i].email + "</p>";
                    new_div += "<button class='btn btn-outline-success'  onclick='addFreestyler(value)' value='" + freestylers.data[i].id + "'>Agregar</button>";
                    new_div += "</li>";
                    select.innerHTML += new_div;
                } else {
                    limit++;
                }
                if (i > limit) {
                    break;
                }
            }
        } else {
            select.innerHTML = "no hay resultados :c";
        }
    }

    function addFreestyler(value) {
        div_form = document.getElementById('users-selects-form');
        if (!document.getElementById('users_id' + value)) {
            div_form.innerHTML += "<input type='text' name='users_id[]''  id='users_id" + value + "' value='" + value + "' hidden='hidden' />";
            var div = document.getElementById('users_list_' + value),
                clone = div.cloneNode(true);
            clone.id = "users_select_" + value;
            clone.getElementsByTagName('button')[0].className = "btn btn-outline-danger";
            clone.getElementsByTagName('button')[0].innerHTML = "Quitar";
            clone.getElementsByTagName('button')[0].setAttribute("onClick", "removeFreestyler(value)");
            document.getElementById('freestylers-selects').appendChild(clone);
            document.getElementById('users_list_' + value).remove();
        }
    }

    function removeFreestyler(value) {
        document.getElementById('users_select_' + value).remove();
        document.getElementById('users_id' + value).remove();
    }
</script>