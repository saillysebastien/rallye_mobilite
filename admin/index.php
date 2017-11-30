<?php
include('server.php');
if (empty($_SESSION['username'])) {
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rallye Mobilité</title>

  <link rel ="stylesheet" href="../assets/vendor/bootstrap4/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="navbar-brand">Utilisateur : <?php if (!empty($_SESSION['username'])) {
      echo $_SESSION['username'];
    } ?></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="nav">
        <li class="nav-item">
          <a href="login.php?logout='1'" class="btn btn-outline-danger">Se déconnecter</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid">
      <div class="row justify-content-center">
          <h4>A partir de cette vous pouvez avoir accés aux modifications suivantes :<br /><br />
            - Du site web en lui même.<br/><br />
            - De la configuration de l'application pour la prochaine semaine de l'événement.</h4><br />
            - Créer un utilisateur.
        <div class="col-8 text-center" id="access_change">
          <a class="btn btn-dark" href="www/home/home.php" type="button">Accéder aux modifications du site web</a>
          <a class="btn btn-dark" href="application/questionnaire/question.php" type="button">Accéder à la configuration de l'application</a><br/><br />
        </div>
        <div class="col-8 text-center">
          <a class="btn btn-outline-info" href="register.php" type="button">Création d'un utilisateur</a>
        </div>
      </div>
    </div>
  </body>
  <script src="../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/vendor/popper/dist/umd/popper.js"></script>
  <script src="../assets/vendor/bootstrap4/dist/js/bootstrap.min.js"></script>
  <script src="../assets/js/script.js"></script>
</body>

</html>
