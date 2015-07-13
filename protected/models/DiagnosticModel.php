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


}
