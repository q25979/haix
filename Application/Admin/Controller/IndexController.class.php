<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
    	$welcome_url = C('PUBLIC_URL') . 'Admin/welcome.php';

    	$this->assign('welcome_url', $welcome_url);
    	$this->assign('public_url', C('PUBLIC_URL'));

    	// 验证登录信息
    	$this->verify_info();
    }

    // 验证登录信息
    public function verify_info() {
    	$user = M('Admin');

    	$username = $_POST['username'];
    	$password = $_POST['password'];

    	$map['user'] = $username;
    	$map['pwd'] = $password;

		if ($user->where($map)->find() != null) {
			// 账号密码正确
			$this->display();

		} else {
			// 账号密码错误或者是非法登录domain_name
			$this->error("请检查你的账号和密码是否正确", C('DOMAIN_NAME') . 'admin.php');
			exit($user->getError());
		}
    }
}