<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends Controller {
    public function index(){
        if(!IS_AJAX) {
            echo "非法操作!";
            return;
        }

        $user = M("User");

        // $data_count = count($user->distinct(true)->field('name, tel, addr')->select());
        $data_count = count($user->select());

        $this->ajaxReturn($data_count);
    }

    // 读取用户数据
    public function get_user_info() {
        $user = M("User");

        $page = I('post.page');

        // 去掉重复值
        $data = $user->page($page, '10')->select();

        $data_count = count($user->select());

        $returnData['data'] = $data;
        $returnData['count'] = $data_count;

        $this->ajaxReturn($returnData);
    }

    // 按id查询用户信息
    public function idGet_user_info() {
        $user = M("User");

        $id = I('post.id');

        // 判断上传的id是否为空
        if ($id == "" || $id == null) {
            $this->ajaxReturn("id null");
        }

        $map['id'] = $id;

        $data = $user->where($map)->select();

        if ($data == null) {
            $this->ajaxReturn("mysql null");
        }

        $this->ajaxReturn($data);
    }

    // 按id修改用户
    public function idUpdata_user() {
        $user = M("User");

        $data['id'] = I('post.id');
        $data['name'] = I('post.name');
        $data['tel'] = I('post.tel');
        $data['addr'] = I('post.addr');
        $data['number'] = I('post.number');
        $data['color'] = I('post.color');
        $data['small_group'] = I('post.small_group');
        $data['big_group'] = I('post.big_group');
        $data['remarks'] = I('post.remarks');

        // 判断上传的id是否为空
        if ($data['id'] == "" || $data['id'] == null) {
            $this->ajaxReturn('id err');
        }

        $map['id'] = $data['id'];

        $returnData = $user->where($map)->data($data)->save();

        $this->ajaxReturn($returnData);
    }

    // 按id删除用户
    public function del_user() {
        if (!IS_POST) {
            echo "非法操作!";
            return;
        }

        $user = M("User");

        $map['id'] = I('post.id');

        $data = $user->where($map)->delete();

        $this->ajaxReturn($data);
    }

    // 增加用户
    public function add_user() {
        if (!IS_POST) {
            echo "非法操作！";
        }

        $user = M("User");

        $data['name'] = I('post.name');
        $data['tel'] = I('post.tel');
        $data['addr'] = I('post.addr');
        $data['number'] = I('post.number');
        $data['color'] = I('post.color');
        $data['small_group'] = I('post.small_group');
        $data['big_group'] = I('post.big_group');
        $data['remarks'] = I('post.remarks');

        $result = $user->data($data)->add();

        $this->ajaxReturn($result);
    }
}