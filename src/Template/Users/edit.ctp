<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
            ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Crews'), ['controller' => 'Crews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crew'), ['controller' => 'Crews', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['type' => 'file']); ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
        echo $this->Form->control('username', array('class' => 'form-control'));
        echo $this->Form->control('fullname', array('class' => 'form-control'));
        echo $this->Form->control('aka', array('class' => 'form-control'));
        echo $this->Form->control('crew_id', ['options' => $crews, 'empty' => true, 'class' => 'form-control']);
        echo $this->Form->control('email', array('class' => 'form-control'));
        echo $this->Form->control('password', array('class' => 'form-control'));
        echo $this->Form->control('role', array('class' => 'form-control'));
        echo $this->Form->label('Activo: ');
        echo $this->Form->control('status', ['class' => 'form-control', 'label' => false]);
        echo $this->Form->control('telephone', array('class' => 'form-control'));
        ?>
        <?= $this->Form->label('Avatar: '); ?>
        <?= $this->Form->file('avatar', array(
            'type' => 'file',
            'accept' => 'image/*',
            'onchange' => 'loadFile(event)',
            'class' => 'form-control',
        )); ?>
        <?= $this->Html->image($user->avatar, ['id' => 'outputAvatar', 'width' => '75', 'height' => '75']); ?>
        <div class="row" style="padding-left: 20px; padding-right: 20px;">
            <div class="col-md-6 col-md-offset-3" style="clear:both;" id="img-alert">
            </div>
        </div>
        <script>
            var loadFile = function(event) {
                document.getElementById("img-alert").innerHTML = "";
                var output = document.getElementById('output');
                if (ValidateSize(event, output)) {
                    output.src = URL.createObjectURL(event.target.files[0]);
                }
            };

            function ValidateSize(event, output) {
                var accept = true;
                fileSize = event.target.files[0].size / 1024 / 1024;
                if (fileSize > 2) {
                    accept = false;
                    event.target.value = null;
                    showAlert();
                }
                return accept;
            }

            function showAlert() {
                document.getElementById("img-alert").innerHTML = '<div class="alert alert-dismissible alert-danger text-center" id="img-alert-div"></div>';
                document.getElementById("img-alert-div").innerHTML = '<button type="button" class="close" data-dismiss="alert">×</button>';
                document.getElementById("img-alert-div").innerHTML += 'La foto sobrepasa los 2 MB por favor intenta con otra  :(';

            }
        </script>
        <br>
        <?= $this->Form->label('Hero BG: '); ?>
        <?= $this->Form->file('head_bg', array(
            'type' => 'file',
            'accept' => 'image/*',
            'onchange' => 'loadFileHero(event)',
            'class' => 'form-control',
        )); ?>
        <?= $this->Html->image($user->head_bg, ['id' => 'outputHero', 'width' => '75', 'height' => '75']); ?>
        <script>
            var loadFileHero = function(event) {
                var output = document.getElementById('outputHero');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
    </fieldset>
    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>