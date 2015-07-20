<?php
/**
 *
 * 诊断信息
 * @author flynn
 *
 */
class DiagnosticModel extends BaseModel
{
	private $TABLE_NAME = 'diagnostic';

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
