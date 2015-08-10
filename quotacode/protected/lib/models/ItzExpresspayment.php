<?php

/**
 * This is the model class for table "itz_expresspayment".
 *
 * The followings are the available columns in table 'itz_expresspayment':
 * @property string $id
 * @property string $payment_id
 * @property integer $rechargelevel
 * @property integer $bindlevel
 * @property integer $state
 * @property integer $addtime
 * @property string $addip
 * @property integer $adduser
 * @property integer $modifytime
 * @property integer $modifyuser
 * @property string $modifyip
 */
class ItzExpresspayment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ItzExpresspayment the static model class
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
		return 'itz_expresspayment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rechargelevel, bindlevel, state, addtime, adduser, modifytime, modifyuser', 'numerical', 'integerOnly'=>true),
			array('payment_id', 'length', 'max'=>10),
			array('addip, modifyip', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, payment_id, rechargelevel, bindlevel, state, addtime, addip, adduser, modifytime, modifyuser, modifyip', 'safe', 'on'=>'search'),
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
            "payment" => array(self::BELONGS_TO,"Payment","payment_id"),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'payment_id' => 'Payment',
			'rechargelevel' => 'Rechargelevel',
			'bindlevel' => 'Bindlevel',
			'state' => 'State',
			'addtime' => 'Addtime',
			'addip' => 'Addip',
			'adduser' => 'Adduser',
			'modifytime' => 'Modifytime',
			'modifyuser' => 'Modifyuser',
			'modifyip' => 'Modifyip',
		);
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('payment_id',$this->payment_id,true);
		$criteria->compare('rechargelevel',$this->rechargelevel);
		$criteria->compare('bindlevel',$this->bindlevel);
		$criteria->compare('state',$this->state);
		$criteria->compare('addtime',$this->addtime);
		$criteria->compare('addip',$this->addip,true);
		$criteria->compare('adduser',$this->adduser);
		$criteria->compare('modifytime',$this->modifytime);
		$criteria->compare('modifyuser',$this->modifyuser);
		$criteria->compare('modifyip',$this->modifyip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}