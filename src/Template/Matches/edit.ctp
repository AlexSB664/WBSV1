<div class="matches form large-9 medium-8 columns content">
    <?= $this->Form->create($match) ?>
    <fieldset>
        <legend><?= __('Editar Pelea') ?></legend>
        <?php
                echo $this->Form->control('competition_id', ['options' => $competitions, 'class'=> 'form-control']);
                echo $this->Form->control('stage', [
                    'options' => $stages,
                    'onchange' => 'loadPoints(value)'
                ]);
                echo $this->Form->control('points', ['readonly' => 'readonly']);
                echo $this->Form->control('score',array('class'=> 'form-control'));
                echo $this->Form->label('winner',array('class'=> 'form-control'));
                echo $this->Form->control('user_id', ['label' => false, 'class'=> 'form-control']);
                echo $this->Form->control('users._ids', ['options' => $users,'multiple'=>'checkbox', 'class'=> 'form-control']);
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
        </script>
    <?= $this->Form->button(__('Guardar'), array('class' => 'btn btn-outline-success')) ?>
        <?= $this->Form->end() ?>
</div>
