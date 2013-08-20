<?php
/* @var $this PersonasController */
/* @var $model Personas */

$this->breadcrumbs=array(
	'Personases'=>array('index'),
	$model->cedula=>array('view','id'=>$model->cedula),
	'Update',
);

$this->menu=array(
	array('label'=>'List Personas', 'url'=>array('index')),
	array('label'=>'Create Personas', 'url'=>array('create')),
	array('label'=>'View Personas', 'url'=>array('view', 'id'=>$model->cedula)),
	array('label'=>'Manage Personas', 'url'=>array('admin')),
);
?>

<h1>Update Personas <?php echo $model->cedula; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>