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


}
