<?php

require('config/connect.php');
$sql = $db->query("SELECT * FROM contact");

while($row = $sql->fetch_assoc()) {
        printf('
        <div class="formations col-12 col-md-6 col-lg-4 text-left">
        <div class="card">
        <h4 class="card-header bg-dark text-white">
        <div class="float-right small">
        <a class="btn btn-raised btn-primary" href="mailto:%s" title="Envoyer un mail" data-placement="top" title="Tooltip on top"><i class="fa fa-envelope" aria-hidden="true"></i></a>
        <a class="btn btn-raised btn-warning" href="tel:%s" target="_blank" title="Téléphoner"><i class="fa fa-phone" aria-hidden="true"></i></a>
        <a class="btn btn-raised btn-primary" href="https://www.google.fr/maps/place/%s" title="Google maps" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
        </div>
        </h4>
        <div class="card-body">
        <div class="row justify-content-center">
        <div class="alert alert-primary row">
        <div class="col-4 society">Organisme :</div>
        <div class="col-8 society">%s</div>
        </div>
        <div class="alert alert-warning row">
        <div class="col-4 society">Adresse :</div>
        <div class="col-8 society">%s</div>
        </div>
        <div class="alert alert-primary row">
        <div class="col-4 society">Président :</div>
        <div class="col-8 society">%s</div>
        </div>
        <div class="alert alert-warning row">
        <div class="col-4 society">Directeur :</div>
        <div class="col-8 society">%s</div>
        </div>
        <div class="alert alert-primary row">
        <div class="col-4 society">Directeur adjoint :</div>
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
        , $row["mail"]
        , $row["phone"]
        , $row["adresse"]
        , $row["title"]
        , $row["adresse"]
        , $row["president"]
        , $row["director"]
        , $row["vice_director"]
        , $row["phone"]
        , $row["phone"]
      );
    } // fin de 'contact'
 ?>
