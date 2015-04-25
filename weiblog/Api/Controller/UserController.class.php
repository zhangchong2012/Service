<?php

namespace Api\Controller;
use Think\Controller;
class UserController extends Controller{
	public function login(){
		// echo I('get.');
		print_r(I('get.'));
		if(!IS_POST){
			showErrorMsg("not support get params!");
			return ;
		}
			

		//跨模块调用
		// A('Index')->showErrorMsg("get is not support!");
		// $index = A('Index');
		// $index->index();
		
	}	

	public function register(){
		if(!IS_POST){
			showErrorMsg("not support get params!");
			return ;
		}

		$login_name = I('post.login_name');
		if(empty($login_name)){
			return;
		}

		$login_pwd = I('post.login_pwd');
		if(empty($login_pwd)){

			return;
		}

		$nick_name = I('post.nick_name');
		if(empty($nick_name)){
			$nick_name = "用户".time();
		}

		$birth = I('post.birth');
		$phone = I("post.phone");
		$addr = I('post.addr');

	}
}