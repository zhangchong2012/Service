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

    public function registerApi(){

    }

    public function init(){
	
  	//准备数据库
	
    }
}