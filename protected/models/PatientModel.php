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
	// 		'operation'=>array(self::HAS_ONE, 'OperationModel', 'patient_code',),
	// 	);
	// }

	public function getRowByCode($code)
	{
		$c =  new CDbCriteria();
		$c->addCondition("patient_code='".$code."'");
		return $this->getRow($c);
	}

	public function getMaxPatientCode()
	{
		$c =  new CDbCriteria();
		$c->order = ('patient_code desc');
		return $this->getRow($c);
	}

	public function deleteByCode($code)
	{
		$condition = "patient_code=:code";
		$params = array(
			':code' => $code,
		);
		return $this->deleteAll($condition,$params);
	}



}
