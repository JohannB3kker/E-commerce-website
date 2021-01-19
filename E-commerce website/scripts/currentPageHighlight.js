// changes colour of current page's link
$(function(){
  $('a').each(function() {
    if ($(this).prop('href') == window.location.href) {
      $(this).addClass('currentHighlight');
    }
  });
});