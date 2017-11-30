// entreprises
$("#filter_bâtiment").click(function() {
  $("#no_selected").css("display", "none");
  $("#commerce").css("display", "none");
  $("#industrie").css("display", "none");
  $("#logistique").css("display", "none");
  $("#restauration").css("display", "none");
  $("#travaux_publics").css("display", "none");
  $("#bâtiment").show();
})

$("#filter_commerce").click(function() {
  $("#no_selected").css("display", "none");
  $("#bâtiment").css("display", "none");
  $("#industrie").css("display", "none");
  $("#logistique").css("display", "none");
  $("#restauration").css("display", "none");
  $("#travaux_publics").css("display", "none");
  $("#commerce").show();
})

$("#filter_industrie").click(function() {
  $("#no_selected").css("display", "none");
  $("#bâtiment").css("display", "none");
  $("#commerce").css("display", "none");
  $("#logistique").css("display", "none");
  $("#restauration").css("display", "none");
  $("#travaux_publics").css("display", "none");
  $("#industrie").show();
})

$("#filter_logistique").click(function() {
  $("#no_selected").css("display", "none");
  $("#bâtiment").css("display", "none");
  $("#commerce").css("display", "none");
  $("#industrie").css("display", "none");
  $("#restauration").css("display", "none");
  $("#travaux_publics").css("display", "none");
  $("#logistique").show();
})

$("#filter_restauration").click(function() {
  $("#no_selected").css("display", "none");
  $("#bâtiment").css("display", "none");
  $("#commerce").css("display", "none");
  $("#industrie").css("display", "none");
  $("#logistique").css("display", "none");
  $("#travaux_publics").css("display", "none");
  $("#restauration").show();
})

$("#filter_travaux_publics").click(function() {
  $("#no_selected").css("display", "none");
  $("#bâtiment").css("display", "none");
  $("#commerce").css("display", "none");
  $("#industrie").css("display", "none");
  $("#logistique").css("display", "none");
  $("#restauration").css("display", "none");
  $("#travaux_publics").show();
})
