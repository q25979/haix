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
				<span><strong>鸽主名称：</strong>张三</span>
				<span><strong>联系电话：</strong>15184854852</span>
				<span><strong>地区：</strong>福建龙岩</span>
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

				<tr>
					<td>1</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
				<tr>
					<td>2</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
				<tr>
					<td>3</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
				<tr>
					<td>4</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
				<tr>
					<td>5</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
				<tr>
					<td>6</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
				<tr>
					<td>7</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
				<tr>
					<td>8</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
				<tr>
					<td>9</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
				<tr>
					<td>10</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
				<tr>
					<td>11</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
				<tr>
					<td>12</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
				<tr>
					<td>13</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
				<tr>
					<td>14</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
				<tr>
					<td>15</td>
					<td>1254-52-41</td>
					<td>灰</td>
					<td>A</td>
					<td>A</td>
					<td></td>
				</tr>
			</table>

			<div class="table-footer text-center clearfix">
				<span class="pull-left"><strong>鸽主签名：</strong></span>
				<span><strong>收鸽单位签章：</strong></span>
				<div class="text-left">
					<p><strong>注：此卡为观摩、参赛、领奖、领鸽凭证。盖章有效，请妥善保管。</strong></p>
					<p>
						<strong>电话：0597-82519688 传真：0754-82519689</strong>
						<strong class="pull-right">地址：广东汕头金平区蛇莲街道玉井东三温</strong>
					</p>
				</div>
			</div>
		</div>
		<!-- 表格结束 -->

		<!-- 分页 -->
		<div class="xy-page__div">
			<nav aria-label="...">
  				<ul class="pager">
    				<li><a href="#">上一张</a></li>
    				<li><a href="#">2</a></li>
    				<li><a href="#">下一张</a></li>
    				<li class="disabled"><a href="#" class="xy-page__sum">共 2 张</a></li>
    				<li
    					class="xy-float-right"
    					data-toggle="modal"
    					data-target=".bs-example-modal-lg"
    					onclick="buildImg()"
    				>
    					<a href="#">获取参赛卡</a>
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
		<div class="modal-content">
  			<h3 class="text-center card_title">参赛卡下载
  				<span
  					class="glyphicon glyphicon-save pull-right xy-icon__save"
  					aria-hidden="true"
  					id="saveImgSpan"
  				>
  				</span>
  			</h3>
  			<div id="img_container" class="text-center">
  			</div>
		</div>
		</div>
</div>
<!-- 参赛卡图片 -->

	<!-- 参赛卡图片 -->
</body>
</html>