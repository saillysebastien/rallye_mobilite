<!-- pour acceder a la page  -->

<?php
if (empty($_SESSION['username'])) {
  header('location: login.php');
}
?>

<?php if (isset($_SESSION["username"])): ?>
  <p>Welcome</p>
  <p><a href="index.php?logout='1'">Logout<a></p>
<?php endif; ?>
