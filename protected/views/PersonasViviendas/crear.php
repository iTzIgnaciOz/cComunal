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
          'id'=>'verticalForm',
          
	'enableAjaxValidation'=>false,
        'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        )); ?>
	<?php echo $form->errorSummary(array($persona,$vivienda)); ?>
            <div  > 
                <div class="span5">
                    <!--  Personas -->
                    <fieldset> 
                        <legend>Datos Personales</legend>
                        <div class="row-fluid" >
                <?php echo $form->labelEx($persona,'cedula'); ?>
		<?php $this->widget(
                    'yiiwheels.widgets.maskinput.WhMaskInput',
                    array(
                        'model'=>$persona,
                        'attribute'        => 'cedula',
                        'mask'        => '11111111',
                        'htmlOptions' => array('placeholder' => '20190472')
            )
        );?>
		<?php echo $form->error($persona,'cedula'); ?>
                        </div>
            
                        <div class="row-fluid" >
		<?php echo $form->textFieldControlGroup($persona,'nombres'); ?>
		
                        </div>
            
                        <div class="row-fluid" >
		<?php echo $form->textFieldControlGroup($persona,'apellidos'); ?>
		<?php echo $form->error($persona,'apellidos'); ?>
                        </div>
                        <div >
		<?php echo $form->inlineRadioButtonListControlGroup($persona, 'sexo', array(
                    'F'=>'F',
                    'M'=>'M',
                )); ?>
		<?php echo $form->error($persona,'sexo'); ?>
                        </div>
                        <div class="row-fluid">
                        <?php echo $form->labelEx($persona,'fecha_ingreso');?> 
                       <div class="input-append">
                           
                    <?php 
                   
                    $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
                        'model'=>$persona,
                        'attribute'        => 'fecha_ingreso',
                        'pluginOptions' => array(
                        'format' => 'yyyy-mm-dd'
                                     )
                                 ));
                        ?>
                <span class="add-on"><icon class="icon-calendar"></icon></span>
                </div> 
                     <?php echo $form->error($persona,'fecha_ingreso'); ?>
                        </div>
                        <div class="row-fluid">
                        <?php echo $form->labelEx($persona,'fecha_nacimiento');?> 
                       <div class="input-append">
                           
                    <?php 
                   
                    $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
                        'model'=>$persona,
                        'attribute'        => 'fecha_nacimiento',
                        'pluginOptions' => array(
                        'format' => 'yyyy-mm-dd'
                                     )
                                 ));
                        ?>
                <span class="add-on"><icon class="icon-calendar"></icon></span>
                </div> 
                     <?php echo $form->error($persona,'fecha_nacimiento'); ?>
                        </div>
                        <div class="row-fluid">
                         <?php echo $form->dropDownListControlGroup($persona, 'id_cargo',
        array(''=>'Seleccione un cargo','1'=>'Residente','2'=>'Vocero')); ?>
                        </div>
                        <div class="row-fluid" >
		<?php echo $form->emailFieldControlGroup($persona,'email'); ?>
                        </div>
                        <div class="row-fluid">
		<?php echo $form->labelEx($persona,'telf'); ?>
		<?php $this->widget(
                    'yiiwheels.widgets.maskinput.WhMaskInput',
                    array(
                        'model'=>$persona,
                        'attribute'        => 'telf',
                        'mask'          => '99999999999',
                'htmlOptions'   => array('placeholder' => '04143391525'),
            )
        );?>
		<?php echo $form->error($persona,'telf'); ?>
                        </div>
                    </fieldset>
                </div>
                <div class="span1"> </div>
                <div class="form-vertical row-fluid span5" > 
                    <!--  Viviendas -->
                    <fieldset> 
                        <legend>Datos de la Vivienda</legend>
                          <div class="row-fluid">
            
		<?php echo $form->textFieldControlGroup($vivienda,'urbanizacion'); ?>
                        </div>
                            <div class="row-fluid">
              
		<?php echo $form->textFieldControlGroup($vivienda,'calle'); ?>
                        </div>
            
                            <div class="row-fluid">
            
		<?php echo $form->textFieldControlGroup($vivienda,'nom_c'); ?>
                        </div>
            
                            <div class="row-fluid">
            
		<?php echo $form->textFieldControlGroup($vivienda,'num_c'); ?>
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
   