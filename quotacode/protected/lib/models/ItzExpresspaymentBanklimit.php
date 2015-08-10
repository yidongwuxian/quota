<?php

/**
 * This is the model class for table "itz_expresspayment_banklimit".
 *
 * The followings are the available columns in table 'itz_expresspayment_banklimit':
 * @property string $id
 * @property integer $bank_id
 * @property integer $expresspayment_id
 * @property integer $status
 * @property integer $every_limit
 * @property integer $daily_limit
 * @property integer $monthly_limit
 * @property integer $addtime
 * @property integer $modifytime
 * @property string $addip
 * @property integer $adduser
 * @property integer $modifyuser
 * @property string $modifyip
 */
class ItzExpresspaymentBanklimit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ItzExpresspaymentBanklimit the static model class
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
		return 'itz_expresspayment_banklimit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bank_id, expresspayment_id, status, every_limit, daily_limit, monthly_limit, addtime, modifytime, adduser, modifyuser', 'numerical', 'integerOnly'=>true),
			array('addip, modifyip', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bank_id, expresspayment_id, status, every_limit, daily_limit, monthly_limit, addtime, modifytime, addip, adduser, modifyuser, modifyip', 'safe', 'on'=>'search'),
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
            "expresspayment" => array(self::BELONGS_TO,"ItzExpresspayment","expresspayment_id"),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bank_id' => 'Bank',
			'expresspayment_id' => 'Expresspayment',
			'status' => 'Status',
			'every_limit' => 'Every Limit',
			'daily_limit' => 'Daily Limit',
			'monthly_limit' => 'Monthly Limit',
			'addtime' => 'Addtime',
			'modifytime' => 'Modifytime',
			'addip' => 'Addip',
			'adduser' => 'Adduser',
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
		$criteria->compare('bank_id',$this->bank_id);
		$criteria->compare('expresspayment_id',$this->expresspayment_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('every_limit',$this->every_limit);
		$criteria->compare('daily_limit',$this->daily_limit);
		$criteria->compare('monthly_limit',$this->monthly_limit);
		$criteria->compare('addtime',$this->addtime);
		$criteria->compare('modifytime',$this->modifytime);
		$criteria->compare('addip',$this->addip,true);
		$criteria->compare('adduser',$this->adduser);
		$criteria->compare('modifyuser',$this->modifyuser);
		$criteria->compare('modifyip',$this->modifyip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}