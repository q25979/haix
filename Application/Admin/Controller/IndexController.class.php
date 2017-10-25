<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
    	$welcome_url = C('PUBLIC_URL') . 'Admin/welcome.php';

    	$this->assign('welcome_url', $welcome_url);
    	$this->assign('public_url', C('PUBLIC_URL'));

        $this->display();
    }
}