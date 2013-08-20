<?php
/* @var $this PersonasController */
/* @var $model Personas */

$this->breadcrumbs=array(
	'Personases'=>array('index'),
	$model->cedula,
);

$this->menu=array(
	array('label'=>'List Personas', 'url'=>array('index')),
	array('label'=>'Create Personas', 'url'=>array('create')),
	array('label'=>'Update Personas', 'url'=>array('update', 'id'=>$model->cedula)),
	array('label'=>'Delete Personas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cedula),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Personas', 'url'=>array('admin')),
);
?>

<h1>View Personas #<?php echo $model->cedula; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cedula',
		'nombres',
		'apellidos',
		'sexo',
		'fecha_ingreso',
		'fecha_nacimiento',
		'id_vivienda',
		'id_cargo',
		'telf',
		'email',
	),
)); ?>
