<?php
/**
 *
 * 管理员表
 * @author flynn
 *
 */
class OperationModel extends BaseModel
{
	private $TABLE_NAME = 'operation';

	public function __construct()
	{
			parent::__construct($this->TABLE_NAME, __CLASS__);
	}

	public function getRowByCode($code)
	{
		$c =  new CDbCriteria();
		$c->addCondition("patient_code='".$code."'");
		return $this->getRow($c);
	}

}
