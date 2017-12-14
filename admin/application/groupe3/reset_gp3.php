<?php
include('../include/header.php');

if (isset($_GET['id']) && !empty(trim($_GET['id'])) && $_GET['id'] == 1) {
  $valid = true;
} else {
  $valid = false;
  array_push($errors, "Vous ne pouvez pas vider le groupe 3");
}
if ($valid) {
  $update_p1 = sprintf("UPDATE appli SET title='gpe3pg1', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='21'");
  $update1 = mysqli_query($db, $update_p1);

  $update_p2 = sprintf("UPDATE appli SET title='gpe3pg2', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='22'");
  $update2 = mysqli_query($db, $update_p2);

  $update_p3 = sprintf("UPDATE appli SET title='gpe3pg3', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='23'");
  $update3 = mysqli_query($db, $update_p3);

  $update_p4 = sprintf("UPDATE appli SET title='gpe3pg4', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='24'");
  $update4 = mysqli_query($db, $update_p4);

  $update_p5 = sprintf("UPDATE appli SET title='gpe3pg5', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='25'");
  $update5 = mysqli_query($db, $update_p5);

  $update_p6 = sprintf("UPDATE appli SET title='gpe3pg6', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='26'");
  $update6 = mysqli_query($db, $update_p6);

  $update_p7 = sprintf("UPDATE appli SET title='gpe3pg7', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='27'");
  $update7 = mysqli_query($db, $update_p7);

  $update_p8 = sprintf("UPDATE appli SET title='gpe3pg8', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='28'");
  $update8 = mysqli_query($db, $update_p8);

  $update_p9 = sprintf("UPDATE appli SET title='gpe3pg9', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='29'");
  $update9 = mysqli_query($db, $update_p9);

  if ($update1 && $update2 && $update3 && $update4 && $update5 && $update6 && $update7 && $update8 && $update9) {
    array_push($infos, "Toutes les étapes du groupe 3 ont été réinitialisées.");
  }
}
?>
<div class="container text-center">
  <?php
  include("../../errors.php");
  include("../../infos.php");
   ?>
  </div>
</div>
<?php include('../include/footer.php');?>
