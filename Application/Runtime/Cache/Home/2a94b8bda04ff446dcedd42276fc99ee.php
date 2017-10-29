<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>广东海翔赛鸽公棚参赛卡</title>

	<link rel="stylesheet" type="text/css" href="/haix/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/haix/Public/css/xy.css" />
	<link rel="stylesheet" type="text/css" href="/haix/Public/css/jquery-confirm.min.css" />

	<script type="text/javascript" src="/haix/Public/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="/haix/Public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/haix/Public/js/html2canvas.min.js"></script>
	<script type="text/javascript" src="/haix/Public/js/card.js"></script>
	<script type="text/javascript" src="/haix/Public/js/jquery-confirm.min.js"></script>
</head>
<body>
	<div class="xy-table__container">
		<!-- 表格 -->
		<div class="xy-table" id="xy-table">
			<img src="<?php echo ($card_img); ?>/images/card-bg.jpg" class="xy-background">

			<h3 class="text-center">
				<img src="<?php echo ($card_img); ?>/images/logo.png" alt="logo" class="img-circle xy-logo">
				<strong>广东海翔赛鸽公棚参赛卡</strong>
			</h3>

			<div class="table-header">
				<span><strong>鸽主名称：<?php echo ($user_name); ?></strong></span>
				<span><strong>联系电话：<?php echo ($user_tel); ?></strong></span>
				<span><strong>地区：<?php echo ($user_addr); ?></strong></span>
			</div>

			<table class="table table-bordered table-condensed text-center">
				<tr>
					<th>序号</th>
					<th>参赛鸽足环号</th>
					<th>羽色</th>
					<th>小团体</th>
					<th>大团体</th>
					<th>备注</th>
				</tr>

				<?php if(is_array($data_list)): foreach($data_list as $key=>$vo): ?><tr>
						<td><?php echo ($key+1); ?></td>
						<td><?php echo ($vo["number"]); ?></td>
						<td><?php echo ($vo["color"]); ?></td>
						<td><?php echo ($vo["small_group"]); ?></td>
						<td><?php echo ($vo["big_group"]); ?></td>
						<td><?php echo ($vo["remarks"]); ?></td>
					</tr><?php endforeach; endif; ?>
			</table>

			<img src="<?php echo ($card_img); ?>/images/haix-flag.png" oncontextmenu="return false;" onselectstart="return false;" class="xy-flag">

			<div class="table-footer text-center clearfix">
				<span class="pull-left"><strong>鸽主签名：</strong></span>
				<span><strong>收鸽单位签章：</strong></span>
				<div class="text-left">
					<p>
						<strong>注：此卡为观摩、参赛、领奖、领鸽凭证。</strong>
						<strong class="pull-right">官网网址：www.hxsggp.com</strong>
					</p>
					<p>
						<strong>业务联系人：(陈小海)13318675828  &nbsp;&nbsp;公棚电话：0660-6754333</strong>
						<strong class="pull-right">公棚地址：汕尾市海丰县城东镇后塘村</strong>
					</p>
				</div>
			</div>
		</div>
		<!-- 表格结束 -->

		<!-- 分页 -->
		<div class="xy-page__div">
			<nav aria-label="...">
  				<ul class="pager">
    				<li id="aBefore"><a href="javascript:">上一张</a></li>
    				<li><a href="javascript:" id="pageCount"><?php echo ($page); ?></a></li>
    				<li id="aNext"><a href="javascript:">下一张</a></li>
    				<li class="disabled xy-page__sum">共 <?php echo ($card_count); ?> 张参赛卡</li>
    				<li
    					class="xy-float-right"
    					data-toggle="modal"
    					data-target=".bs-example-modal-lg"
    					onclick="buildImg()"
    				>
    					<a href="javascript:">获取参赛卡</a>
    				</li>
  				</ul>
			</nav>
		</div>
		<!--分页结束-->
	</div>

	<!-- 参赛卡图片 -->
	<!-- 参赛卡图片 -->
<div
	class="modal fade bs-example-modal-lg"
	tabindex="-1"
	role="dialog"
	aria-labelledby="myLargeModalLabel"
>
		<div class="modal-dialog modal-lg" role="document">
  		<div class="modal-content clearfix">
    			<h3 class="text-center card_title">参赛卡下载
              <span class="glyphicon glyphicon-remove pull-right returnIcon" data-dismiss="modal" aria-label="Close""></span>
          </h3>
    			<div id="img_container" class="text-center">
    			</div>

          <p class="hint_save">注：如果是手机登录请长按图片进行保存</p>
          <button class="btn btn-primary xy-icon__save" id="saveImgSpan">点击下载</button>
  		</div>
		</div>
</div>
<!-- 参赛卡图片 -->

	<!-- 参赛卡图片 -->

	<script type="text/javascript" src="/haix/Public/js/config.js"></script>
	<script>
		var page = parseInt($("#pageCount").text());

		$("#aBefore").click(() => {
			if (page == 1) {
				$.dialog({
					title: "提示",
					content: "前面已经没有了哦!",
				});

				return;
			}

			page--;
			$("#aBefore a").attr("href", `${app.serverUrl}index.php/Home/Index/index?page=${page}`);
		});
		$("#aNext").click(() => {
			if (page >= <?php echo ($card_count); ?>) {
				$.dialog({
					title: "提示",
					content: "后面已经没有了哦"
				});

				return;
			}

			page++;
			$("#aNext a").attr("href", `${app.serverUrl}index.php/Home/Index/index?page=${page}`);
		});
	</script>
</body>
</html>