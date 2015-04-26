<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       echo "helle world Home-Index!";
    }

    public function login(){
		$this->display();
    }

    public function register(){

    }
}