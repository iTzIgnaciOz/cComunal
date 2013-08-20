<?php
/* @var $this ViviendasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Viviendases',
);

$this->menu=array(
	array('label'=>'Create Viviendas', 'url'=>array('create')),
	array('label'=>'Manage Viviendas', 'url'=>array('admin')),
);
?>

<h1>Viviendases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
