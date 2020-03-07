$(document).ready(function () {
  $(".ci_submit svg")
var ciSubmitStatus = false;
  /*
    var empty = $(".register_teams").find("input").filter(function() {
      return this.value === "";
    });
  */

  $(".succes_svg, .error_svg").stop().click(function () {
    removeTeamClasses();
  });
  function removeTeamClasses() {
    $(".ci_submit").removeClass("animate");
    $(".ci_submit").removeClass("error");
    $(".ci_submit").removeClass("succes");
    $(".ci_submit button").fadeIn(200);
  }

  function addAnimate(selector) {
    selector.addClass("animate");
  }
  function removeAnimate(selector) {
    selector.removeClass("animate");
  }

    $('.register_teams').submit(function (event) {
    event.preventDefault();
    var teamnamen = $(".ci_teamname").val();
    var memberOnen = $(".memberOne").val();
    var memberTwon = $(".memberTwo").val();
    var memberThreen = $(".memberThree").val();
    var memberFourn = $(".memberFour").val();
    $(".ci_error_handler").load("../fnc/add_tean_fnc.php", {
      teamname: teamnamen,
      memberOne: memberOnen,
      memberTwo: memberTwon,
      memberThree: memberThreen,
      memberFour: memberFourn
    }, animateButton());

    function animateButton() {
      $(".ci_submit button").fadeOut(200);
      addAnimate($(".ci_submit"));
      setTimeout(function () {
        removeTeamClasses();
      }, 5000);
    }
  });

});
