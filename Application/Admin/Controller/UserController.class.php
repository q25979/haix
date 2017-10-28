<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends Controller {
    public function index(){
    }

    // 读取用户数据
    public function get_user_info() {
        $user = M("User");

        $page = I('get.page');

        // 去掉重复值
        // var_dump($user->distinct(true)->field('name, tel, addr')->page($page, '10')->select());

        $data = $user->distinct(true)->field('name, tel, addr')->page($page, '3')->select();

        $this->ajaxReturn($data);
    }

    // 读取用户参赛卡
    public function get_user_card() {
        $user = M("User");

        $map['name'] = "张三";
        $map['tel'] = "13432738787";
        $param = 'number, color, small_group, big_group, remarks';

        var_dump($user->where($map)->field($param)->select());
    }
}