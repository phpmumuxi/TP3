<?php
return array(
	//'配置项'=>'配置值'
	//在页面底部设置显示跟踪信息
	'SHOW_PAGE_TRACE'      =>   true,
	//设置请求的默认分组
	//'DEFAULT_MODULE'       =>   'Back',  //默认模块（分组）
    //'MODULE_ALLOW_LIST'    =>   array('Home','Back'), //设置一个对比的分组列表
	 /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'thinks130',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'ts_',    // 数据库表前缀
    'URL_CASE_INSENSITIVE'  =>  true,   // 默认false 表示URL区分大小写 true则表示不区分大小写

);