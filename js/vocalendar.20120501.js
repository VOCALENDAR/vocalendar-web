var $ = jQuery;
var calid = '0mprpb041vjq02lk80vtu6ajgo@group.calendar.google.com';

$(function() {
  $.ajax({
    dataType : "jsonp",
    url: 'https://www.google.com/calendar/feeds/'+calid+'/public/full?alt=json-in-script&max-results=1',
    success: function(data) {
      $('#item-num').text(data.feed.openSearch$totalResults.$t);
    }
  });
  
	function resizeContainer(e) {
		// 要素の横幅を常に100%
		var containerWidth = $(window).width();
		$("#bodyContainer").css("width",containerWidth);
		$("#VCLnavi").css("width",containerWidth);
	}
  $(window).bind("resize", resizeContainer);
  resizeContainer();
  
  $(window).scroll(function(){
		// ナビゲーションに影を落とす
		var scrollposition = $(window).scrollTop();
		if ( scrollposition > 0 ) {
			$("#VCLnavi").addClass('shadow');
		}
		if ( scrollposition == 0 ) {
			$("#VCLnavi").removeClass('shadow');
		}
  });
  
});