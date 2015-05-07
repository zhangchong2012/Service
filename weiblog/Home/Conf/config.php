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

	'SESSION_AUTO_START' =>true,

	'USER_AUTH_KEY' => 'uid',

	'AUTH_CONFIG'=>array(
    'AUTH_ON' => true, //认证开关
    'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
    'AUTH_GROUP' => 'auth_group', //用户组数据表名
    'AUTH_GROUP_ACCESS' => 'auth_group_access', //用户组明细表
    'AUTH_RULE' => 'auth_rule', //权限规则表
    'AUTH_USER' => 'user'//用户信息表
 	)
);