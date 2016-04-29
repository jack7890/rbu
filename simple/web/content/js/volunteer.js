$(function() {
    $('#top-apply-button').click(function() {
      $('html, body').animate({
          scrollTop: $("#application").offset().top
      }, 400);
      return false;
    });
});