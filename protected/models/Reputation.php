<?php

/**
 * This is the model class for table "reputation".
 *
 * The followings are the available columns in table 'reputation':
 * @property integer $id
 * @property string $tanggal
 * @property integer $jenis
 * @property integer $pemberi_id
 * @property integer $penerima_id
 *
 * The followings are the available model relations:
 * @property User $pemberi
 * @property User $penerima
 */
class Reputation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reputation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal, jenis, pemberi_id, penerima_id', 'required'),
			array('jenis, pemberi_id, penerima_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tanggal, jenis, pemberi_id, penerima_id', 'safe', 'on'=>'search'),
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
			'pemberi' => array(self::BELONGS_TO, 'User', 'pemberi_id'),
			'penerima' => array(self::BELONGS_TO, 'User', 'penerima_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tanggal' => 'Tanggal',
			'jenis' => 'Jenis',
			'pemberi_id' => 'Pemberi',
			'penerima_id' => 'Penerima',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('jenis',$this->jenis);
		$criteria->compare('pemberi_id',$this->pemberi_id);
		$criteria->compare('penerima_id',$this->penerima_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reputation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
