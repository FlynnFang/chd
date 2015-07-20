<?php
/**
 *
 * 管理员表
 * @author flynn
 *
 */
class PatientModel extends BaseModel
{
	private $TABLE_NAME = 'patient';

	public function __construct()
	{
			parent::__construct($this->TABLE_NAME, __CLASS__);
	}

	// public function relations()
	// {
	// 	return array(
	// 		'hospital'=>array(self::HAS_ONE, 'Config', 'hospital','on'=>'type='.Yii::app()->params['configType']['hospital'],),
	// 	);
	// }

	public function getRowByCode($code)
	{
		$c =  new CDbCriteria();
		$c->addCondition("patient_code='".$code."'");
		return $this->getRow($c);
	}


}
