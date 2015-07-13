<?php
/**
 * 获取已经存在的微信关注者(CLI 方式启动一个守护进程)
 * 
 * 启动方式：php yiic scriptname  例: php yiic test
 * 
 * @author admin
 *
 */
class FansCommand extends CConsoleCommand
{
	public function run($args)
	{
		$this->initAllFans();
	}
	
	private function initAllFans()
	{
    	$fansModel = new FansModel();
    	
    	$i = 0;
    	while ($i < 5) 
    	{
    		$i ++; //限制错误请求次数
    		
    		$nextOpenId = '';
    		$result = Yii::app()->wxapi->getAllFans($nextOpenId);
    		Yii::log("初始化关注者列表 next open id => {$nextOpenId} \n 请求结果 \n " . print_r($result, true), CLogger::LEVEL_INFO, 'wx.*');
    		
    		// 请求出错
    	    if ($result == false) 
	    	{
	    		sleep(5);
		    	continue;	
	    	}
	    	
	    	// 拉取完成
	    	if (empty($result['next_openid'])) 
	    	{
	    		break;
	    	}
	    	
	    	$nextOpenId = $result['next_openid']; // 设置下一轮拉取数据的起点
	    	
	    	// 将本轮拉取的数据更新到数据库
	    	$fansModel->initFuns($result['data']);
	    	
	    	//增加请求的时间间隔
	    	sleep(5);
    	}
    	
    	echo "finish\n";	
	}
}