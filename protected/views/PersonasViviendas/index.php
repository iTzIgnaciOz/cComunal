<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$this->breadcrumbs=array(
	'Personas y Viviendas',
);

$this->menu=array(
	array('label'=>'Registro Completo', 'url'=>array('crear')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>
<div class="span9">
<?PHP
$this->widget('yiiwheels.widgets.grid.WhGridView', array(
	
	'fixedHeader' => true,
	'headerOffset' => 70, // 40px is the height of the main navigation at bootstrap
	'type'=>'striped',
	'dataProvider' => $dataProvider,
	'template' => "{items}",
	'columns' => array(

        array(

            'name' => 'Cedula',
            'value' => 'CHtml::encode($data["cedula"])'
        ),
         array(
            'name' => 'Nombres',
            'value' => 'CHtml::encode($data["nombres"])'

        ),
        array(
            'name' => 'Apellidos',
            'value' => 'CHtml::encode($data["apellidos"])'
        ),
        array(
            'name' => 'Sexo',
            'value' => 'CHtml::encode($data["sexo"])'
        ),
        array(
            'name' => 'Fecha de Ingreso',
            'value' => 'CHtml::encode($data["fecha_ingreso"])'
        ),
        array(
            'name' => 'Fecha de Nacimiento',
            'value' => 'CHtml::encode($data["fecha_nacimiento"])'
        ),
        array(
            'name' => 'Calle',
            'value' => 'CHtml::encode($data["calle"])'
        ),
        array(
            'name' => 'N° de la Casa',
            'value' => 'CHtml::encode($data["num_c"])'
        ),
        array(
            'name' => 'Nombre de la Casa',
            'value' => 'CHtml::encode($data["nom_c"])'
        ),
        array(
            'name' => 'ID Vivienda',
            'value' => 'CHtml::encode($data["id_vivienda"])'
        ),
            
)));


?>
</div>