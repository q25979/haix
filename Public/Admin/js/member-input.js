var add_tr =
`
<tr>
	<td><input readonly class="form-control text-center" name="NO" size="3" value="1" /></td>
	<td><input type="text" class="form-control"></td>
	<td><input type="text" class="form-control"></td>
	<td><input type="text" class="form-control"></td>
	<td><input type="text" class="form-control"></td>
	<td><textarea class="form-control" rows="1"></textarea></td>
	<td>
		<a href="#" title="删除" class="card-del__btn" onClick="deltr(this)">
		    <span class="glyphicon glyphicon-trash"></span>
	    </a>
	    <a href="#" title="更新">
	        <span class="glyphicon glyphicon-refresh"></span>
	    </a>
	</td>
</tr>
`
;

$(function () {
	var show_count = 500;   //要显示的条数
	var count = 1;    //递增的开始值，这里是你的ID

	// 添加列
	$("#btn_addtr").click(function () {

		var length = $("#dynamicTable tbody tr").length;
		// alert(length);

		if (length < show_count)    //点击时候，如果当前的数字小于递增结束的条件
		{
			$(add_tr).appendTo("#dynamicTable tbody");
			changeIndex();	//更新行号
		}
	});

	// 清空数据按钮
	$("#clearDataBtn").click(function () {
		listDel(function () {
			allDelTr();
		});
	});


});

function changeIndex() {
	var i = 1;

	$("#dynamicTable tbody tr").each(function () { //循环tab tbody下的tr
		$(this).find("input[name='NO']").val(i++);//更新行号
	});
}

function deltr(opp) {

	$(opp).parent().parent().remove();//移除当前行
	changeIndex();
}

/**
 * 数据全部删除
 */
function allDelTr() {
	var length = $("#dynamicTable tbody tr").length;

	$("#dynamicTable tbody tr").each(function () {
		$(this).remove();
	});
}
