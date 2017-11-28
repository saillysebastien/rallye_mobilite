<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Connexion</title>
  <link rel ="stylesheet" href="../../../assets/vendor/bootstrap4/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="container text-center">
    <div class="header">
      <h2>Se connecter</h2>
    </div>
    <form action="login.php" method="post">
      <?php if (isset($informations['success'])) {
        echo $informations['success'];
      }
      // On affiche ici les erreurs possibles
      include('errors.php');
      ?>
      <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" value="<?= htmlentities($username);?>" />
      </div>

      <div class="form-group">
        <label for="username">Mot de passe</label>
        <input type="password" name="password"  />
      </div>

      <div class="form-group">
        <button type="submit" name="login" class="btn btn-primary">Valider</button>
      </div>
    </form>
  </div>
</body>
<?php include("www/include/footer.php"); ?>
