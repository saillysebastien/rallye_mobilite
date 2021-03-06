<?php
include('../../server.php');
if (empty($_SESSION['username'])) {
  header('location: ../../login.php');
}

$errors = [];
$infos = [];
$activity = '';
$adresse = '';
$city = '';
$contact = '';
$director = '';
$domain_activity = '';
$done = false;
$image = '';
$mail = '';
$name = "";
$number_street = null;
$phone = null;
$postal_code = null;
$president = '';
$street = '';
$text = '';
$text1 = '';
$text2 = '';
$text3 = '';
$text4 = '';
$text5 = '';
$title = '';
$valid = true;
$vice_director = '';
$web = '';

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
  <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="#"><?php if (!empty($_SESSION['username'])) {
        echo $_SESSION['username'];
      } ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse  justify-content-center" id="navbarNavDropdown">

        <ul class="nav nav-pills">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../home/home.php" role="button" aria-haspopup="true" aria-expanded="false" title="Gérer la rubrique Accueil">Accueil</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../home/home.php">Liste des photos</a>
              <a class="dropdown-item" href="../home/create_caroussel.php">Création d'une photo</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../home/goal.php">Liste des objectifs</a>
              <a class="dropdown-item" href="../home/create_goal.php">Création d'un objectif</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../home/explication.php">Liste des explications</a>
              <a class="dropdown-item" href="../home/create_explication.php">Création d'une explication</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../entreprises/enterprises.php" role="button" aria-haspopup="true" aria-expanded="false" title="Gérer la rubrique Entreprise">Entreprise</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../entreprises/enterprises.php">Liste des entreprises</a>
              <a class="dropdown-item" href="../entreprises/create_enterprises.php">Création d'une entreprise</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../entreprises/button_enterprise.php" title="Montrer ou cacher certains domaines d'activités">Gestion des boutons</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../formations/formations.php" role="button" aria-haspopup="true" aria-expanded="false" title="Gérer la rubrique formation">Formation</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../formations/formations.php">Liste des formations</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../formations/create_formations.php">Création d'une formation</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../mobility/mobility.php" role="button" aria-haspopup="true" aria-expanded="false" title="Gérer la rubrique Mobilité">Mobilité</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../mobility/mobility.php">Liste des moyens de transport</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../mobility/create_mobility.php">Création d'un moyen de transport</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../application/explication_appli.php" role="button" aria-haspopup="true" aria-expanded="false" title="Gérer la rubrique Mobilité">Application</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../application/explication_appli.php">Liste des explications pour la rubrique application</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../application/create_explication_appli.php">Création d'une explication</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../contact/contact.php" role="button" aria-haspopup="true" aria-expanded="false" title="Gérer la rubrique Contact">Contact</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../contact/contact.php">Liste des contacts</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../contact/create_contact.php">Création d'un contact</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../upload/images.php" role="button" aria-haspopup="true" aria-expanded="false" title="Gérer les autres images importées">Images</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../upload/images.php">Liste des images</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../upload/create_upload.php">Création d'une image</a>
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


    <div class="separate"></div>
