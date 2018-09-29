$(function(){
floatBox("#VCLnavi");
// floatBox("#asideFixedBox", 1);

//ele=固定する要素、flag=サイドバーに固定する要素があり、フッターにかぶらないようにする場合に「1」を指定
function floatBox(ele, flag) {
	//固定する要素を取得
	var box = $(ele);
	//固定する要素の位置を取得
	var fixed_box_offset = box.offset();
	//固定する要素のサイズを取得
	var box_size = {"width": box.width(), "height":  box.height()};
	//フッター要素の位置を取得
	var footer_box_offset = $("#footer").offset();
	//スクロールイベントが発生したら実行
	$(window).scroll(function() {
		//スクロール位置を取得
		var scroll_val = $(this).scrollTop();
		//固定する要素の位置よりスクロール位置が大きくなれば...
		if(scroll_val > fixed_box_offset.top) {
			//固定する要素にtop:0が指定されていなければ...
			if(box.css("bottom") != 0) {
				//スタイルを追加
				box.css({
					"position": "fixed",
					"z-index": 999,
					"width": box_size.width,
					"height": box_size.height,
					"bottom": 0,
					"bottom": "auto"
				});
			}
			//フッターがあり、横メニューがかぶらないようにする場合は...
			if(flag == 1) {
				//フッターの位置よりスクロール位置が大きくなれば...
				if(scroll_val > (footer_box_offset.top - box_size.height)) {
					//スタイルを追加
					if(box.css("bottom") != 0) {
						box.css({
							"position": "absolute",
							"z-index": 999,
							"width": box_size.width,
							"height": box_size.height,
							"top": "auto",
							"bottom": 0
						});
					}
				}
			}
		//固定する要素の位置よりスクロール位置が小さければ...
		} else {
			//固定する要素のstyle属性を削除
			box.removeAttr("style");
		}
	});
}
});