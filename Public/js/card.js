var imgCount = 0;

/**
 * 生成表格图片
 */
function buildImg() {
	if (imgCount != 0) return;

	html2canvas($("#xy-table"), {

		onrendered: function(canvas) {

			// 给画布添加 class
			document.getElementById("img_container").appendChild(canvas);

			// 弹出对话框保存图片
			$("#saveImgSpan").click(function () {
				saveImg(canvas);
			});

			// 计数器
			imgCount++;
		},
	});
}

/**
 * 点击保存图片
 */
function saveImg(canvas) {
	$.confirm({
		title: "保存图片",
		content: "是否把图片保存到本地？",
		confirmButtonClass: 'btn-info',
    	cancelButtonClass: 'btn-danger',
    	confirmButton: '是',
    	cancelButton: '否',
		confirm: function() {
			buildPath(canvas);
		},
		cancel: function() {
		}
	});
}

/**
 * 生成图片名字
 */
function buildPath(canvas) {
	var type = "png";
	var imgData = canvas.toDataURL(type);

	var _fixType = function(type) {
		type = type.toLowerCase().replace(/jpg/i, "jpeg");
		var r = type.match(/png|jpeg|bmp|gif/)[0];
		return 'image/' + r;
	}

	// 加工image data，替换mime type
	imgData = imgData.replace(_fixType(type),'image/octet-stream');

	/**
	 * 在本地进行文件保存
	 * @param  {String} data     要保存到本地的图片数据
	 * @param  {String} filename 文件名
	 */
	var saveFile = function(data, filename){
	    var save_link = document.createElementNS('http://www.w3.org/1999/xhtml', 'a');
	    save_link.href = data;
	    save_link.download = filename;

	    var event = document.createEvent('MouseEvents');
	    event.initMouseEvent('click', true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
	    save_link.dispatchEvent(event);
	};

	console.log(imgData);
	// 下载后的问题名
	var filename = 'cards_' + (new Date()).getTime() + '.' + type;
	// download
	saveFile(imgData,filename);

	console.log(filename);
}