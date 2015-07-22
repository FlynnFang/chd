<?php
/**
 *
 * 管理员表
 * @author flynn
 *
 */
class FollowupModel extends BaseModel
{
	private $TABLE_NAME = 'followup';

	public function __construct()
	{
			parent::__construct($this->TABLE_NAME, __CLASS__);
	}

	public function deleteByCode($code)
	{
		$condition = "patient_code=':code'";
		$params = array(
			':code' => $code,
		);
		return $this->deleteAll($condition,$params);
	}

}
