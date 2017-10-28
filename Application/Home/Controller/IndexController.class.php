<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index($page) {

    	$card_img = C('PUBLIC_URL');

    	$this->assign('card_img', $card_img);

        $this->check_info($page);
    }

    public function check_info($page) {
        $user = M('User');

        $user_tel = I('post.tel');

        $map['tel'] = $user_tel;

        echo $user_tel;

        $user_data = $user->where($map)->page($page, '15')->select();

        if ($user_data == null) {
            $err = '您的手机号没有对应的参赛卡，如果有误请联系管理人员！';

            $this->error($err, '/haix/index.php/Home', 30);
        }

        $this->assign('data_list', $user_data);
        $this->assign('user_name', $user_data[0]["name"]);
        $this->assign('user_tel' , $user_data[0]["tel"]);
        $this->assign('user_addr', $user_data[0]["addr"]);

        $this->assign('page', $page);
        $this->assign('card_count', ceil(count($user->where($map)->select())/15));

        $this->display();
    }
}