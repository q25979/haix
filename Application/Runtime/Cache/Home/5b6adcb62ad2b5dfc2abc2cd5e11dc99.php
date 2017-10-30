<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>广东海翔赛鸽公棚电子参赛卡领取系统</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="/haix/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/haix/Public/css/xy.css" />

	<script type="text/javascript" src="/haix/Public/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="/haix/Public/lib/layui/layui.all.js"></script>
</head>
<body class="login-body">
	<h3 class="text-center card-title"><strong>广东海翔赛鸽公棚</strong></h3>
	<div class="panel panel-primary xy-login">
		<div class="panel-heading"><h3 class="panel-title">电子参赛卡获取登录</h3></div>
		<div class="panel-body">
			<form action="<?php echo U('/Home/Index', '', '');?>/index?page=1" method="POST" onsubmit="return toVaild()">
				<div class="form-group">
					<label for="">手机号码</label>
					<div>
						<input
							type="tel"
							class="form-control"
							name="tel"
							placeholder="请输入你的号码"
							id="tel"
						/>
					</div>
				</div>

				<div class="form-group">
					<label for="">验证码</label>
					<div class="input-group">
						<input
							type="text"
							class="form-control"
							name="code"
							id="code"
							placeholder="请输入你的验证码"
						/>
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" id="getCodeBtn" disabled>获取验证码</button>
						</span>
					</div>
				</div>

				<button type="submit" class="btn btn-primary btn-block">登录</button>
			</form>
		</div>
	</div>

	<script>
		var __code = "";
		var gWait = 60;	// 设置等待时间
		var btnStatus = true;

		$(function () {
			// 获取验证码
			$("#getCodeBtn").click(function () {
				// 60s倒计时
				setBtnStatus();

				$.ajax({
					url: "<?php echo U('/Home/Login/sendMsg', '', '');?>",
					type: "POST",
					data: {
						tel: $("#tel").val()
					},
					success: function(data) {

						var oCode = JSON.parse(data.code);

						// 获取验证码返回全局
						__code = oCode.code;
						console.log(data);
					},
					error: function(data) {
						console.log("error！");
					}
				});
			});

			// 提交按钮
			$("[type=submit]").click(() => {
				return;
			});

			// 手机输入框失去焦点时
			$("#tel").focusout(() => {
				if (isPhone($("#tel").val())) {
					// 是手机号码格式
					$("#getCodeBtn").removeAttr("disabled");

				} else {
					// 不是手机号码格式
					$("#getCodeBtn").attr("disabled", "disabled");

					layer.tips("手机号码格式错误", $("#tel"), {
						tips: [1, "#C9302C"],
						time: 1000
					});

				}
			});

			// 验证码获取焦点
			$("#code").focusin(() => {
				if (btnStatus == true) return;
				$("#getCodeBtn").attr("disabled", "disabled");
			});

			// 手机输入框获取焦点时
			$("#tel").focusin(() => {
				if (btnStatus == false) return;
				$("#getCodeBtn").removeAttr("disabled");
			});
		});

		// 判断手机号码格式
		function isPhone(number) {
			var telReg = /^1[34578]\d{9}$/;

			if (telReg.test(number)) {
				return true;

			} else {
				return false;
			}
		}

		// 验证表单提交
		function toVaild() {
			// 判断手机号
			if ($("#tel").val() == "") {
				layer.tips("手机号码不能为空", $("#tel"), {
					tips: [1, "#C9302C"],
					time: 1000
				});

				return false;
			}

			// 判断手机格式
			if (!isPhone($("#tel").val())) {
				layer.tips("手机号码格式错误", $("#tel"), {
					tips: [1, "#C9302C"],
					time: 1000
				});

				return false;
			}

			// 判断验证码
			if ($("#code").val() == "" || parseInt($("#code").val()) != parseInt(__code)) {
				layer.tips("验证码输入错误", $("#code"), {
					tips: [1, "#C9302C"],
					time: 1000
				});

				return false;
			}

			return true;
		}

		// 设置form btn的状态
		function setBtnStatus() {
			if (gWait == 0) {
				// 到可点击状态
				$("#getCodeBtn").removeAttr('disabled');
				$("#getCodeBtn").text(`获取验证码`);
				gWait = 60;
				btnStatus = true;

			} else {
				// 不可点击状态
				$("#getCodeBtn").attr("disabled", "disabled");
				$("#getCodeBtn").text(`${gWait}后重新获取`);
				gWait--;
				btnStatus = false;

				setTimeout(() => {
					setBtnStatus();
				}, 1000);
			}
		}
	</script>
</body>
</html>