<div class="matches form large-9 medium-8 columns content">
    <?= $this->Form->create($match) ?>
    <fieldset>
        <legend><?= __('Editar Pelea') ?></legend>
        <?php
                echo $this->Form->control('competition_id', ['options' => $competitions, 'class'=> 'form-control']);
                echo $this->Form->control('stage',array('class'=> 'form-control'));
                echo $this->Form->control('points',array('class'=> 'form-control'));
                echo $this->Form->control('score',array('class'=> 'form-control'));
                echo $this->Form->label('winner',array('class'=> 'form-control'));
                echo $this->Form->control('user_id', ['label' => false, 'class'=> 'form-control']);
                echo $this->Form->control('users._ids', ['options' => $users,'multiple'=>'checkbox', 'class'=> 'form-control']);
                ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar'), array('class' => 'btn btn-outline-success')) ?>
        <?= $this->Form->end() ?>
</div>
