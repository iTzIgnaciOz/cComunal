<?php
/* @var $this ViviendasController */
/* @var $model Viviendas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'calle'); ?>
		<?php echo $form->textField($model,'calle',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_c'); ?>
		<?php echo $form->textField($model,'num_c',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nom_c'); ?>
		<?php echo $form->textField($model,'nom_c',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_vivienda'); ?>
		<?php echo $form->textField($model,'id_vivienda'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'urbanizacion'); ?>
		<?php echo $form->textField($model,'urbanizacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->