<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户编辑</title>
	<link rel="stylesheet" href="../lib/layui/css/layui.css">

	<script src="../lib/layui/layui.all.js"></script>
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/vue.min.js"></script>
	<script src="../js/config.js"></script>

	<style>
		.layui-input, .layui-textarea {width: 90%;}
		.layui-form-label {width: 100px;}
		.re-btn {position: relative; left: 20px;}
	</style>
</head>
<body>

	<form class="layui-form" style="padding: 20px" id="dataForm">
		<div class="layui-form-item">
		    <label class="layui-form-label">ID</label>
		    <div class="layui-input-block">
		      <input type="text" name="id" readonly required  lay-verify="required" autocomplete="off" class="layui-input" v-model="id" id="id" style="background: #ddd">
		    </div>
		</div>

		<div class="layui-form-item">
		    <label class="layui-form-label">鸽主名称</label>
		    <div class="layui-input-block">
		      <input type="text" name="name" required  lay-verify="required" placeholder="请输入鸽主名称" class="layui-input" v-model="name" id="name">
		    </div>
		</div>

		<div class="layui-form-item">
		    <label class="layui-form-label">联系电话</label>
		    <div class="layui-input-block">
		      <input type="tel" name="tel" required  lay-verify="required|phone" placeholder="请输入联系电话" autocomplete="off" v-model="tel" class="layui-input" id="tel">
		    </div>
		</div>

		<div class="layui-form-item">
		    <label class="layui-form-label">地区</label>
		    <div class="layui-input-block">
		      <input type="text" name="addr" required  lay-verify="required" placeholder="请输入地区" autocomplete="off" class="layui-input" v-model="addr" id="addr">
		    </div>
		</div>

		<div class="layui-form-item">
		    <label class="layui-form-label">参赛鸽足环号</label>
		    <div class="layui-input-block">
		      <input type="text" name="number" required  lay-verify="required" placeholder="请输入参赛鸽足环号" autocomplete="off" class="layui-input" v-model="number" id="number">
		    </div>
		</div>

		<div class="layui-form-item">
		    <label class="layui-form-label">羽色</label>
		    <div class="layui-input-block">
		      <input type="text" name="color" required  lay-verify="required" placeholder="请输入羽色" autocomplete="off" class="layui-input" v-model="color" id="color">
		    </div>
		</div>

		<div class="layui-form-item">
		    <label class="layui-form-label">大团体</label>
		    <div class="layui-input-block">
		      <input type="text" name="big_group" required  lay-verify="required" placeholder="请输入大团体" autocomplete="off" class="layui-input" v-model="big_group" id="big_group">
		    </div>
		</div>

		<div class="layui-form-item">
		    <label class="layui-form-label">小团体</label>
		    <div class="layui-input-block">
		      <input type="text" name="small_group" required  lay-verify="required" placeholder="请输入小团体" autocomplete="off" class="layui-input" v-model="small_group" id="small_group">
		    </div>
		</div>

		<div class="layui-form-item">
		    <label class="layui-form-label">备注</label>
		    <div class="layui-input-block">
		      <textarea name="remarks" placeholder="请输入内容" class="layui-textarea" v-model="remarks" id="remarks"></textarea>
		    </div>
		</div>

		<div class="layui-form-item re-btn">
		    <div class="layui-input-block">
			    <button class="layui-btn" lay-submit lay-filter="formDemo" @click="updataData">立即修改</button>
			    <button type="reset" class="layui-btn layui-btn-primary">清空数据</button>
		    </div>
		</div>
	</form>

	<script>
		$(function () {
			updataView();
		});

		function updataView() {
			var formView = new Vue({
				el: "#dataForm",
				data: {
					id: 0,
					name: "",
					tel: "",
					addr: "",
					number: "",
					color: "",
					big_group: "",
					small_group: "",
					remarks: ""
				},
				created: function() {
					this.getData();
				},
				methods: {
					// 设置数据
					setData(data) {
						formView.id = data.id;
						formView.name = data.name;
						formView.tel = data.tel;
						formView.addr = data.addr;
						formView.number = data.number;
						formView.color = data.color;
						formView.small_group = data.small_group;
						formView.big_group = data.big_group;
						formView.remarks = data.remarks;
					},

					getData() {
						var load = layer.load();
						$.ajax({
							url: `${app.serverUrl}admin.php/Admin/User/idGet_user_info`,
							type: "POST",
							data: {
								id: getUrlParam("id")
							},
							success: function(data) {

								layer.close(load);
								formView.setData(data[0]);
							}
						});
					},

					updataData() {
						var load = layer.load();
						$.ajax({
							url: `${app.serverUrl}admin.php/Admin/User/idUpdata_user`,
							type: "POST",
							data: {
								id: $("#id").val(),
								name: $("#name").val(),
								tel: $("#tel").val(),
								addr: $("#addr").val(),
								number: $("#number").val(),
								color: $("#color").val(),
								big_group: $("#big_group").val(),
								small_group: $("#small_group").val(),
								remarks: $("#remarks").val()
							},
							complete: function(data) {
								parent.location.reload();
							}
						});
					},
				}
			});
		}

		// js获取get参数
		function getUrlParam(name) {
			var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
            var r = window.location.search.substr(1).match(reg);  //匹配目标参数
            if (r != null) return unescape(r[2]); return null; //返回参数值
		}
	</script>
</body>
</html>