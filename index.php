<?php
include('include/header.php');
require('config/connect.php');
?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <h1 class="text-center">Rallye Mobilité</h1>
    </div><!--!col-->
  </div><!--!row-->

  <div class="row">
    <div class="col">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <!-- Accueil -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Accueil
                <p class="title">Objectif et explications</p>
              </a>
            </h4>
          </div><!--!panel-heading-->

          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <?php include('web/caroussel.php'); ?>
                  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Préc</span>
                  </a>
                  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
                  </a>
                </div><!--!caroussel-inner-->
              </div><!--!caroussel-->

              <div class="container">
                <h4 class="text-center">Notre objectif</h4>
                <div class="pagetitle-separator-border">
                  <div class="pagetitle-separator-box">
                  </div>
                </div>

                <div class="row justify-content-center" >
                  <div class="col-12 col-sm-12 col-md-10 col-lg-8">
                    <?php
                    $sql = $db->query("SELECT * FROM goal WHERE done = 1 ORDER BY id");
                    while($row = $sql->fetch_assoc()) {
                      printf('<h6>%s</h6>', $row['text']);
                    }
                    ?>
                  </div>
                </div>
              </div>

              <!-- card -->
              <div class="container">
                <h4 class="text-center">Explications</h4>
                <div class="pagetitle-separator-border">
                  <div class="pagetitle-separator-box"></div>
                </div>

                <div class="row justify-content-center" id="goal_home">
                  <?php
                  $sql = $db->query("SELECT * FROM explication WHERE done = 1");
                  while ($row = $sql->fetch_assoc()) {
                    printf('
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="profile-card">
                    <img class="img img-responsive img_card_explication" src="img/%s">
                    <div class="profile-info">
                    <h4>%s</h4>
                    <div class="card-separator-border"></div>
                    <div class="left">%s</div>
                    <div class="left">%s</div>'
                    , $row['image']
                    , $row['title']
                    , $row['text1']
                    , $row['text2']);

                    if (!empty($row['text3'])) {
                      printf('
                      <div class="left">%s</div>'
                      , $row['text3']);
                    }
                    if (!empty($row['text4'])) {
                      printf('
                      <div class="left">%s</div>'
                      , $row['text4']);
                    }
                    if (!empty($row['text5'])) {
                      printf('
                      <div class="left">%s</div>'
                      , $row['text5']);
                    }
                    printf('
                    </div><!--!profile-info-->
                    </div><!--!profile-card-->
                    </div><!--!col-->');
                  }

                  ?>
                </div><!--!row-->
              </div><!--!panel-body-->
            </div><!--!container-->
          </div><!--!collapse-->
        </div><!--!panel-default-->

        <!-- Mobilité -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab"  id="headingTwo">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" >
                Mobilité
                <p class="title">Les différents moyens de transports</p>
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              <div class="container">
                <div class="row text-center">
                  <div class="col-12 text_mobility">
                    <h6>Vous avez repéré une entreprise ou une formation qui vous intéresse et vous ne savez pas comment y aller ?</h6>
                    <h6>Pas de souci !! Nous vous avons indiqué les divers sites de transports pour vous y rendre.</h6>
                  </div>
                  <?php
                  $sql = $db->query("SELECT * FROM mobility WHERE id = 1");
                  while($row = $sql->fetch_assoc()) {
                    printf('
                    <div class="col-12 image_mobility">
                      <a href="http://%s" target="_blank"><img src="img/%s" alt="image de %s" class="img_mobility first_image"></a>
                    </div>'
                  , $row['web']
                  , $row['image']
                  , $row['title']);
                  }
                  $sql3 = $db->query("SELECT * FROM mobility WHERE id != 1 AND id != 2 ORDER BY title");
                  while($row = $sql3->fetch_assoc()) {
                    printf('
                    <div class="col-12 image_mobility">
                      <a href="http://%s" target="_blank"><img src="img/%s" alt="image de %s" class="img_mobility"></a>
                    </div>'
                  , $row['web']
                  , $row['image']
                  , $row['title']);
                  }
                  $sql2 = $db->query("SELECT * FROM mobility WHERE id = 2");
                  while($row = $sql2->fetch_assoc()) {
                    printf('
                    <div class="col-12 image_mobility">
                      <a href="http://%s" target="_blank"><img src="img/%s" alt="image de %s" class="img_mobility last_image"></a>
                    </div>'
                  , $row['web']
                  , $row['image']
                  , $row['title']);
                  }
                   ?>

                </div>
              </div>
            </div><!--!panel-body-->
          </div><!--!collapse-->
        </div><!--!panel-default-->

        <!-- Entreprises -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Entreprises
                <p class="title">Les entreprises qui recrutent</p>
              </a>
            </h4>
          </div>

          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
              <div class="container-fluid">
                <div class="row justify-content-center">
                  <div id="user" class="col-md-12" >
                    <div class="panel panel-primary panel-table">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col col-xs-8 well text-center" style="padding:1px;">
                            <?php
                            $sql = $db->query("SELECT * FROM button_enterprise WHERE done = 1 ORDER BY name ASC");
                            while($row = $sql->fetch_assoc()) {
                              printf('
                              <button id="filter_%s" title="%s" class="btn btn-outline-primary animated slideInDown">%s</button>'
                              , $row['name']
                              , ucfirst($row['name'])
                              , ucfirst($row['name'])
                            );
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="row justify-content-center">
                      <div class="panel-thumb">
                        <div id="no_selected" class="animated slideInUp">
                          <h6 class="text_enterprises">Sélectionner un secteur d'activité pour voir apparaître ses fiches Entreprises.</h6>
                        </div>
                        <div id="batîment" class="animated slideInDown" style="display: none;">
                          <div class="row justify-content-center">
                            <?php include('web/batîment.php');?>
                          </div>
                        </div>

                        <div id="commerce" class="animated slideInLeft" style="display: none;">
                          <div class="row justify-content-center">
                            <?php include('web/commerce.php');?>
                          </div>
                        </div>

                        <div id="industrie" class="animated slideInRight" style="display: none;">
                          <div class="row justify-content-center">
                            <?php include('web/industrie.php');?>
                          </div>
                        </div>

                        <div id="logistique" class="animated slideInUp" style="display: none;">
                          <div class="row justify-content-center">
                            <?php include('web/logistique.php');?>
                          </div>
                        </div>

                        <div id="restauration" class="animated zoomIn" style="display: none;">
                          <div class="row justify-content-center">
                            <?php include('web/restauration.php');?>
                          </div>
                        </div>

                        <div id="travaux_publics" class="animated zoomIn" style="display: none;">
                          <div class="row justify-content-center">
                            <?php include('web/travaux_publics.php');?>
                          </div>
                        </div>
                      </div>
                    </div><!--!row-->
                  </div>
                </div>
              </div>
            </div>
          </div><!--!panel-body-->
        </div><!--!collapse-->
      </div><!--!panel-default-->

      <!-- Formations -->
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFour">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Formations
              <p class="title">Les formations dans votre secteur</p>
            </a>
          </h4>
        </div>

        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
          <div class="panel-body">
            <div class="container-fluid">
              <div class="row justify-content-center">
                <div id="user2" class="col-md-12" >
                  <div class="panel-thumb">
                    <div class="animated rotateInUpLeft">
                      <div class="row justify-content-center">
                        <?php include('web/formations.php'); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!--!panel-body-->
        </div><!--!collapse-->
      </div><!--!panel-default-->
      <!-- Application -->
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFive">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive" id="application">
              Application
              <p class="title">Le jeu rallye mobilité</p>
            </a>
          </h4>
        </div><!--!panel-heading-->

        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
          <div class="panel-body">
            <?php
            // On insère les explications pour l'application
            $sql = $db->query("SELECT * FROM appli_explication  WHERE done = 1");
            while($row = $sql->fetch_assoc()) {
              printf('<h6>%s</h6>', $row['text']);
            }
             ?>
          </div><!--!panel-body-->
        </div><!--!collapse-->
      </div><!--!panel-default-->

      <!-- CONTACTS -->
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingSix">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
              Contacts
              <p class="title">Vous pouvez nous envoyer un message</p>
            </a>
          </h4>
        </div><!--!panel-heading-->
        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
          <div class="panel-body">
            <div class="container-fluid">
              <div class="row justify-content-center">
                <div id="user2" class="col-md-12" >
                  <div class="panel-thumb">
                    <div class="animated rotateInUpRight">
                      <div class="row justify-content-center">
                        <?php include('web/contact.php'); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!--!panel-body-->
        </div><!--!collapse-->
      </div><!--!panel-default-->
    </div>

  </div><!--!col-->
</div><!--!row-->
</div><!--!container-fluid-->

<?php include('include/footer.php');?>
