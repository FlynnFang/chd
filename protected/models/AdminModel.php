<?php
/**
 *
 * 管理员表
 * @author flynn
 *
 */
class AdminModel extends BaseModel
{
	private $TABLE_NAME = 'admin';

	public function __construct()
	{
			parent::__construct($this->TABLE_NAME, __CLASS__);
	}

	/**
	 *	根据用户名查询用户信息
	 */
	public function getInfoByUsername($username)
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("username='{$username}'");
		return $this->getRow($criteria);
	}
}
