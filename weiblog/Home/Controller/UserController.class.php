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
    	$verify_code=I('verify','');
    	if($username==''||$password==''||$verify_code==''){
            $this->redirect("User/login");
        }
        if(!$this->verifyCheck($verify_code)){
            $this->error("验证码错误！！！");
        }

         $user=M('user')->where(array('username'=>$username))->find();
        if(!$user||md5($password)!=$user['password']){
            $this->error("用户名或密码错误！！！");
        }
        if(!$user['status']){//status为0时表示锁定
 			$this->error("用户被锁定！！！");
        }else{
        	// $data['login_ip'] =  get_client_ip();
         //    $data['last_login_time']=time();
         //    if(M("user")->where(array('id'=>$user['id']))->save($data)){
         //        M("user")->where(array('id'=>$user['id']))->setInc("login_num");
         //    }
            session(C('USER_AUTH_KEY'),$user['id']);
            session('uname',$user['username']);
            $this->success("登录成功...",U("Index/index"));
        }
    }

    //验证码
    public function verify(){
        $config = array(    
            'fontSize'    =>    20,     // 验证码字体大小    
            'length'      =>    4,      // 验证码位数    
            'useNoise'    =>   false,  // 关闭验证码杂点
            'imageH'    =>  50,          // 验证码图片高度
            'imageW'    =>  200,          // 验证码图片宽度
        );
        $Verify =new \Think\Verify($config);
        $Verify->entry();
    }

    //验证验证码
    private function verifyCheck($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

}