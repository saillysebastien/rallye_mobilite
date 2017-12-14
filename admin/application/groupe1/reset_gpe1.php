<?php
include('../include/header.php');

if (isset($_GET['id']) && !empty(trim($_GET['id'])) && $_GET['id'] == 1) {
  $valid = true;
} else {
  $valid = false;
  array_push($errors, "Vous ne pouvez pas vider le groupe 1");
}
if ($valid) {
  $update_p1 = sprintf("UPDATE appli SET title='gpe1pg1', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='1'");
  $update1 = mysqli_query($db, $update_p1);

  $update_p2 = sprintf("UPDATE appli SET title='gpe1pg2', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='2'");
  $update2 = mysqli_query($db, $update_p2);

  $update_p3 = sprintf("UPDATE appli SET title='gpe1pg3', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='3'");
  $update3 = mysqli_query($db, $update_p3);

  $update_p4 = sprintf("UPDATE appli SET title='gpe1pg4', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='4'");
  $update4 = mysqli_query($db, $update_p4);

  $update_p5 = sprintf("UPDATE appli SET title='gpe1pg5', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='5'");
  $update5 = mysqli_query($db, $update_p5);

  $update_p6 = sprintf("UPDATE appli SET title='gpe1pg6', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='6'");
  $update6 = mysqli_query($db, $update_p6);

  $update_p7 = sprintf("UPDATE appli SET title='gpe1pg7', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='7'");
  $update7 = mysqli_query($db, $update_p7);

  $update_p8 = sprintf("UPDATE appli SET title='gpe1pg8', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='8'");
  $update8 = mysqli_query($db, $update_p8);

  $update_p9 = sprintf("UPDATE appli SET title='gpe1pg9', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='9'");
  $update9 = mysqli_query($db, $update_p9);

  if ($update1 && $update2 && $update3 && $update4 && $update5 && $update6 && $update7 && $update8 && $update9) {
    array_push($infos, "Toutes les étapes du groupe 1 ont été réinitialisées.");
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
