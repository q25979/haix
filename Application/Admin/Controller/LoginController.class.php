<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {
    public function index(){
    	$this->assign('public_url', C('PUBLIC_URL'));

    	// 调用其它控制器
    	// $this->link_mysql();

        $this->display();
    }

    // 验证码
    public function verify() {
    	$Verify = new \Think\Verify();

    	$Verify->length = 4;
    	$Verify->entry();
    }

    // 验证码验证
    public function check_verify($code, $id = '') {
    	$verify = new \Think\Verify();

    	if (!IS_AJAX) {
    		$this->error("验证码错误", U('Admin/Login'));
    	}

    	$code = I('post.code');

    	if ($verify->check($code)) {
    		$this->ajaxReturn(true);

    	} else {
    		$this->ajaxReturn(false);
    	}
    }
}