<?php
include('../include/header.php');

$errors = [];
$infos = [];

if (isset($_GET['id']) && !empty(trim($_GET['id'])) && $_GET['id'] == 1) {
  $valid = true;
} else {
  $valid = false;
  array_push($errors, "Vous ne pouvez pas vider le groupe 2");
}

if ($valid) {
  $update_p1 = sprintf("UPDATE appli SET title='gpe2pg1', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='11'");
  $update1 = mysqli_query($db, $update_p1);

  $update_p2 = sprintf("UPDATE appli SET title='gpe2pg2', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='12'");
  $update2 = mysqli_query($db, $update_p2);

  $update_p3 = sprintf("UPDATE appli SET title='gpe2pg3', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='13'");
  $update3 = mysqli_query($db, $update_p3);

  $update_p4 = sprintf("UPDATE appli SET title='gpe2pg4', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='14'");
  $update4 = mysqli_query($db, $update_p4);

  $update_p5 = sprintf("UPDATE appli SET title='gpe2pg5', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='15'");
  $update5 = mysqli_query($db, $update_p5);

  $update_p6 = sprintf("UPDATE appli SET title='gpe2pg6', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='16'");
  $update6 = mysqli_query($db, $update_p6);

  $update_p7 = sprintf("UPDATE appli SET title='gpe2pg7', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='17'");
  $update7 = mysqli_query($db, $update_p7);

  $update_p8 = sprintf("UPDATE appli SET title='gpe2pg8', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='18'");
  $update8 = mysqli_query($db, $update_p8);

  $update_p9 = sprintf("UPDATE appli SET title='gpe2pg9', name='', one='', two='', three='', four='', five='', indice='', response='', question ='', my_all='', image='' WHERE id='19'");
  $update9 = mysqli_query($db, $update_p9);

  if ($update1 && $update2 && $update3 && $update4 && $update5 && $update6 && $update7 && $update8 && $update9) {
    array_push($infos, "Toutes les étapes du groupe 2 ont été réinitialisées.");
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
