<?php
	//关于前台部分的配置文件
	return array(
		//配置左右定界符
		'TMPL_L_DELIM'    =>    '<{',
		'TMPL_R_DELIM'    =>    '}>',
		//数据库配置信息
		'DB_HOST'   => 'localhost', // 服务器地址
		'DB_NAME'   => 'db_easy', // 数据库名
		'DB_USER'   => 'root', // 用户名
		'DB_PWD'    => '', // 密码
		'DB_PORT'   => 3306, // 端口
		'DB_PREFIX' => 'tb_', // 数据库表前缀 
		//配置页面输出调试信息
		'SHOW_PAGE_TRACE'=>true,   //显示页面Trace信息
		'TMPL_PARSE_STRING'=>array(           //添加自己的模板变量规则
			'__CSS__'=>__ROOT__.'/Public/Css',
			'__JS__'=>__ROOT__.'/Public/Js',
			'__IMAGE__'=>__ROOT__.'/Public/Images',
		),
	);
?>