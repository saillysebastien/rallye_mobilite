<?php
include('server.php');
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
  <link rel="stylesheet" href="../../../assets/css/style.css" />
  <link rel="stylesheet" href="../../../assets/css/responsive.css" />
  <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
</head>
<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Accueil</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse  justify-content-center" id="navbarNavDropdown">

        <ul class="nav nav-pills">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../home/home.php" role="button" aria-haspopup="true" aria-expanded="false">Page d'accueil</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../home/home.php">Liste des photos</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../home/create_caroussel.php">Création d'une photo</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../entreprises/enterprises.php" role="button" aria-haspopup="true" aria-expanded="false">Page Entreprise</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../entreprises/enterprises.php">Liste des entreprises</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../entreprises/create_enterprises.php">Création d'une entreprise</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../formations/formations.php" role="button" aria-haspopup="true" aria-expanded="false">Page Formation</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../formations/formations.php">Liste des formations</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../formations/create_formations.php">Création d'une formation</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../questionnaire/question.php" role="button" aria-haspopup="true" aria-expanded="false">Page Application</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../questionnaire/question.php">Liste des questionnaires</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../questionnaire/create_rebus.php">Créer un rébus</a>
              <a class="dropdown-item" href="../questionnaire/create_quizz.php">Créer un quizz</a>
              <a class="dropdown-item" href="../questionnaire/create_who.php">Créer un quizz Qui est-ce?</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../contact/contact.php" role="button" aria-haspopup="true" aria-expanded="false">Page Contact</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../contact/contact.php">Liste des contacts</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../contact/create_contact.php">Création d'un contact</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../upload/images.php" role="button" aria-haspopup="true" aria-expanded="false">Page Images</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../upload/images.php">Liste des images</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../upload/create_upload.php">Création d'une image</a>
            </div>
          </li>

        </ul>
      </div>
    </nav>


    <div class="separate" style="margin-top: 70px;">

    </div>
  </div>