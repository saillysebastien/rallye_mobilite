<?php

include('../include/header.php');


$title = '';
$number_street = null;
$street = '';
$postal_code = null;
$city = '';
$activity = '';
$domain_activity = '';
$contact = '';
$phone = null;
$mail = '';
$web = '';
$done = false;

?>

<div class="container-fluid">

<legend>Creation d'une fiche entreprise</legend>
  <form action="upload.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label class="col-2" for="title">Nom de l'entreprise</label>
      <input class="col-4" type="text" name="title" value="<?= htmlentities($title) ?>" required />
    </div>

    <div class="form-group">
      <label class="col-2" for="number_street">Numéro de l'adresse</label>
      <input class="col-4" type="numeric" name="number_street" value="<?= htmlentities($number_street) ?>" />
    </div>

    <div class="form-group">
      <label class="col-2" for="street">Adresse de l'entreprise</label>
      <input class="col-4" type="text" name="street" value="<?= htmlentities($street) ?>" placeholder="exemple: avenue Jean Jaurès"required />
    </div>

    <div class="form-group">
      <label class="col-2" for="postal_code">Code postal de la ville</label>
      <input class="col-4" type="numeric" name="postal_code" value="<?= htmlentities($postal_code) ?>" required />
    </div>

    <div class="form-group">
      <label class="col-2" for="city">Ville de l'entreprise</label>
      <input class="col-4" type="text" name="city" value="<?= htmlentities($city) ?>" required />
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label class="col-4" for="activity">Secteur(s) d'activité(s)</label>
        <input class="col-6" type="text" name="activity" value="<?= htmlentities($activity) ?>" placeholder="exemple: Métallurgie "required />
      </div>

      <div class="form-group col-6">
        <label class="col-4" for="domain_activity">Domaine d'activité</label>
        <input class="col-6" type="text" name="domain_activity" value="<?= htmlentities($domain_activity) ?>" placeholder="exemple: Industrie" required />
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label class="col-4" for="contact">Contact</label>
        <input class="col-6" type="text" name="contact" value="<?= htmlentities($contact) ?>" placeholder="exemple: Mr Dupont Claude" />
      </div>
    <div class="form-group col-6">
      <label class="col-4" for="phone">Numéro de téléphone</label>
      <input class="col-6" type="text" name="phone" value="<?= htmlentities($phone) ?>" placeholder="Ne pas mettre d'espace exemple: 0321587526" />
    </div>
  </div>

    <div class="row">
    <div class="form-group col-6">
      <label class="col-4" for="mail">Adresse mail</label>
      <input class="col-6" type="mail" name="mail" value="<?= htmlentities($mail) ?>" />
    </div>

    <div class="form-group col-6">
      <label class="col-4" for="web">Site web</label>
      <input class="col-6" type="text" name="web" value="<?= htmlentities($web) ?>" placeholder="exemple: " />
    </div>
  </div>

    <div class="form-check">
      <label class="form-check-label col-12">
        <input type="checkbox" class="form-check-input col-3" name="done" value="1" <?php if ($done) { echo 'checked'; } ?> />
        Cochez ici si vous voulez l'afficher sur la page entreprise
      </label>
    </div>

    <div class="form-inline">
      <label for="image">Logo à télécharger pour l'entreprise</label>
      <input type="file" name="image" class="form-control-file" id='image' required />
    </div>

    <button type="submit" name="upload" class="btn btn-primary">Valider</button>

  </form>
</div>

<?php
include('../include/footer.php');
 ?>
