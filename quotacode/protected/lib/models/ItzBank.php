<?php

/**
 * This is the model class for table "itz_bank".
 *
 * The followings are the available columns in table 'itz_bank':
 * @property integer $bank_id
 * @property string $bank_name
 * @property integer $withdraw_link_id
 * @property integer $weight
 * @property string $add_time
 * @property string $mod_time
 * @property string $addip
 */
class ItzBank extends DwActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ItzBank the static model class
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
		return 'itz_bank';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('withdraw_link_id, weight', 'numerical', 'integerOnly'=>true),
			array('bank_name', 'length', 'max'=>50),
			array('addip', 'length', 'max'=>20),
			array('add_time, mod_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bank_id, bank_name, withdraw_link_id, weight, add_time, mod_time, addip', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'bank_id' => 'Bank',
			'bank_name' => 'Bank Name',
			'withdraw_link_id' => 'Withdraw Link',
			'weight' => 'Weight',
			'add_time' => 'Add Time',
			'mod_time' => 'Mod Time',
			'addip' => 'Addip',
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

		$criteria->compare('bank_id',$this->bank_id);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('withdraw_link_id',$this->withdraw_link_id);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('mod_time',$this->mod_time,true);
		$criteria->compare('addip',$this->addip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}