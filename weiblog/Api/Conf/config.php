<?php
return array(
	//'配置项'=>'配置值'
	//URL伪静态通常是为了满足更好的SEO效果
	'URL_HTML_SUFFIX'=>'html|shtml|xml',
	//URL访问不再区分大小写
	'URL_CASE_INSENSITIVE' =>true,



	'DB_TYPE'      =>  'mysql',     // 数据库类型
	'DB_HOST'      =>  'localhost',     // 服务器地址
	'DB_NAME'      =>  'weiblog',     // 数据库名
	'DB_USER'      =>  'root',     // 用户名
	'DB_PWD'       =>  '',     // 密码
	'DB_PORT'      =>  '3306',     // 端口
	'DB_PREFIX'    =>  '',     // 数据库表前缀
	//'DB_DSN'       =>  '',     // 数据库连接DSN 用于PDO方式
	'DB_CHARSET'   =>  'utf8', // 数据库的编码 默认为utf8
	
	//关闭session
	'SESSION_AUTO_START' =>false
);