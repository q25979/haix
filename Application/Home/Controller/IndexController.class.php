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

        cookie('user_tel', $user_tel, 600);

        $user_tel_cookie = cookie('user_tel');

        if ($user_tel_cookie) {
            $map['tel'] = $user_tel_cookie;
        }

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

    public function base64_upload() {
        $base64 = I('post.base64');

        $base64_image = str_replace(' ', '+', $base64);

        //post的数据里面，加号会被替换为空格，需要重新替换回来，如果不是post的数据，则注释掉这一行
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image, $result)){
            //匹配成功
            if($result[2] == 'jpeg'){
                $image_name = uniqid().'.jpg';
                //纯粹是看jpeg不爽才替换的

            } else{
                $image_name = uniqid().'.'.$result[2];
            }

            $image_file = "./Uploads/card/{$image_name}";
            //服务器文件存储路径
            if (file_put_contents($image_file, base64_decode(str_replace($result[1], '', $base64_image)))) {
                $this->ajaxReturn($image_name);

            } else{

                $this->ajaxReturn(false);
            }
        } else{
            $this->ajaxReturn(false);
        }
    }
}