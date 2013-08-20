<?php

/**
 * This is the model class for table "personas, viviendas".
 *
 * The followings are the available columns in table 'personas, viviendas':
 * @property integer $cedula
 * @property string $nombres
 * @property string $apellidos
 * @property string $sexo
 * @property string $fecha_ingreso
 * @property string $fecha_nacimiento
 * @property string $email
 * @property integer $id_viviendaC
 * @property integer $id_viviendaV
 * @property string $calle
 * @property string $nom_c
 * @property string $num_c
 * @property string $telf
 *
 * The followings are the available model relations:
 * @property Viviendas $idVivienda
 */
class PersonasViviendasForm extends CFormModel
{
    public  $cedula;
    public $nombres;
    public $apellidos;
    public $sexo;
    public $fecha_ingreso;
    public $fecha_nacimiento;
    public $email;
    public $id_vivienda;
    public $id_viviendaV;
    public $calle;
    public $nom_c;
    public $num_c;
    public $telf;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Personas the static model class
	 */
	
	
	/**
	 * @return array validation rules for model attributes.
	 */
        
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombres, apellidos, sexo,cedula
                            id_vivienda, calle, nom_c, num_c, telf,fecha_ingreso,fecha_nacimiento', 'required'),
			array('nombres, apellidos', 'length', 'max'=>40),
                        array('calle, nom_c', 'length', 'max'=>20),
                        array('num_c', 'length', 'max'=>5),
                        array('fecha_ingreso','convertir_fechaI'),
                        array('fecha_nacimiento','convertir_fechaN'),
                        array('cedula,telf','numerical','integerOnly'=>true),
                    
                    	
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('cedula, nombres, apellidos, sexo, fecha_ingreso, fecha_nacimiento, email, id_viviendaV, id_viviendaP, calle, nom_c, num_c, telf', 'safe', 'on'=>'search'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cedula'            => 'Cedula',
			'nombres'           => 'Nombres',
			'apellidos'         => 'Apellidos',
			'sexo'              => 'Sexo',
			'fecha_ingreso'     => 'Fecha Ingreso',
			'fecha_nacimiento'  => 'Fecha Nacimiento',
			'email'             => 'Email',
			'id_vivienda'       => 'Id Vivienda',
                        'calle'             => 'Nombre de la Calle',
                        'nom_c'             => 'Nombre de la casa',
                        'num_c'             => 'Numero de la casa',
                        'telf'              => 'Telefono',
		);
	}
         public function convertir_fechaI(){
		$this->fecha_ingreso = CDateTimeParser::parse($this->fecha_ingreso,'yyyy-mm-dd');
   			if($this->fecha_ingreso == null)
    			$this->addError('fecha_ingreso','La fecha de ingreso es requerida.');
  	}
         public function convertir_fechaN(){
		$this->fecha_nacimiento = CDateTimeParser::parse($this->fecha_nacimiento,'yyyy-mm-dd');
   			if($this->fecha_nacimiento == null)
    			$this->addError('fecha_nacimiento','La fecha de nacimiento es requerida.');
  	}
        public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idVivienda' => array(self::BELONGS_TO, 'Viviendas', 'id_vivienda'),
			'idCargo' => array(self::BELONGS_TO, 'Cargos', 'id_cargo'),
                        'personas' => array(self::HAS_MANY, 'Personas', 'id_vivienda'),
		);
	}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	
}