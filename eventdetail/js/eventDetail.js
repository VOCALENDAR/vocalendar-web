//


var h = window.innerHeight ? window.innerHeight: $(window).height();

$(document).ready(function(){
  var windowHeight = window.innerHeight ? window.innerHeight: $(window).height();
  $("#eventInfoBody").css("height", windowHeight + "px");
});

$(window).resize(function () {
  var windowHeight = window.innerHeight ? window.innerHeight: $(window).height();
  $("#eventInfoBody").css("height", windowHeight + "px");
});