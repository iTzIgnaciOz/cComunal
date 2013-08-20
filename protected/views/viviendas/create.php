<?php
/* @var $this ViviendasController */
/* @var $model Viviendas */

$this->breadcrumbs=array(
	'Viviendases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Viviendas', 'url'=>array('index')),
	array('label'=>'Manage Viviendas', 'url'=>array('admin')),
);
?>

<h1>Create Viviendas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>