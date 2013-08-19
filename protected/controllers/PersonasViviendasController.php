<?php

class PersonasViviendasController extends Controller
{	public $layout='//layouts/column2';
	public function actionCrear()
	{
		$PersonasViviendasForm = new PersonasViviendasForm();
		
		if(isset($_POST['$PersonasViviendasForm']))
		{
			$PersonasViviendasForm -> attributes = $_POST['PersonasViviendasForm'];
			
			if($PersonasViviendasForm -> validate())
			{
				$PersonasViviendas = new PersonasViviendas();
				$PersonasViviendas -> attributes = $_POST['PersonasViviendasForm'];
							
				try
				{
					$control = false;
					
					if(!$usuario -> existe() and !$vivienda -> existe())
					{
						$control = $usuario -> agregar();
						$controlV = $vivienda ->agregar();
					}
					else
					{
						$control = $usuario -> actualizar();
						$controlV = $vivienda -> actualizar();
					}

					if($control )
					{
						Yii::app() -> user -> setFlash('mensajeEstado', 'El registro fue incorporado exitosamente ' .
						                                                'en la base de datos');
						
						$usuarioForm = new UsuarioForm();
					}
					else
					{ 	
						
						$usuarioForm -> addError('ci', 'El registro no pudo ser incorporado en ' .
						                                     'la base de datos, inténtelo nuevamente');
					}
					if($controlV)
						{
						Yii::app() -> user -> setFlash('mensajeEstado', 'El registro fue incorporado exitosamente ' .
						                                                'en la base de datos');
						
						$regViviendasForm = new RegViviendasForm();
						}
						else
					{ 	
						
						$regViviendasForm -> addError('ci', 'El registro no pudo ser incorporado en ' .
						                                     'la base de datos, inténtelo nuevamente');
					}
				}
				catch (Exception $e)
				{
					$usuarioForm -> addError('ci', $e -> getMessage());
					$regViviendasForm -> addError('ci', $e -> getMessage());
				}
			}
		}

		$this -> render('crear', 
		                array('PersonasViviendasForm' => $PersonasViviendasForm,
							
						));
	}
        public function actionIndex()
        {
            $PersonasViviendasForm = new PersonasViviendasForm();
          $Sentencia_Sql = "SELECT 
              personas.cedula, 
              personas.nombres, 
              personas.apellidos, 
              personas.sexo, 
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
