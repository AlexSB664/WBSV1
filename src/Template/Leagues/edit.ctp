<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\League $league
 */
?>
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $league->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $league->id)]
            )
            ?></li>
        <li><?= $this->Html->link(__('List Leagues'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schemes'), ['controller' => 'Schemes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scheme'), ['controller' => 'Schemes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Seasons'), ['controller' => 'Seasons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Season'), ['controller' => 'Seasons', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<script src="/tinymce/tinymce.min.js"></script>
<div class="leagues form large-9 medium-8 columns content">
    <?= $this->Form->create($league, ['type' => 'file']); ?>
    <fieldset>
        <legend><?= __('Edit League') ?></legend>
        <?= $this->Form->label('Logo: '); ?>
        <?= $this->Form->file('logo', array(
            'type' => 'file',
            'accept' => 'image/*',
            'onchange' => 'loadFile(event)',
            'class' => 'form-control',
        )); ?>
        <?= $this->Html->image($league->logo, ['id' => 'output', 'width' => '75', 'height' => '75']); ?>

        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        <?php
        echo $this->Form->control('name', array('class' => 'form-control'));
        echo $this->Form->control('description',array('id'=>'description','required'=>'false'));
        echo $this->Form->control('social_facebook',array('class' => 'form-control'));
        echo $this->Form->control('social_twitter',array('class' => 'form-control'));
        echo $this->Form->control('social_instagram',array('class' => 'form-control'));
        echo $this->Form->control('social_youtube',array('class' => 'form-control'));
        echo $this->Form->control('social_website',array('class' => 'form-control'));
        echo $this->Form->control('contact_phone',array('class' => 'form-control'));
        echo $this->Form->control('contact_email',array('class' => 'form-control'));
        echo $this->Form->control('slug',array('class' => 'form-control'));
        echo $this->Form->control('since',array('class' => 'form-control'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editar'), array('class' => 'btn btn-default btn-lg')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
    tinymce.init({
        selector: '#description',
        menubar:false,
        menu: {
            edit: { title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
            view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
            format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align | forecolor backcolor | removeformat' }
        },
        resize: false
    });
</script>