<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//展示api
       $title = "API 文档";
       $this->assign('title',$title);

       $apis = array($this->loginApi());

 		  $this->assign('apis',$apis);
	   	$this->display();
    }

    private function loginApi(){
        $params = array($this->makeApiParams("login_name", "string", "登录名"), $this->makeApiParams("login_pwd", "string", "登录密码") );
        return  $this->makeApiArray("账号登录", U('User/login'), "post", $params, "");
    }

    private function makeApiArray($api_name, $api_url, $api_method, $api_params, $api_demo){
      $api = array('api_name' => $api_name, 'api_url' => $api_url, 'api_method' => $api_method,'api_params'=>$api_params, 'api_demo' => $api_demo);
      return $api;
    }

    private function makeApiParams($param_name, $param_type, $param_summary){
        return array('param_name' => $param_name, 'param_type' => $param_type, 'param_summary' => $param_summary);
    }

    private function registerApi(){

    }

    public function init(){
      //$conn = mysql_connect(C('DB_HOST').":3306",C('DB_USER'),C('DB_PWD'));
      $con = mysql_connect("localhost","root","");
      if (!$con)
      {
      die('Could not connect: ' . mysql_error());
      }

      $sql_database = "CREATE DATABASE IF NOT EXISTS ".C('DB_NAME');

      //准备数据库
      // $sql_user = "CREATE TABLE IF NOT EXISTS user
      // {
      // id int(8) unsigned NOT NULL AUTO_INCREMENT,
      // name char(20) NOT NULL DEFAULT '',
      // pwd char(20) NOT NULL DEFAULT '',
      // phone int(11) NOT NULL DEFAULT '',
      // PRIMARY KEY (id)
      // } CHARSET=utf8 ";



      echo $sql_user;

      if(mysql_query($sql_database, $con) &&
        mysql_select_db(C('DB_NAME'), $con)){
          echo "Database created</br>";
        $this->initAuth($con);
        $this->initUser($con);
      }else{
        echo "Error creating database: " . mysql_error();
      }
      mysql_close($con);

    }   

    private function initAuth($con){  
       // -- think_auth_rule，规则表， 
      // -- id:主键，name：规则唯一标识, title：规则中文名称 status 状态：为1正常，为0禁用，condition：规则表达式，为空表示存在就验证，不为空表示按照条件验证
      $sql_drop_rule = "DROP TABLE IF EXISTS `auth_rule`";
      $sql_create_rule = "CREATE TABLE `auth_rule` (  
      `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,  
      `name` char(80) NOT NULL DEFAULT '',  
      `title` char(20) NOT NULL DEFAULT '',  
      `type` tinyint(1) NOT NULL DEFAULT '1',    
      `status` tinyint(1) NOT NULL DEFAULT '1',  
      `condition` char(100) NOT NULL DEFAULT '',  # 规则附件条件,满足附加条件的规则,才认为是有效的规则
      PRIMARY KEY (`id`),  
      UNIQUE KEY `name` (`name`)
      ) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
      // -- ----------------------------
      // -- think_auth_group 用户组表， 
      // -- id：主键， title:用户组中文名称， rules：用户组拥有的规则id， 多个规则","隔开，status 状态：为1正常，为0禁用
      // -- ----------------------------
      $sql_drop_group = "DROP TABLE IF EXISTS `auth_group`";
      $sql_create_group = "CREATE TABLE `auth_group` ( 
      `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT, 
      `title` char(100) NOT NULL DEFAULT '', 
      `status` tinyint(1) NOT NULL DEFAULT '1', 
      `rules` char(80) NOT NULL DEFAULT '', 
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
      // -- ----------------------------
      // -- think_auth_group_access 用户组明细表
      // -- uid:用户id，group_id：用户组id
      // -- ----------------------------
      $sql_drop_access = "DROP TABLE IF EXISTS `auth_group_access`";
      $sql_create_access = "CREATE TABLE `auth_group_access` (  
      `uid` mediumint(8) unsigned NOT NULL,  
      `group_id` mediumint(8) unsigned NOT NULL, 
      UNIQUE KEY `uid_group_id` (`uid`,`group_id`),  
      KEY `uid` (`uid`), 
      KEY `group_id` (`group_id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8";
    
    if(mysql_query($sql_drop_rule, $con) &&
      mysql_query($sql_create_rule, $con) &&
      mysql_query($sql_drop_group, $con) &&
      mysql_query($sql_create_group, $con) &&
      mysql_query($sql_drop_access, $con) &&
      mysql_query($sql_create_access, $con)
      ){
         echo "Table auth created<br>";
      }else{
       echo "Error creating database: " . mysql_error();
      }
    }

    private function initUser($con){
      $sql_user = "CREATE TABLE IF NOT EXISTS `user` (
        `id` smallint(6) NOT NULL AUTO_INCREMENT,
        `name` char(20) NOT NULL,
        `pwd` char(20) NOT NULL,
        `phone` smallint(11) NOT NULL,
        PRIMARY KEY (`id`)
        ) ;";
      if(mysql_query($sql_user, $con)){
         echo "Table user created<br>";
      }else{
       echo "Error creating database: " . mysql_error();
      }
    }
}