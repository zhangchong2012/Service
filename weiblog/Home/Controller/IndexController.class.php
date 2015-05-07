<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if(!isset($_SESSION[C('USER_AUTH_KEY')])){ //判断是否有uid
    		$this->redirect('User/login');
    	}

       echo "helle world Home-Index!";

       $auth = new \Think\Auth();
    }

    public function logout(){
    	if($_SESSION[C('USER_AUTH_KEY')]){
    		session_destroy();
    		$this->redirect('')
    	}
    }

}