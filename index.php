<?php
include('include/header.php');

?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <h1 class="centered">Rallye Mobilité</h1>
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
                  <?php
                  include('accueil/caroussel.php');
                  ?>
                  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div><!--!caroussel-inner-->
              </div><!--!caroussel-->

              <div class="container">
                <h4 class="centered">Notre objectif</h4>
                <div class="pagetitle-separator-border">
                  <div class="pagetitle-separator-box">
                  </div>
                </div>

                <div class="row justify-content-center" >
                  <div class="col-12 col-sm-12 col-md-10 col-lg-8">
                    <p>Vous souhaitez decouvrir les entreprises du territoire ?
                      <br />Vos conseillers vont vous y aider ! Préparez vous à jouer et à découvrir des métiers.
                      <br /> Cette application a été imaginé par la Mission Locale de Lens-Liévin et la Maison de l'emploi de Lens-Liévin-Hénin-Carvin.
                      <br /> Elle a été conçue et réalisée avec l'appui technique des étudiants de Pop School Lens, par Mr Sailly Sébastien avec l'aide de Mr Rudy Malcherczyk et Mme Karine Molinaro.</p>
                    </div>
                  </div>
                </div>

                <!-- card -->
                <div class="container">
                  <h4 class="centered">Explications</h4>
                  <div class="pagetitle-separator-border">
                    <div class="pagetitle-separator-box"></div>
                  </div>

                  <div class="row justify-content-center" id="goal_home">

                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                      <div class="profile-card">
                        <img class="img img-responsive" id="img_card1" src="img/mobilite1.jpg">
                        <div class="profile-info">
                          <h4>Mobilité</h4>
                          <div class="card-separator-border"></div>
                          <div class="left">En quelques clics, retrouvez votre trajet sur-mesure combinant le bus sur le réseau Tadao, le train SNCF depuis toutes les gares, et d'autres réseaux de transports comme le taxi et le covoiturage.</div>
                          <div class="row justify-content-center">

                            <a href="#headingTwo" class="btn btn-outline-danger">Explorer</a>
                          </div>
                        </div><!--!profile-info-->
                      </div><!--!profile-card-->
                    </div><!--!col-->

                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                      <div class="profile-card">
                        <img class="img img-responsive" id="img_card2" src="img/application.jpg">
                        <div class="profile-info">
                          <h4>Application</h4>
                          <div class="card-separator-border"></div>
                          <div class="left"></div>
                          <div class="row justify-content-center">

                            <a href="#headingFive" class="btn btn-outline-danger">Explorer</a>
                          </div>
                        </div><!--!profile-info-->
                      </div><!--!profile-card-->
                    </div><!--!col-->
                  </div><!--!row-->

                  <div class="row justify-content-center" id="goal_home">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                      <div class="profile-card">
                        <img class="img img-responsive" id="img_card4" src="img/entreprise1.jpg">
                        <div class="profile-info">
                          <h4>Entreprises</h4>
                          <div class="card-separator-border"></div>
                          <div class="left">Cette page est dédiée aux demandeurs d'emploi. Découvrez une liste d'entreprises dans la région. N'hésitez pas à postuler et à envoyer votre CV. Différents secteurs d’activités vous sont proposés.</div>
                          <div class="row justify-content-center">
                            <a href="#headingThree" class="btn btn-outline-danger">Explorer</a>
                          </div>
                        </div><!--!profile-info-->
                      </div><!--!profile-card-->
                    </div><!--!col-->

                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                      <div class="profile-card">
                        <img class="img img-responsive" id="img_card3" src="img/formation1.jpg">
                        <div class="profile-info">
                          <h4>Formations</h4>
                          <div class="card-separator-border"></div>
                          <div class="left">Grâce à cette page, vous aurez accès aux différents centres de formations disponibles dans les Hauts de France. Vous pourrez affiner votre recherche et contacter l’organisme de votre choix. N'hésitez pas.</div>
                          <div class="row justify-content-center">

                            <a href="#headingFour" class="btn btn-outline-danger">Explorer</a>
                          </div>
                        </div><!--!profile-info-->
                      </div><!--!profile-card-->
                    </div><!--!col-->
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
                  <div class="row">
                    <div class="col-12 text_mobility">
                      Vous avez repéré une entreprise ou une formation qui vous intéresse et vous ne savez pas comment y aller?<br/>
                      Pas de souci !! Nous vous avons indiqué les divers sites de transports pour vous y rendre.
                    </div>
                    <div class="col-12 image_mobility">
                      <a href="https://www.voyages-sncf.com/" target="_blank"><img src="img/sncf2.jpg" alt="image de la SNCF" class="img_mobility  first_image"></a>
                    </div>
                    <div class="col-12 image_mobility">
                      <a href="http://www.tadao.fr/affichage.php?id=268" target="_blank"><img src="img/tadao5.jpeg" alt="image de tadao" class="img_mobility"></a>
                    </div>

                    <div class="col-12 image_mobility">
                      <a href="https://www.google.fr/search?q=taxi+lens&tbas=0&sa=X&ved=0ahUKEwjO6ainp4bXAhVkB8AKHSNTAIsQtgQIGg&biw=360&bih=536" target="_blank"><img src="img/taxi2.jpeg" alt="image de taxi" class="img_mobility"></a>
                    </div>

                    <div class="col-12 image_mobility">
                      <a href="https://www.idvroom.com/recherche-trajet?utm_source=Voyagesncf&utm_medium=pageweb&utm_campaign=partenariatvsc&forcecookies=ok" target="_blank"><img src="img/idvroom.png" alt="image de idvroom" class="img_mobility  last_image"></a>
                    </div>

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
                  <p class="title">Les entreprises par secteur d'acivité qui recrutent</p>
                </a>
              </h4>
            </div>

            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body">
                <div class="container-fluid">
                  <div class="row">
                    <div id="user" class="col-md-12" >
                      <div class="panel panel-primary panel-table">
                        <div class="panel-heading">
                          <div class="row">
                            <div class="col col-xs-8 well text-center" style="padding:1px;">
                              <button id="filter_batîment" title = "Batîment" class = "btn btn-outline-primary animated slideInDown">Batîment</button>
                              <button id="filter_commerce" title = "Commerce" class = "btn btn-outline-primary animated slideInDown">Commerce</button>
                              <button id="filter_industrie" title = "Industrie" class = "btn btn-outline-primary animated slideInDown">Industrie</button>
                              <button id="filter_logistique" title = "Logistique" class = "btn btn-outline-primary animated slideInDown">Logistique</button>
                              <button id="filter_restauration" title = "Restauration" class = "btn btn-outline-primary animated slideInDown">Restauration</button>
                              <button id="filter_travaux_publics" title = "Travaux publics" class = "btn btn-outline-primary animated slideInDown">Travaux publics</button>
                            </div>
                          </div>
                        </div>
                        <div class="row justify-content-center">
                          <div class="panel-thumb">
                            <div id="no_selected" class="animated slideInUp">
                              Sélectionner un secteur d'activité pour voir apparaître ses fiches Entreprises.
                            </div>
                            <div id="batîment" class="animated slideInDown" style="display: none;">
                              <div class="row">
                                <?php
                                include('entreprises/batîment.php');
                                ?>
                              </div>
                            </div>

                            <div id="commerce" class="animated slideInLeft" style="display: none;">
                              <div class="row">
                                <?php
                                include('entreprises/commerce.php');
                                ?>
                              </div>
                            </div>

                            <div id="industrie" class="animated slideInRight" style="display: none;">
                              <div class="row">
                                <?php
                                include('entreprises/industrie.php');
                                ?>
                              </div>
                            </div>

                            <div id="logistique" class="animated slideInUp" style="display: none;">
                              <div class="row">
                                <?php
                                include('entreprises/logistique.php');
                                ?>
                              </div>
                            </div>

                            <div id="restauration" class="animated zoomIn" style="display: none;">
                              <div class="row">
                                <?php
                                include('entreprises/restauration.php');
                                ?>
                              </div>
                            </div>

                            <div id="travaux_publics" class="animated zoomIn" style="display: none;">
                              <div class="row">
                                <?php
                                include('entreprises/travaux_publics.php');
                                ?>
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
                          <div class="row">
                            <?php include('formations/formations.php'); ?>
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
              </div><!--!panel-body-->
            </div><!--!collapse-->
          </div><!--!panel-default-->

        </div>

      </div><!--!col-->
    </div><!--!row-->
  </div><!--!container-fluid-->

  <?php
  include('include/footer.php');
  ?>
