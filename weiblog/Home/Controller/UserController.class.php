<?php
namespace Home\Controller;
use Think\Controller;
/**
* 
*/
class UserController extends Controller
{
	public function login(){
		$this->display();
    }

    public function register(){

    }

     public function logout(){
    	if($_SESSION[C('USER_AUTH_KEY')]){
    		session_destroy();
    		$this->redirect('User/login');
    	}else{
    		$this->error('已经退出!');
    	}
    }

    public function check_login(){
    	$username = I('post.username', '');
    	$password = I('post.password', '');
    	
    }

}