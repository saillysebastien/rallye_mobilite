<?php
include('../../server.php');
if (empty($_SESSION['username'])) {
  header('location: ../../login.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rallye Mobilité</title>

  <link rel ="stylesheet" href="../../../assets/vendor/bootstrap4/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../css/style.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <div class="navbar-brand">Gestion Application par <?php if (!empty($_SESSION['username'])) {
        echo $_SESSION['username'];
      } ?></div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-center">
        <ul class="nav nav-pills">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../questionnaire/question.php" role="button" aria-haspopup="true" aria-expanded="false">Questionnaires</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../questionnaire/question.php">Liste</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../questionnaire/create_rebus.php">Créer un rébus</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../questionnaire/create_quizz.php">Créer un quizz</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../questionnaire/create_who.php">Créer un quizz Qui est-ce?</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../questionnaire/question.php" role="button" aria-haspopup="true" aria-expanded="false">Appli Groupe 1</a>
            <div class="dropdown-menu">
              <a class="dropdown-item text-center" href="../groupe1/steps1.php">Etape 1</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe1/steps2.php">Etape 2</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe1/steps3.php">Etape 3</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe1/steps4.php">Etape 4</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe1/steps5.php">Etape 5</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe1/steps6.php">Etape 6</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe1/steps7.php">Etape 7</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe1/steps8.php">Etape 8</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe1/steps9.php">Etape 9</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe1/end.php">Fin du rallye</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../questionnaire/question.php" role="button" aria-haspopup="true" aria-expanded="false">Appli Groupe 2</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../groupe2/steps1.php">Etape 1</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../groupe2/steps2.php">Etape 2</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../groupe2/steps3.php">Etape 3</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../groupe2/steps4.php">Etape 4</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../groupe2/steps5.php">Etape 5</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../groupe2/steps6.php">Etape 6</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../groupe2/steps7.php">Etape 7</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../groupe2/steps8.php">Etape 8</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../groupe2/steps9.php">Etape 9</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../groupe2/end.php">Fin du rallye</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../questionnaire/question.php" role="button" aria-haspopup="true" aria-expanded="false">Appli Groupe 3</a>
            <div class="dropdown-menu">
              <a class="dropdown-item text-center" href="../groupe3/steps1.php">Etape 1</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe3/steps2.php">Etape 2</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe3/steps3.php">Etape 3</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe3/steps4.php">Etape 4</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe3/steps5.php">Etape 5</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe3/steps6.php">Etape 6</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe3/steps7.php">Etape 7</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe3/steps8.php">Etape 8</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe3/steps9.php">Etape 9</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-center" href="../groupe3/end.php">Fin du rallye</a>
            </div>
          </li>
        </ul>
      </div>

      <div id="end_head_app"class="collapse navbar-collapse justify-content-end">
        <ul class="nav">
          <li class="nav-item">
            <a href="../../index.php" class="btn btn-outline-info" title="Choix entre site web et application">Accueil</a>
            <a href="../../login.php?logout='1'" class="btn btn-outline-danger" title="Déconnexion">Se déconnecter</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="separate" style="margin-top: 70px;">
    </div>
