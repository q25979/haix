<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
    	$welcome_url = C('PUBLIC_URL') . 'Admin/welcome.html';

    	$this->assign('welcome_url', $welcome_url);

        $this->display();
    }
}