window.addEventListener('load',function () {
  setTimeout(function () {
    document.getElementById('loader_container').className += "hide";
  }, 300);
});
$(document).ready(function () {
  var menuStatus = true;
  $(".menu-button").click(function () {
    $(this).toggleClass("changeColor");
    if (menuStatus) {
      $("nav").css("top", "0");
      $('body').addClass('overflow');
      menuStatus = false;
    } else {
      $("nav").css("top", "100%");
      $('body').removeClass('overflow');
      menuStatus = true;
    }
  });
});
