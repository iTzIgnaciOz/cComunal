<?php
/* @var $this ViviendasController */
/* @var $model Viviendas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'viviendas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'calle'); ?>
		<?php echo $form->textField($model,'calle',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'calle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_c'); ?>
		<?php echo $form->textField($model,'num_c',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'num_c'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nom_c'); ?>
		<?php echo $form->textField($model,'nom_c',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nom_c'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'urbanizacion'); ?>
		<?php echo $form->textField($model,'urbanizacion'); ?>
		<?php echo $form->error($model,'urbanizacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->