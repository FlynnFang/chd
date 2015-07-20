<?php
/**
 *
 * 总览
 * @author flynn
 *
 */
class DashboardController extends Admin
{

	public function actionIndex()
	{
		$this->currentMenu = '1000';
		$this->render('index',array('username' => $this->_userInfo['username']));
	}

}
