$(function () {

	// 批量删除
	$("#selectDel").click(() => {
		listDel();
	});

	// 单个删除
	$(".list-td>a:nth-child(3)").click(() => {
		listDel();
	});
});

/**
 * 删除数据
 */
function listDel() {
	$.confirm({
		title: "确认删除",
		content: "删除后数据不可恢复,是否继续",
		confirmButton: "是",
		cancelButton: "否",
		confirmButtonClass: 'btn-info',
		cancelButtonClass: 'btn-danger',
		confirm: function() {},
		cancel: function() {}
	});
}