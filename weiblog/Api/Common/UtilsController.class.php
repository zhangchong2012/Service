<?php
namespace Api\Controller;
use Think\Controller;
class UtilsController extends Controller{
	public function showErrorMsg($msg){
		echo $msg;
	}
}