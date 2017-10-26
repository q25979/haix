/**
 * 添加输入列
 */
function addCardLi() {
	var count = $("#input-table tbody tr").length;

	var tr =
	`
		<tr>
			<td>${count}</td>
			<td><input type="text" class="form-control" /></td>
			<td><input type="text" class="form-control" /></td>
			<td><input type="text" class="form-control" /></td>
			<td><input type="text" class="form-control" /></td>
			<td><textarea class="form-control" rows="1"></textarea></td>
			<td>
				<a href="#" title="删除" class="card-del__btn">
					<span class="glyphicon glyphicon-trash"></span>
				</a>
				<a href="#" title="更新">
                    <span class="glyphicon glyphicon-refresh"></span>
                </a>
			</td>
		</tr>
	`;

	$("#input-table tbody").append(tr);
	delCardLi();
}

/**
 * 删除单个列
 * @return {[type]} [description]
 */
function delCardLi() {
	$(".card-del__btn").each((index) => {

		$($(".card-del__btn")[index]).click(() => {
			console.log(index);
			$($("#input-table tbody tr")[index+1]).remove();
		});
	});
}