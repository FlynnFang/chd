<?php
/**
 * CLI 方式启动一个守护进程
 * 
 * 启动方式：php yiic scriptname  例: php yiic test
 * 
 * @author admin
 *
 */
class TestCommand extends CConsoleCommand
{
	public function run($args)
	{
		echo '*** test command ***';
	}	
}