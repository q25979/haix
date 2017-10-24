<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index() {
    	/*$user = M('Index');*/

    	//var_dump($user->create());
    	/*$tel = $_POST['tel'];
    	$code = $_POST['code'];

    	echo $tel . "<br>" . $code . "<br>";*/

    	$card_img = C('PUBLIC_URL');

    	$this->assign('card_img', $card_img);

        $this->display();
    }
}