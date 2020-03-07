$(document).ready(function () {

// declare data value variables
var gamemode = $(".gamemode span").data("value");
var winnerteam = $(".winnerteam span").data("value");
var looserteam = $(".looserteam span").data("value");
var didntcome = $(".didntcome span").data("value");

// highlight  active dropdowns
  $(".active_value").on('click', function () {
    var cur = $(this);
    var parent = cur.parent();
    var ulHeight = cur.next().height();
    if(parent.data("dropdown") == 1) {
        parent.animate({
          height: 50+ulHeight
        }, 300);
        cur.addClass("highlight");
        parent.data("dropdown", "0");
      } else {
        parent.animate({
          height: 50
        }, 300);
        cur.removeClass("highlight");
        parent.data("dropdown", "1");
      }
  });

//get and set clicked value
  $(document).on('click', '.p_dropdown ul li', function () {
    var dataValue = $(this).data("value");
    var dataText = $(this).text();
    var parent = $(this).parent().parent();
    parent.animate({
      height: 50
    }, 300);
    parent.data("dropdown", "1");
    var selSpan = $(this).parent().prev().find("span");
    selSpan.attr("data-value", dataValue);
    selSpan.text(dataText);
    getValues();
  });

//remove class on error/succes message
  $(".ci_submit svg").on('click', function () {
    removePointsClasses();
  });

// add_points ajax gedöns
  $('.add_points').submit(function(event) {
    event.preventDefault();
    if (gamemode.length == 0) {
      $(".ci_submit").addClass("error");
      animateButton();
      setTimeout(function() {
        removePointsClasses();
      }, 5000);
    } else {
      console.log(gamemode);
      $(".ci_error_handler").load("../fnc/add_points.php", {
        gamemode: gamemode,
        winnerteam: winnerteam,
        looserteam: looserteam,
        didntcome: didntcome
      }, animateButton());
    }
  });

// remove classes from ci_submit
  function removePointsClasses() {
    $(".ci_submit").removeClass("animate");
    $(".ci_submit").removeClass("error");
    $(".ci_submit").removeClass("succes");
    $(".ci_submit button").fadeIn(200);
    removeTextFromDropdown();
  }

  function removeTextFromDropdown() {
    $(".p_dropdown .active_value span").text("");
  }
// animate ci_submit
  function animateButton() {
    $(".ci_submit button").fadeOut(200);
    $(".ci_submit").addClass("animate");
    setTimeout(function () {
      removePointsClasses();
    }, 5000);
  }

//get span values
  function getValues() {
    gamemode = $(".gamemode span").attr("data-value");
    winnerteam = $(".winnerteam span").attr("data-value");
    looserteam = $(".looserteam span").attr("data-value");
    didntcome = $(".didntcome span").attr("data-value");
  }

// update teams
  $(document).on('click', '.spielmodi ul li', function () {
    var spielmodus = $(this).data("value");
    console.log(spielmodus);
    $(".p_dropdown:not(.spielmodi)").find("ul").load("../fnc/points_array.php", {
      spielmodus: spielmodus
    });
  })

  function updateUlHeight() {
    var ulHeight = $(".p_dropdown:not(.spielmodi)").find("ul").height();
    $(".p_dropdown:not(.spielmodi)").find("ul").animate({
      height: 50+ulHeight
    })
  }


});
