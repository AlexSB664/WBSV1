<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\League $league
 */
?>
<script src="/tinymce/tinymce.min.js"></script>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Leagues'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schemes'), ['controller' => 'Schemes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheme'), ['controller' => 'Schemes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Seasons'), ['controller' => 'Seasons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Season'), ['controller' => 'Seasons', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="leagues form large-9 medium-8 columns content">
    <?= $this->Form->create($league, ['type' => 'file'], 'novalidate'); ?>
    <fieldset>
        <legend><?= __('Add League') ?></legend>
        <?= $this->Form->file('logo', array(
            'type' => 'file',
            'accept' => 'image/*',
            'onchange' => 'loadFile(event)'
        )); ?>
        <img id="output" width="75" height="75" />
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
        <?php
        echo $this->Form->control('name', array('class' => 'form-control'));
        echo $this->Form->control('description', array('id' => 'description', 'required' => 'false'));
        echo $this->Form->control('social_facebook', array('class' => 'form-control'));
        echo $this->Form->control('social_twitter', array('class' => 'form-control'));
        echo $this->Form->control('social_instagram', array('class' => 'form-control'));
        echo $this->Form->control('social_youtube', array('class' => 'form-control'));
        echo $this->Form->control('social_website', array('class' => 'form-control'));
        echo $this->Form->control('contact_phone', array('class' => 'form-control'));
        echo $this->Form->control('contact_email', array('class' => 'form-control'));
        echo $this->Form->control('slug', array('class' => 'form-control'));
        // echo $this->Form->control('since',array('type'=>'date','class' => 'form-control')); 
        ?>
        <label>Since</label>
        <br>
        <input type="date" name="since" id="since">
        <?php
        echo $this->Form->control('score', array('class' => 'form-control'));
        echo $this->Form->control('bonus', array('class' => 'form-control'));
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Agregar'), array('class' => 'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
    tinymce.init({
        selector: '#description',
        menubar: false,
        menu: {
            edit: {
                title: 'Edit',
                items: 'undo redo | cut copy paste | selectall | searchreplace'
            },
            view: {
                title: 'View',
                items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen'
            },
            format: {
                title: 'Format',
                items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align | forecolor backcolor | removeformat'
            }
        },
        resize: false
    });
</script>