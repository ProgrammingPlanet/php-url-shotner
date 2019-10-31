/* Menu Toggle Script */
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});

/* setting height of #content div */
var remainheight = $('#page-content-wrapper').height() - $('#topnavbar').height();

$('#content').css({"maxHeight":remainheight - 18});