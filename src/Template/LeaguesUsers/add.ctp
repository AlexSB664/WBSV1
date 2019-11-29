<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LeaguesUser $leaguesUser
 */
?>
<div class="leaguesUsers form large-9 medium-8 columns content">
    <!-- <legend>Asignar un Organizador a Una Liga</legend>
    <p>
        <h3>Ligas y Usuarios</h3>
    </p>
    <div style="background-color: #F0F0F0;">
        <div class="row" id="leagues">
        </div>
        <div class="row" id="users">
        </div>
    </div>
    <p>
        <h3>Ligas</h3>
    </p>
    <div style="background-color: #F0F0F0;">
        <div class="row">
            <label for="league-id">Buscar Liga</label>
            <input type="text" id="league_name" />
            <input type="hidden" id="league_id" />
        </div>
        <div name="league_content" id="league_content">
            <div class="row">
                <?php foreach ($leagues as $league) : ?>
                    <div class="col">
                    <div class="row"><?= $this->Html->image($league->logo, ['plugin' => false,'width'=>'50','height'=>'50']); ?></div>
                    <div class="row"><?= $league->name ?></div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <p>
        <h3>Usuarios</h3>
    </p>
    <div style="background-color: #F3F3F3;">
        <div class="row">
            <label for="league-id">Buscar Usuarios</label>
            <input type="text" id="users_name" />
            <input type="hidden" id="user_id" />
        </div>
        <div name="league_content" id="league_content">
            <div class="row">
                <?php foreach ($users as $user) : ?>
                    <div class="col">
                    <div class="row"><?= $this->Html->image($user->avatar, ['plugin' => false,'width'=>'50','height'=>'50']); ?></div>
                    <div class="row"><?= $user->aka ?></div>
                    <div class="row"><?= $user->email ?></div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div> -->
    <?= $this->Form->create($leaguesUser) ?>
    <fieldset>
        <?php
        echo $this->Form->control('league_id', ['options' => $leagues2]);
        echo $this->Form->control('user_id', ['options' => $users2]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar'),array('class' => 'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>