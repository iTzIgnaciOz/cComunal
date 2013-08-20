<?php

/**
 * This is the model class for table "viviendas".
 *
 * The followings are the available columns in table 'viviendas':
 * @property string $calle
 * @property string $num_c
 * @property string $nom_c
 * @property integer $id_vivienda
 * @property string $urbanizacion
 *
 * The followings are the available model relations:
 * @property Personas[] $personases
 */
class Viviendas extends CActiveRecord
{   public $calle;
    public $nom_c;
    public $num_c;
    public $id_cargo;
    public $urbanizacion;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Viviendas the static model class
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
		return 'viviendas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('calle, nom_c, num_c', 'required'),
			array('calle', 'length', 'max'=>30),
			array('num_c', 'length', 'max'=>5),
			array('nom_c', 'length', 'max'=>20),
			array('urbanizacion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('calle, num_c, nom_c, id_vivienda, urbanizacion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'personas' => array(self::HAS_MANY, 'Personas', 'id_vivienda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'calle' => 'Calle',
			'num_c' => 'Num C',
			'nom_c' => 'Nom C',
			'id_vivienda' => 'Id Vivienda',
			'urbanizacion' => 'Urbanizacion',
		);
	}
        public function existe()
	{
		$sql = "SELECT calle
                    FROM viviendas 
                    WHERE UPPER(calle) = UPPER(:calle) and
                    UPPER(num_c)= UPPER(:num_c) and  UPPER(nom_c)= UPPER(:nom_c) and UPPER(urbanizacion)=UPPER(:urbanizacion)";

		$comando = Yii::app() -> db -> createCommand($sql);
		
		$comando -> bindParam(":calle", $this -> calle, PDO::PARAM_STR);
                $comando -> bindParam(":num_c", $this -> num_c, PDO::PARAM_STR);
                $comando -> bindParam(":nom_c", $this -> nom_c, PDO::PARAM_STR);
                $comando -> bindParam(":urbanizacion", $this -> urbanizacion, PDO::PARAM_STR);
		return ($comando -> queryScalar() == $this -> calle);
	}
        public function buscarIdVivienda(){
         $sql = "SELECT  id_vivienda 
             FROM viviendas 
             WHERE UPPER(calle) = UPPER(:calle) and
                   UPPER(num_c)= UPPER(:num_c) and  UPPER(nom_c)= UPPER(:nom_c) and UPPER(urbanizacion)=UPPER(:urbanizacion)";
                $comando = Yii::app() -> db -> createCommand($sql);
                $comando -> bindParam(":calle", $this -> calle, PDO::PARAM_STR);
                $comando -> bindParam(":num_c", $this -> num_c, PDO::PARAM_STR);
                $comando -> bindParam(":nom_c", $this -> nom_c, PDO::PARAM_STR);
                $comando -> bindParam(":urbanizacion", $this -> urbanizacion, PDO::PARAM_STR);
		return ($comando ->queryScalar());
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

		$criteria->compare('calle',$this->calle,true);
		$criteria->compare('num_c',$this->num_c,true);
		$criteria->compare('nom_c',$this->nom_c,true);
		$criteria->compare('id_vivienda',$this->id_vivienda);
		$criteria->compare('urbanizacion',$this->urbanizacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}