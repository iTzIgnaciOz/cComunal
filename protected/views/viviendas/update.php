<?php
/* @var $this ViviendasController */
/* @var $model Viviendas */

$this->breadcrumbs=array(
	'Viviendases'=>array('index'),
	$model->id_vivienda=>array('view','id'=>$model->id_vivienda),
	'Update',
);

$this->menu=array(
	array('label'=>'List Viviendas', 'url'=>array('index')),
	array('label'=>'Create Viviendas', 'url'=>array('create')),
	array('label'=>'View Viviendas', 'url'=>array('view', 'id'=>$model->id_vivienda)),
	array('label'=>'Manage Viviendas', 'url'=>array('admin')),
);
?>

<h1>Update Viviendas <?php echo $model->id_vivienda; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>