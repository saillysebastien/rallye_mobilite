<?php

$sql_batiment = $db->query("SELECT * FROM entreprises WHERE domain_activity = 'batiment' AND done = 1");
while($row_batiment = $sql_batiment->fetch_assoc()) {
  if (!empty($row_batiment['domain_activity'])) {
        printf('
    <div class="col-12 col-md-6 col-lg-4 text-left">
    <div class="card">
    <h4 class="card-header bg-dark text-white"><img src="admin/MEmploi/images/%s" class="img-thumbnail" alt="logo %s"/>
    <div class="float-right small">
    <a class="btn btn-raised btn-danger" href="mailto:%s" title="Envoyer un mail" data-placement="top" title="Tooltip on top"><i class="fa fa-envelope" aria-hidden="true"></i></a>
    <a class="btn btn-raised btn-danger" href="http://%s" target="_blank" title="%s"><i class="fa fa-internet-explorer" aria-hidden="true"></i></a>
    <a class="btn btn-raised btn-danger" href="https://www.google.fr/maps/place/%s %s %s %s" title="map" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
    </div>
    </h4>
    <div class="card-body">
    <div class="row justify-content-center">
    <div class="alert alert-primary row">
    <div class="col-4">Entreprise :</div>
    <div class="col-8">%s</div>
    </div>
    <div class="alert alert-danger row">
    <div class="col-4">Adresse :</div>
    <div class="col-8">%s %s</div>
    </div>
    <div class="alert alert-primary row">
    <div class="col-4">Ville :</div>
    <div class="col-8">%s %s</div>
    </div>
    <div class="alert alert-danger row">
    <div class="col-4">Activité :</div>
    <div class="col-8">%s</div>
    </div>
    <div class="alert alert-primary row">
    <div class="col-4">Contact :</div>
    <div class="col-8">%s</div>
    </div>
    <div class="alert alert-danger row">
    <div class="col-4">Téléphone :</div>
    <div class="col-8"><a href="tel:0%s">0%s</a></div>
    </div>
    </div>
    </div>
    </div>
    </div>'
    , $row_batiment["image"]
    , $row_batiment["image"]
    , $row_batiment["mail"]
    , $row_batiment["web"]
    , $row_batiment["web"]
    , $row_batiment["number_street"]
    , $row_batiment["street"]
    , $row_batiment["postal_code"]
    , $row_batiment["city"]
    , $row_batiment["title"]
    , $row_batiment["number_street"]
    , $row_batiment["street"]
    , $row_batiment["postal_code"]
    , $row_batiment["city"]
    , $row_batiment["activity"]
    , $row_batiment["contact"]
    , $row_batiment["phone"]
    , $row_batiment["phone"]
  );
  } else {
  printf('<div class="col-12 col-md-6 col-lg-4">Il n\'a pour le moment aucune entreprise sélectionné dans ce secteur Batîment</div>');
  }
} // fin de 'batiment'

?>
