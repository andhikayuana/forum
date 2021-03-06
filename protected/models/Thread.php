<?php

/**
 * This is the model class for table "thread".
 *
 * The followings are the available columns in table 'thread':
 * @property integer $id
 * @property string $judul
 * @property string $isi
 * @property integer $user_id
 * @property integer $kategori_id
 * @property string $tanggalPost
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property User $user
 * @property Kategori $kategori
 * @property Threadstar[] $threadstars
 */
class Thread extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'thread';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('judul, isi', 'required'),
			array('user_id, kategori_id', 'numerical', 'integerOnly'=>true),
			array('judul', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, judul, isi, user_id, kategori_id, tanggalPost', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comment', 'thread_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'kategori' => array(self::BELONGS_TO, 'Kategori', 'kategori_id'),
			'threadstars' => array(self::HAS_MANY, 'Threadstar', 'thread_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'judul' => 'Judul',
			'isi' => 'Isi',
			'user_id' => 'User',
			'kategori_id' => 'Kategori',
			'tanggalPost' => 'Tanggal Post',
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
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('isi',$this->isi,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('kategori_id',$this->kategori_id);
		$criteria->compare('tanggalPost',$this->tanggalPost,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Thread the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function lastNew(){
		/*$sql = 'SELECT * FROM news ORDER BY id DESC';
		$dataProvider = new CSqlDataProvider($sql,array(
			'keyField'=>'id',
			'pagination'=>array(
				'pageSize'=>5,
			),
		));*/
		$cr = new CDbCriteria();
		$cr->order = 'id DESC';

		$dataProvider = new CActiveDataProvider($this,array(
			'criteria'=>$cr,
			'pagination'=>array(
				'pageSize'=>5,
			),
		));
		return $dataProvider;
	}
	public function getUsername(){
		return CHtml::listData(User::model()->with('threads')->findAll(),'id','username');
	}
	
	public function getKategori(){
		return CHtml::listData(Kategori::model()->with('threads')->findAll(),'id','kategori');
	}
}
