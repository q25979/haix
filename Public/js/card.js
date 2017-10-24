$(function () {
	buildImg();
});

function buildImg() {
	html2canvas($("#xy-table"), {

		onrendered: function(canvas) {
			console.log(canvas);
			// document.body.appendChild(canvas);

			// 给画布添加 class
			$("#img_container canvas").addClass("xy-te");
			document.getElementById("img_container").appendChild(canvas);
		},
	});
}