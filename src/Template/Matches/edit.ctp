<div class="matches form large-9 medium-8 columns content">
    <?= $this->Form->create($match) ?>
    <fieldset>
        <legend><?= __('Editar Pelea') ?></legend>
        <?php
                echo $this->Form->control('competition_id', ['options' => $competitions]);
                echo $this->Form->control('stage');
                echo $this->Form->control('points');
                echo $this->Form->label('winner');
                echo $this->Form->control('user_id', ['label' => false]);
                echo $this->Form->control('users._ids', ['options' => $users,'multiple'=>'checkbox']);
                ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
</div>
