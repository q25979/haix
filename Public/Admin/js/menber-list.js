$(function () {

	// 批量删除
	$("#selectDel").click(() => {
		listDel();
	});

	// 单个删除
	$(".list-td>a:nth-child(3)").click(() => {
		listDel();
	});

	updataView();
});

/**
 * 删除数据
 * confirm 传一个确认的方法
 */
function listDel(confirmFn) {
	$.confirm({
		title: "确认删除",
		content: "删除后数据不可恢复,是否继续",
		confirmButton: "是",
		cancelButton: "否",
		confirmButtonClass: 'btn-info',
		cancelButtonClass: 'btn-danger',
		confirm: function() {
			confirmFn();
		},
		cancel: function() {}
	});
}

/**
 * 更新视图
 */
function updataView() {
	var userTable = new Vue({
		el: "#userTable",
		data: {
			listTable: [],
			curr: 0
		},
		created: function() {
			var that = this;
			layer.load();

			$.ajax({
                url: `${app.serverUrl}admin.php/Admin/User`,
                success: function(data) {
                    that.userPage(data);
                }
			});
		},
		methods: {
			// 获取用户信息
			getUserInfo(curr) {
				var load = layer.load();

				$.ajax({
                    url: `${app.serverUrl}admin.php/Admin/User/get_user_info`,
                    type: "POST",
                    data: {
                        "page": curr
                    },
                    success: function(data) {

                    	layer.closeAll('loading');
                    	// console.log(data);

                    	// 设置数据
                        userTable.listTable = data.data;
                        userTable.mostSelect();

                        // 初始化化都是不选
                        $("#userTable :checkbox").prop("checked", false);
                        // 设置总数据
                        $("#sumData").text(`共有 ${data.count} 条数据`);
                    },
                    error: function() {
                    	console.log('error!');
                    }
                });
			},

			// 用户分页
			userPage(count) {
				layui.use(['laypage', 'layer'], function() {
                    var laypage = layui.laypage,
                        layer = layui.layer;

                    laypage.render({
                        elem: 'userPage',
                        count: count,
                        jump: function(obj) {

                            userTable.getUserInfo(obj.curr);
                            userTable.curr = obj.curr-1;
                        }
                    });
                });
			},

			// 批量删除
			mostSelect() {
				$("#allSelect").click(() => {
					// 全选与全不选
					if ($("#allSelect").prop("checked")) {
						$("#userTable :checkbox").prop("checked", true);
					} else {
						$("#userTable :checkbox").prop("checked", false);
					}
				});
			},

			// 打开新窗口
			openWindow(id) {
				// x_admin_show('修改用户信息', 'member-edit.php?id=' + id);
				var w = ($(window).width()*0.9);;
				var h = ($(window).height() - 50);

				var editWindow = layer.open({
			        type: 2,
			        area: [w+'px', h +'px'],
			        fix: false, //不固定
			        maxmin: true,
			        shadeClose: true,
			        offset: '10px',
			        shade:0.4,
			        title: "修改用户信息",
			        content: 'member-edit.php?id=' + id
			    });

			    layer.full(editWindow);
			},

			// 删除
			delMember(id) {
				$.confirm({
					title: "确认删除",
					content: "删除后数据不可恢复,是否继续",
					confirmButton: "是",
					cancelButton: "否",
					confirmButtonClass: 'btn-info',
					cancelButtonClass: 'btn-danger',
					confirm: function() {
						console.log(id);
					},
					cancel: function() {}
				});
			}
		}
	});
}
