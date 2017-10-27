<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>广东海翔赛鸽公棚参赛卡后台登录</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/haix/Public/css/font.css" />
    <link rel="stylesheet" type="text/css" href="/haix/Public/css/xadmin.css" />

    <script type="text/javascript" src="/haix/Public/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/haix/Public/js/xadmin.js"></script>
    <script type="text/javascript" src="/haix/Public/lib/layui/layui.js"></script>
</head>
<script type="text/javascript" src="/haix/Public/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/haix/Public/Admin/css/style.css" />

<body class="login-bg">

    <div class="login">
        <div class="message">咸鱼科技-管理登录</div>
        <div id="darkbannerwrap"></div>

        <form method="post" class="layui-form" action="<?php echo U('/Admin');?>">
            <input name="username" placeholder="用户名" type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input type="text" style="width: 50%" placeholder="验证码" name="code" id="code">
            <img src="<?php echo U('Login/verify', '', '');?>" class="xy-verify pull-left">
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>

    <script>
        $(function  () {
            /*layui.use('form', function(){
              var form = layui.form;
              // layer.msg('玩命卖萌中', function(){
              //   //关闭后的操作
              //   });
              //监听提交
              form.on('submit(login)', function(data){
                // alert(888)
                layer.msg(JSON.stringify(data.field),function(){
                    location.href='admin.php/Admin/index'
                });
                return false;
              });
            });*/

            // 提交表单按钮
            $("[type=submit]").click(() => {
            	// alert(1);
            	// var loginLoad = layer.load(2, {time: 1000});
            	// console.log($("input[name=username]").val());
            	// console.log($("input[name=password]").val());

            	$("#code").blur();
            	// return;

            	// $("[type=submit]").removeAttr("disabled");
            });

            // 点击刷新验证码
            $(".xy-verify").click(function () {
            	updataVerify();
            });

            // 验证码异步验证
            $("#code").focusout(() => {
            	$.ajax({
            		url: "<?php echo U('Login/check_verify');?>",
            		data: "code=" + code.value,
            		type: "POST",
            		success: function(data) {
            			if (data !== true) {
            				layer.tips("验证码错误", $("#code"), {
            					tips: [1, '#3595CC'],
            					time: 1000
            				});

            				// $("[type=submit]").attr("disabled", "disabled");
            				updataVerify();

            			} else {
            				layer.tips("验证码正确", $("#code"), {
            					tips: [1, 'lightgreen'],
            					time: 1000
            				});
            				// $("[type=submit]").removeAttr("disabled");
            			}
            		}
            	});
            });
        })

        /**
         * 刷新验证码
         */
        function updataVerify() {
        	$(".xy-verify").attr('src', $(".xy-verify").attr('src') + "?" + Math.random());
        }
    </script>
    <!-- 底部结束 -->
</body>
</html>