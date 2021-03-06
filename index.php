<?php
/*
 * 入口文件
 * 定义常量
 * 加载函数库
 *启动框架
 */

date_default_timezone_set('PRC');

define('NF',realpath('./'));//代码目录
define('CORE',NF.'/core');//核心文件
define('APP',NF.'/app');//项目目录
define('MODULE','app');//模块

define('DEBUG',true);

include "vendor/autoload.php";

if(DEBUG){
    $whoops = new \Whoops\Run;
    $errorTile = '框架出错了';
    $option = new \Whoops\Handler\PrettyPageHandler;
    $option->setPageTitle($errorTile);
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_errors','On');
}else{
    ini_set('display_errors','Off');
}

include CORE.'/common/function.php';
include CORE.'/nf.php';

spl_autoload_register('\core\nf::load');

\core\nf::run();