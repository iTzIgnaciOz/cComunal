<?php

/**
 * This is the model class for table "personas".
 *
 * The followings are the available columns in table 'personas':
 * @property string $cedula
 * @property string $nombres
 * @property string $apellidos
 * @property string $sexo
 * @property string $fecha_ingreso
 * @property string $fecha_nacimiento
 * @property integer $id_vivienda
 * @property integer $id_cargo
 * @property string $telf
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Viviendas $idVivienda
 * @property Cargos $idCargo
 */
class Personas extends CActiveRecord
{   
        public $cedula;
        public $nombres;
        public $apellidos;
        public $sexo;
        public $fecha_ingreso;
        public $fecha_nacimiento;
        public $email;
        public $id_cargo;
        public $telf;
        public $id_vivienda;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Personas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'personas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
        
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('nombres, apellidos, sexo,cedula, telf,fecha_ingreso,fecha_nacimiento, id_cargo', 'required'),
			array('nombres, apellidos', 'length', 'max'=>40),
                        
                        
                        
                        array('cedula,telf','numerical','integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cedula, nombres, apellidos, sexo, fecha_ingreso, fecha_nacimiento, id_vivienda, id_cargo, telf, email', 'safe', 'on'=>'search'),
		);
	}
          public function convertir_fechaI($attr, $params){
		$this->fecha_ingreso = CDateTimeParser::parse($this->fecha_ingreso,'yyyy-mm-dd');
   			if($this->fecha_ingreso == null)
    			$this->addError('fecha_ingreso','La fecha de ingreso es requerida.');
  	}
         public function convertir_fechaN($attr, $params){
		$this->fecha_nacimiento = CDateTimeParser::parse($this->fecha_nacimiento,'yyyy-mm-dd');
   			if($this->fecha_nacimiento == null)
    			$this->addError('fecha_nacimiento','La fecha de nacimiento es requerida.');
  	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idVivienda' => array(self::BELONGS_TO, 'Viviendas', 'id_vivienda'),
			'idCargo' => array(self::BELONGS_TO, 'Cargos', 'id_cargo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cedula' => 'Cedula',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'sexo' => 'Sexo',
			'fecha_ingreso' => 'Fecha Ingreso',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'id_vivienda' => 'Id Vivienda',
			'id_cargo' => 'Id Cargo',
			'telf' => 'Telf',
			'email' => 'Email',
		);
	}
      public function existe()
	{
		$sql = "SELECT cedula
                    FROM personas 
                    WHERE cedula= UPPER(:cedula)";
		$comando = Yii::app() -> db -> createCommand($sql);
		
		$comando -> bindParam(":cedula", $this -> cedula, PDO::PARAM_STR);
               
		return ($comando -> queryScalar() == $this -> cedula);
	}
        public function agregar($id_vivienda){
            $sql = "INSERT into personas VALUES
                (:cedula, :nombres, :apellidos, :sexo, :fecha_ingreso, :fecha_nacimiento,
                :id_vivienda, :id_cargo, :telf, :email)";
            $comando = Yii::app() -> db -> createCommand($sql);
		
		$comando -> bindParam(":cedula", $this -> cedula, PDO::PARAM_STR);
		$comando -> bindParam(":nombres", $this -> nombres, PDO::PARAM_STR);
		$comando -> bindParam(":apellidos", $this -> apellidos, PDO::PARAM_INT);
		$comando -> bindParam(":sexo", $this -> sexo, PDO::PARAM_STR);
		$comando -> bindParam(":fecha_ingreso", $this -> fecha_ingreso, PDO::PARAM_STR);
		$comando -> bindParam(":fecha_nacimiento", $this -> fecha_nacimiento, PDO::PARAM_STR);
		$comando -> bindParam(":id_vivienda", $id_vivienda, PDO::PARAM_INT);
		$comando -> bindParam(":id_cargo", $this -> id_cargo, PDO::PARAM_STR);
		$comando -> bindParam(":telf", $this -> telf, PDO::PARAM_INT);
		$comando -> bindParam(":email", $this -> email, PDO::PARAM_INT);
		$control = $comando -> execute();
            return ($control > 0);
        }
       

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('id_vivienda',$this->id_vivienda);
		$criteria->compare('id_cargo',$this->id_cargo);
		$criteria->compare('telf',$this->telf,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}