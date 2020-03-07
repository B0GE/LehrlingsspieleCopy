$(document).ready(function () {
  $(".dump_div").load('../fnc/login_check.php');

var popupCheck = "Ja ich bin mir wirklich sicher verdammt!";
var delete_status = false;

  $(".delete_buttons").on('click', function () {
    if (!delete_status) {
      var cur = $(this);
      cur.fadeOut(100);
      cur.parent().addClass("animate");
      setTimeout(function () {
        $(cur.parent().data("target")).addClass("show");
      });
      delete_status = true;
    }
  });

  $(".popup_button").on('click', function () {
    var cur = $(this);
    var dataTarget = cur.data("target");
    if (dataTarget.length > 0) {
      cur.parent().removeClass("show");
      $(dataTarget).addClass("show");
    } else {
      closePopup(cur);
    }
  });

  $(".ajax_button").on('click', function () {
    var cur = $(this);
    if(cur.prev().val() === popupCheck) {
      var target = cur.data("target");
      $(".dump_div_container p span").text($(this).data("success"));
      $(".dump_div").load("../fnc/reset_tables.php",  {
        target: target
      }, closePopup(cur));
    } else {
      $(this).parent().addClass("error");
      $("body").css("--delete-popup-height", "250px");
    }
  });

  function closePopup(selector) {
    selector.parent().removeClass("show error");
    $(".delete_popup").removeClass("animate");
    selector.parents().find($(".delete_buttons")).fadeIn(200);
    $("body").css("--delete-popup-height", "200px");
    delete_status = false;
  }

  $(".succes_svg").on('click', function () {
    $(".dump_div_container").removeClass("show");
  });


// create backup ajax
  $(".backup_button").on('click', function () {
    var cur = $(this);
    var backuptrue = true;
    $(".ci_error_handler").load("../fnc/create_backup.php", {
      backuptrue: backuptrue
    }, buttonToPopup(cur));
  })

  var buttonToPopup = function (selector) {
    selector.fadeOut(200);
    selector.parent().addClass("animate");
    setTimeout(function () {
      popUpToButton(selector);
    }, 5000);
  }
  var popUpToButton = function (selector) {
        selector.fadeIn(200);
        selector.parent().removeClass("animate");
        selector.parent().removeClass("error");
        selector.parent().removeClass("succes");
  }

});
