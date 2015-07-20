<?php
/**
 *
 * 用户管理
 * @author flynn
 *
 */
class UserController extends Admin
{
	public function init()
	{
			parent::init();
			$this->currentMenu = '1008';
	}

	public function actionIndex()
	{
		$this->actionList();
	}

	public function actionList()
	{
		$hospitalModel = new ConfigModel();
		$hospitals = $hospitalModel->getSetByType(Yii::app()->params['configType']['hospital']);

		$userModel = new AdminModel();
		$list = $userModel->getAllAdmin();

		$this->setPageTitle('用户管理');
		$this->render('list', array('list'=>$list, 'hospitals' =>$hospitals));
	}

}
