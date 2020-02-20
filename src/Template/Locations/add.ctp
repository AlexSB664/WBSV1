<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?></li>
    </ul>
</nav> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDURexdbTR3rNlQ3HJ_wH_4Ag--juvs-wM"></script>
<script src="/js/location-picker/location-picker.min.js"></script>
<div class="locations form large-9 medium-8 columns content">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Agregar Dirección') ?></legend>
        <div class="form-row">
            <div class="col">
                <?= $this->Form->label('Nombre: '); ?>
                <?= $this->Form->input('name', array('label'=>false, 'class'=> 'form-control')); ?>
                <?= $this->Form->label('Ciudad:'); ?>
                <?= $this->Form->input('city', array('label'=>false, 'class'=> 'form-control')); ?>
                <?= $this->Form->label('Dirección:'); ?>
                <?= $this->Form->input('address', array('label'=>false, 'class'=> 'form-control')); ?>
                <?= $this->Form->label('Latitud: '); ?>
                <?= $this->Form->input('lat', array('label'=>false, 'class'=> 'form-control','id'=>'map-lat','readonly'=>'readonly')); ?>
                <?= $this->Form->label('Longitud: '); ?>
                <?= $this->Form->input('lng', array('label'=>false, 'class'=> 'form-control','id'=>'map-lng','readonly'=>'readonly')); ?>
		<input type="button"  id="confirmPosition" class="btn btn-success" value="Fijar"></input>
		
		<div id="map" style="width:100%;height:480px;"></div>
		<script>
		var map = document.getElementById('map');
		var instance = new locationPicker(map, {
			    // picker options
  			}, {
			    // Google Maps Options
			});

		//button action to get lat and log
		var confirmBtn = document.getElementById('confirmPosition');
		var onClickPositionView = document.getElementById('onClickPositionView');

		confirmBtn.onclick = function () {
  			var location = instance.getMarkerPosition();
			document.getElementById("map-lat").value = location.lat;
			document.getElementById("map-lng").value = location.lng;
		};
		</script>
                <?= $this->Form->label('Tipo: '); ?>
                <?= $this->Form->input('type', array('label'=>false, 'class'=> 'form-control')); ?>
            </div>
        </div>
    </fieldset>
    <br>
	

    <?= $this->Form->button(__('Agregar'), array('class'=>'btn btn-outline-success')) ?>
    <?= $this->Form->end() ?>
</div>
