<?php
namespace Api\Controller;
use Think\Controller;
class ApiController extends Controller {
    public function index(){
       echo "this is api function <br>";
       echo I('get.');
       echo "<br>";
       echo U('Admin/User/add',array('cate_id'=>1,'status'=>1)) ;

       echo "<br>Modle<br>";
       $User = M('User');
       echo $User;
       echo "<br>list<br>";
       print_r($User->select());
       
       $data['name'] = 'ThinkPHP';

      $data['email'] = 'ThinkPHP@gmail.com';
        $User->create($data);
        dump($User);

       $fields = $User->getDbFields();
       echo "<br>";
        print_r($fields);
    }
}