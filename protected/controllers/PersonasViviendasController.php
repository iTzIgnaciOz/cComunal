<?php

class PersonasViviendasController extends Controller
{	public $layout='//layouts/column2';
	public function actionCrear()
	{
		$persona = new Personas();
                $vivienda = new Viviendas();
		
		if(isset($_POST['Personas']) and isset($_POST['Viviendas']))
		{ 
			$persona -> attributes = $_POST['Personas'];
                        $vivienda -> attributes = $_POST['Viviendas'];
			if($persona -> validate() && $vivienda->validate())
				try
				{
					$controlP = false;
                                        $controlV = false;
					
					if(!$persona -> existe())
					{
                                            if(!$vivienda-> existe()){
                                            
						$controlV = $vivienda -> save();
                                                
                                                $controlP = $persona -> agregar($vivienda->buscarIdVivienda());
                                            }
                                            else {
                                               Yii::app()->user->setFlash('error', '<strong>Error </strong> No se pudo registrar la vivienda ya que esta registrada en el sistema'); 
                                            }
					}
                                        
					else
					{ // ERRORES
                                            Yii::app()->user->setFlash('error', '<strong>Error </strong> No se pudo registrar la persona ya que esta registrada en el sistema');
						
					}
                                        if($controlP && $controlV){
                                            Yii::app()->user->setFlash('succes', '<strong>Registro Satisfactorio </strong> Se ha registrado exitosamente!');
                                            $persona = new Personas();
                                            $vivienda = new Viviendas(); 
                                            }
                                            else {
					Yii::app()->user->setFlash('warning', '<strong>Alerta </strong> No se ha podido completar la operacion, intente de nuevo...!');
                                                }
                                }
				catch (Exception $e)
				{
					$persona -> addError('cedula', $e -> getMessage());
					
				}
			}
                        
		

		$this -> render('crear', 
		                array('persona' => $persona,
                                    'vivienda' => $vivienda,
							
						));
	}
        public function actionIndex()
        {
            $PersonasViviendasForm = new PersonasViviendasForm();
          $Sentencia_Sql = "SELECT 
              personas.cedula, 
              personas.nombres, 
              personas.apellidos, 
              UPPER(personas.sexo) as sexo, 
              personas.fecha_ingreso, 
              personas.fecha_nacimiento, 
              viviendas.calle, 
              viviendas.num_c, 
              viviendas.nom_c, 
              viviendas.id_vivienda
            FROM 
              personas, 
              viviendas
            WHERE 
              personas.id_vivienda = viviendas.id_vivienda";
        
       // $Resultado_Sentencia=Yii::app()->db->createCommand($Sentencia_Sql)->queryAll();


            $this -> render('index', 
		                array('PersonasViviendasForm' => $PersonasViviendasForm,
                                    'dataProvider'=> $dataProvider=new CSqlDataProvider($Sentencia_Sql, array('keyField' => 'cedula'))
                                    ));
        }
       }
?>
