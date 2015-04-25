<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//展示api
       $title = "API 文档";
       $this->assign('title',$title);



       $list_names =  array("账号注册","账号登陆");
 		$this->assign('list_api_names',$list_names);
       $this->display();
    }
}