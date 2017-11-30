<?php

$sql_commerce = $db->query("SELECT * FROM entreprises WHERE domain_activity = 'commerce' AND done = 1 ORDER BY title");
while($row_commerce = $sql_commerce->fetch_assoc()) {
  if (!empty($row_commerce['domain_activity'])) {
        printf('
    <div class="col-12 col-md-6 col-lg-4 text-left">
    <div class="card">
    <h4 class="card-header bg-dark text-white"><img src="admin/www/images/%s" class="img-thumbnail" alt="logo %s"/>
    <div class="float-right small">
    <a class="btn btn-raised btn-primary" href="mailto:%s" title="Envoyer un mail" data-placement="top" title="Tooltip on top"><i class="fa fa-envelope" aria-hidden="true"></i></a>
    <a class="btn btn-raised btn-warning" href="http://%s" target="_blank" title="%s"><i class="fa fa-internet-explorer" aria-hidden="true"></i></a>
    <a class="btn btn-raised btn-primary" href="https://www.google.fr/maps/place/%s %s %s %s" title="map" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
    </div>
    </h4>
    <div class="card-body">
    <div class="row justify-content-center">
    <div class="alert alert-primary row">
    <div class="col-4 society">Entreprise :</div>
    <div class="col-8 society">%s</div>
    </div>
    <div class="alert alert-warning row">
    <div class="col-4 society">Adresse :</div>
    <div class="col-8 society">%s %s</div>
    </div>
    <div class="alert alert-primary row">
    <div class="col-4 society">Ville :</div>
    <div class="col-8 society">%s %s</div>
    </div>
    <div class="alert alert-warning row">
    <div class="col-4 society">Activité :</div>
    <div class="col-8 society">%s</div>
    </div>
    <div class="alert alert-primary row">
    <div class="col-4 society">Contact :</div>
    <div class="col-8 society">%s</div>
    </div>
    <div class="alert alert-warning row">
    <div class="col-4 society">Téléphone :</div>
    <div class="col-8 society"><a href="tel:%s">%s</a></div>
    </div>
    </div>
    </div>
    </div>
    </div>'
    , $row_commerce["image"]
    , $row_commerce["image"]
    , $row_commerce["mail"]
    , $row_commerce["web"]
    , $row_commerce["web"]
    , $row_commerce["number_street"]
    , $row_commerce["street"]
    , $row_commerce["postal_code"]
    , $row_commerce["city"]
    , $row_commerce["title"]
    , $row_commerce["number_street"]
    , $row_commerce["street"]
    , $row_commerce["postal_code"]
    , $row_commerce["city"]
    , $row_commerce["activity"]
    , $row_commerce["contact"]
    , $row_commerce["phone"]
    , $row_commerce["phone"]
  );
  } else {
  printf('<div class="col-12 col-md-6 col-lg-4">Il n\'a pour le moment aucune entreprise sélectionné dans ce secteur Commerce</div>');
  }
} // fin de 'commerce'

?>
