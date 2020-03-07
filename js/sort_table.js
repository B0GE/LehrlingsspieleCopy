$(document).ready(function () {

//LOAD RESULTS
  $(".table").load("fnc/table_querry.php");
/*
  setInterval(function () {
      $(".table").load("fnc/table_querry.php");
  }, 5000);
*/
// LOAD RECENT GAMES
  $(".recent_games_container").load("fnc/recent_games.php", test());
/*
  setInterval(function () {
    $(".recent_games_container").load("fnc/recent_games.php", test());
  }, 5000);

/*
  function removeEmptys() {
    setTimeout(function () {
      $(".recent_games").each(function () {
        var cur = $(this);
        if(cur.text() === "") {
          cur.remove();
        }
      });
      test();
    }, 100);
  }
*/

  function test() {
    setTimeout(function () {
      $(".recent_games_container").each(function(){
      $(this).html($(this).children('div').sort(function(a, b){
          return ($(b).data('id').replace(":", '')) > ($(a).data('id').replace("/", '')) ? 1 : -1;
      }));
    }, 200);

});
  }






});
