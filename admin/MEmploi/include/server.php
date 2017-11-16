<?php

if (empty($_SESSION['username'])) {
  session_start();
}
// Connexion à la base de données
include('../config/connect.php');

$username = '';
$errors = [];
$informations = [];

//Si le bouton Valider dans register.php est cliqué
if (isset($_POST['register'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  $username = htmlentities($username);
  $password_1 = htmlentities($password_1);
  $password_2 = htmlentities($password_2);

  // On vérifie si certains champs ne sont pas vides et que les 2 mots de passes soient identiques
  if (empty($username)) {
    array_push($errors, "Nom d'utilisateur requis");
  }
  if (empty($password_1)) {
    array_push($errors, "Mot de passe requis");
  }
  if ($password_1 != $password_2) {
    array_push($errors, "Les 2 mots de passe sont différents");
  }

  // Si il n'y a pas d'erreur on enregistre dans la base de données
  if (count($errors) == 0) {
    // On hash le mot de passe pour raison de sécurité
    $password = password_hash($password_1, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    mysqli_query($db, $sql);
    $informations['success'] = "<div class='alert alert-success'>Vous êtes bien enregistré il ne vous reste plus qu'à vous connecter<div>";
    header('location: ../../login.php');
  }
}

// pour le login
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $username = htmlentities($username);
  $password = htmlentities($password);
  // On vérifie si certains champs ne sont pas vides et que les 2 mots de passes soient identiques
  if (empty($username)) {
    array_push($errors, "Nom d'utilisateur requis");
  }
  if (empty($password)) {
    array_push($errors, "Mot de passe requis");
  }

  if (count($errors) == 0) {

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($db, $query);
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
      $_SESSION["username"] = $username;
      header('location: MEmploi/questionnaire/question.php');
    } else {
      array_push($errors, "Nom d'utilisateur ou de passe incorrect");
    }
  }
}

// pour la déconnexion
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header('Location: ../../login.php');
}
?>
