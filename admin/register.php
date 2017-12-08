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
  <title>Enregistrement</title>
  <link rel ="stylesheet" href="../../../assets/vendor/bootstrap4/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="container text-center">
    <div class="header">
      <h2>S'enregister</h2>
    </div>

    <form action="register.php" method="post">
      <!-- On affiche ici les différents messages -->
      <?php
      include('errors.php');
      if (isset($informations['success'])) {
        echo $informations['success'];
      }
       ?>
      <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" value="<?= htmlentities($username) ?>" />
      </div>

      <div class="form-group">
        <label for="username">Mot de passe</label>
        <input type="password" name="password_1" />
      </div>

      <div class="form-group">
        <label for="username">Confirmer mot de passe</label>
        <input type="password" name="password_2" />
      </div>
      <div class="form-group">
        <button type="submit" name="register" class="btn btn-primary">Valider</button>
      </div>
      <p>
        Déjà membre ?<a href="login.php"> Se connecter </a>
      </p>
    </form><!-- fin du formulaire -->
  </div><!-- fin du container -->
</body>
<?php include("www/include/footer.php"); ?>
