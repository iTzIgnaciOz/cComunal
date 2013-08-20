<?php
/* @var $this ViviendasController */
/* @var $model Viviendas */

$this->breadcrumbs=array(
	'Viviendases'=>array('index'),
	$model->id_vivienda,
);

$this->menu=array(
	array('label'=>'List Viviendas', 'url'=>array('index')),
	array('label'=>'Create Viviendas', 'url'=>array('create')),
	array('label'=>'Update Viviendas', 'url'=>array('update', 'id'=>$model->id_vivienda)),
	array('label'=>'Delete Viviendas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vivienda),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Viviendas', 'url'=>array('admin')),
);
?>

<h1>View Viviendas #<?php echo $model->id_vivienda; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'calle',
		'num_c',
		'nom_c',
		'id_vivienda',
		'urbanizacion',
	),
)); ?>
