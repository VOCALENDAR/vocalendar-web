var $ = jQuery;
var calid1 = '0mprpb041vjq02lk80vtu6ajgo@group.calendar.google.com';
var calid2 = '5fsoru1dfaga56mcleu5mp76kk@group.calendar.google.com';
var visibleCal = 'vcl01';
var vcount1 = 0;
var vcount2 = 0;

$(function() {
  $.ajax({
    dataType : "jsonp",
    url: 'https://www.google.com/calendar/feeds/'+calid1+'/public/full?alt=json-in-script&max-results=1',
    success: function(data) {
      vcount1 = data.feed.openSearch$totalResults.$t;
      //$('#item-num').text(data.feed.openSearch$totalResults.$t);
		  $.ajax({
		    dataType : "jsonp",
		    url: 'https://www.google.com/calendar/feeds/'+calid2+'/public/full?alt=json-in-script&max-results=1',
		    success: function(data) {
		      vcount2 = data.feed.openSearch$totalResults.$t;
		      $('#item-num').text(vcount1+vcount2);
		    }
		  });
    }
  });
  
	function resizeContainer(e) {
		// 要素の横幅を常に100%
		var containerWidth = $(window).width();
		//$("#bodyContainer").css("width",containerWidth);
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
	
	// デフォルトカレンダーを起動時に表示
	$(window).load(function(){
		//$("#VCLcontainer iframe." + visibleCal ).fadeIn(250);
		//$("#VCLcounter").fadeIn(500);
	});
	
});

function switchCal (num) {
	$("#VCLcontainer iframe." + visibleCal ).fadeOut(250, function(){
		$("#VCLcontainer iframe." + num ).fadeIn(250);
	});
	visibleCal = num;
}