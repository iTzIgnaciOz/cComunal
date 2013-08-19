<?php
/* @var $this PersonasController */
/* @var $PersonasViviendasForm Personas */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'Personas y Viviendas'=>array('index'),
	'Registro Completo',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
);
?>
    

  
        <div class="row-fluid form-vertical well span8" >
            <h2 align="center">Registro Completo</h2>
          
      <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'enableAjaxValidation'=>false,
        )); ?>
	<?php echo $form->errorSummary($PersonasViviendasForm); ?>
            <div  > 
                <div class="span5">
                    <!--  Personas -->
                    <fieldset> 
                        <legend>Datos Personales</legend>
                        <div >
                <?php echo $form->labelEx($PersonasViviendasForm,'cedula'); ?>
		<?php $this->widget(
                    'yiiwheels.widgets.maskinput.WhMaskInput',
                    array(
                        'name'        => 'cedula',
                        'mask'        => '11111111',
                        'htmlOptions' => array('placeholder' => '20190472')
            )
        );?>
		<?php echo $form->error($PersonasViviendasForm,'cedula'); ?>
                        </div>
            
                        <div >
		<?php echo $form->textFieldControlGroup($PersonasViviendasForm,'nombres'); ?>
		<?php echo $form->error($PersonasViviendasForm,'nombres'); ?>
                        </div>
            
                        <div >
		<?php echo $form->textFieldControlGroup($PersonasViviendasForm,'apellidos'); ?>
		<?php echo $form->error($PersonasViviendasForm,'apellidos'); ?>
                        </div>
                        <div >
		<?php echo $form->inlineRadioButtonListControlGroup($PersonasViviendasForm, 'sexo', array(
                    'F',
                    'M',
                )); ?>
		<?php echo $form->error($PersonasViviendasForm,'sexo'); ?>
                        </div>
                        <div class="row-fluid">
                        <?php $form->labelEx($PersonasViviendasForm,'fecha_ingreso');?> 
                       <div class="input-append">
                           
                    <?php 
                   
                    $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
                        'name' => 'fecha_ingreso',
                        'pluginOptions' => array(
                        'format' => 'yyyy-mm-dd'
                                     )
                                 ));
                        ?>
                <span class="add-on"><icon class="icon-calendar"></icon></span>
                </div> 
                     <?php echo $form->error($PersonasViviendasForm,'email'); ?>
                        </div>
        
<div >
		<?php echo $form->emailFieldControlGroup($PersonasViviendasForm,'email'); ?>
                            <span class="add-on"><icon class="icon-email"></icon></span>
		<?php echo $form->error($PersonasViviendasForm,'email'); ?>
                            
                        </div>
                    </fieldset>
                </div>
                <div class="span1"> </div>
                <div class="form-vertical row-fluid span5" > 
                    <!--  Viviendas -->
                    <fieldset> 
                        <legend>Datos de la Vivienda</legend>
                            <div class="row-fluid">
              
		<?php echo $form->textFieldControlGroup($PersonasViviendasForm,'calle'); ?>
		<?php echo $form->error($PersonasViviendasForm,'calle'); ?>
                        </div>
            
                            <div class="row-fluid">
            
		<?php echo $form->textFieldControlGroup($PersonasViviendasForm,'nom_c'); ?>
		<?php echo $form->error($PersonasViviendasForm,'nom_c'); ?>
                        </div>
            
                            <div class="row-fluid">
            
		<?php echo $form->textFieldControlGroup($PersonasViviendasForm,'num_c'); ?>
		<?php echo $form->error($PersonasViviendasForm,'num_c'); ?>
                        </div>
            
                        <div class="row-fluid">
		<?php echo $form->labelEx($PersonasViviendasForm,'telf'); ?>
		<?php $this->widget(
                    'yiiwheels.widgets.maskinput.WhMaskInput',
                    array(
                        'name'          => 'telf',
                        'mask'          => '99999999999',
                'htmlOptions'   => array('placeholder' => '04143391525'),
            )
        );?>
		<?php echo $form->error($PersonasViviendasForm,'telf'); ?>
                        </div>
                    </fieldset>
                </div>
            
            
            </div>
            </div>
            <div class="row-fluid buttons" align="center">
		<?php  
                 echo CHtml::resetButton('Limpiar',array("class"=>"btn btn-primary pull-center"));
                 echo "   ";
                 echo CHtml::submitButton('Registrar',array("class"=>"btn btn-primary pull-center"));
                 ?>
           
      <?php $this->endWidget(); ?>
        </div>
   