<?php
/* @var $this ViviendasController */
/* @var $data Viviendas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vivienda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_vivienda), array('view', 'id'=>$data->id_vivienda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calle')); ?>:</b>
	<?php echo CHtml::encode($data->calle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_c')); ?>:</b>
	<?php echo CHtml::encode($data->num_c); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom_c')); ?>:</b>
	<?php echo CHtml::encode($data->nom_c); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('urbanizacion')); ?>:</b>
	<?php echo CHtml::encode($data->urbanizacion); ?>
	<br />


</div>