<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends Controller {
    public function index(){
        $user = M("User");

        $data_count = count($user->distinct(true)->field('name, tel, addr')->select());

        $this->ajaxReturn($data_count);
    }

    // 读取用户数据
    public function get_user_info() {
        $user = M("User");

        $page = I('get.page');

        // 去掉重复值
        $data = $user->distinct(true)->field('name, tel, addr')->page($page, '10')->select();

        $data_count = count($user->distinct(true)->field('name, tel, addr')->select());

        $returnData['data'] = $data;
        $returnData['count'] = $data_count;

        $this->ajaxReturn($returnData);
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