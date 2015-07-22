<?php
/**
 *
 * 管理后台基类
 * @author admin
 *
 */
class Admin extends Controller
{
	public $layout='admin';
	public $username;
	public $hospital;
	public $role;
	public $currentMenu = '1000'; //首先打开Home
	public $menuGroup = array();
	public $menus = array(); //当前用户可见的菜单项(权限控制)
	protected $_userInfo = array();
	protected $_cookieKey = "loid_uid";
	protected $_checkAdmin = true;

	/**
	 *
	 * 注册过滤器
	 */
    public function filters()
    {
        if($this->_checkAdmin)
        {
            $filterSet = array("checkAdmin");
        }

        return $filterSet;
    }

    /**
     *
     * 过滤器
     * @param unknown_type $filterChain
     */
    public function filterCheckAdmin($filterChain)
    {
    	//未登录,跳转
    	if (!($uid = $this->isAdmin()))
    	{
    		$this->redirect(Yii::app()->baseUrl . "/");
    	}

    	//获取用户详细资料
		$adminModel = new AdminModel();
		$this->_userInfo = $adminModel->getInfoByUid($uid);
		$this->username = $this->_userInfo['username'];
		$this->hospital = $this->_userInfo['hospital'];
		$this->role = $this->_userInfo['role'];
		//账号错误
		if (!$this->_userInfo)
		{
			$this->_output("302", 'access deny', 'text');
		}

		$roleModel = new RoleModel();
		$role = $roleModel->getInfoByCode($this->_userInfo['role']);
		if ($role && $role['permission']) {
			$permission = explode(',',$role['permission']);
			//生成菜单
			$menuModel = new MenuModel();
			$this->menus = $menuModel->getInfoByCodes($permission);
			foreach ($this->menus as $key => $value) {
				$this->menuGroup[$value['group']] = $value['group'];
			}
		} else {
			header("HTTP/1.1 401");exit;
		}


		// //权限控
		// if ($this->_userInfo['role'] == "normal")
		// {
		// 	$controllerName = strtolower(Yii::app()->getController()->id);
		// 	$controllerName = substr($controllerName, strrpos($controllerName, "/") + 1);
		//
		// 	if (in_array($controllerName, array("member")) || (!array_key_exists($categoryId, $this->_categoryMenuList)))
		// 	{
		// 		header("HTTP/1.1 401");exit;
		// 	}
		// }

		$filterChain->run();
	}

	// public function getUserName()
	// {
	// 	if ($this->_userInfo) {
	// 		return $this->_userInfo['username'];
	// 	}
	// 	return '您';
	// }

	// /**
	//  *
	//  * 通过id列表获取name列表
	//  */
	// protected function getCategoryListById($categoryIdStr)
	// {
	// 	$categoryList = array();
	// 	if ($categoryIdStr)
	// 	{
	// 		$categoryIdList = explode(',', $categoryIdStr);
	//
	// 		foreach ($categoryIdList as $categoryId)
	// 		{
	//
	// 			if (isset($this->_categoryList[$categoryId]))
	// 			{
	// 				$categoryList[$categoryId] = $this->_categoryList[$categoryId]['name'];
	// 			}
	// 		}
	// 	}
	//
	// 	//var_dump($categoryList);exit;
	// 	return $categoryList;
	// }

	/**
	 * 从cookie中获取用户ID
	 *
	 */
	protected function isAdmin()
	{
		$cookie = Yii::app()->request->getCookies()->itemAt($this->_cookieKey);

		if ($cookie && $cookie->value) {
			return $cookie->value;
		}

		return 0;
	}

	/**
	 * uid保存到cookie中去
	 *
	 * @param unknown_type $uid
	 */
	protected function setAdmin($uid)
	{
		$cookie = new CHttpCookie($this->_cookieKey, $uid);
		Yii::app()->request->getCookies()->add($this->_cookieKey, $cookie);
	}

	/**
	 * 清除cookie
	 *
	 * @param unknown_type $uid
	 */
	protected function delAdmin()
	{
		Yii::app()->request->getCookies()->remove($this->_cookieKey);
	}
}
