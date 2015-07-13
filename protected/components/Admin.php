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
	protected $_userInfo = array();
	protected $_categoryList = array();
	protected $_categoryMenuList = array(); //当前用户可见的菜单项(权限控制)
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
		
		//账号错误
		if (!$this->_userInfo) 
		{
			$this->_output("302", 'access deny', 'text');
		}
		
		//栏目列表
		$categoryModel = new CategoryModel(); 
		$this->_categoryList = $categoryModel->getList();
				
		if ($this->_userInfo['role'] == "super") 
		{//超级管理员
			$this->_categoryMenuList = $this->_categoryList;
		}
		else if ($this->_userInfo['role'] == "normal")
		{//普通管理员
			$categoryIdStr = $this->_userInfo['categoryId'];
			if (empty($categoryIdStr)) 
			{
				echo "access deny!";exit;
			}
			
			$categoryList = $this->getCategoryListById($categoryIdStr);
			
			foreach ($categoryList as $k => $v)
			{
				$this->_categoryMenuList[$k] = array(
					'id' => $k,
					'name' => $v,
				);
			}
		}
		
		//检查栏目是否为空
		if (empty($this->_categoryMenuList)) 
		{
			header("HTTP/1.1 401");exit;;
		}
		
		//当前请求的categoryId
		$categoryId = Yii::app()->request->getParam("categoryId", 0);
		if ($categoryId === 0) 
		{
			$categoryId = $_GET['categoryId'] = key($this->_categoryMenuList);
		}
		
		//权限控制
		if ($this->_userInfo['role'] == "normal")
		{
			$controllerName = strtolower(Yii::app()->getController()->id);
			$controllerName = substr($controllerName, strrpos($controllerName, "/") + 1);
			
			if (in_array($controllerName, array("member")) || (!array_key_exists($categoryId, $this->_categoryMenuList))) 
			{
				header("HTTP/1.1 401");exit; 
			}
		}
		
		$filterChain->run();
	}
	
	/**
	 * 
	 * 通过id列表获取name列表
	 */
	protected function getCategoryListById($categoryIdStr)
	{
		$categoryList = array();
		if ($categoryIdStr) 
		{
			$categoryIdList = explode(',', $categoryIdStr);
			
			foreach ($categoryIdList as $categoryId)
			{
			
				if (isset($this->_categoryList[$categoryId])) 
				{
					$categoryList[$categoryId] = $this->_categoryList[$categoryId]['name'];
				}
			}
		}
		
		//var_dump($categoryList);exit;
		return $categoryList;
	}
	
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