<?php

include 'include/header.php';
?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <h1 class="centered">Rallye Mobilité</h1>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <!-- Accueil -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Accueil
                <p class="title">Explications du site et du jeu</p>
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <img class="img img-fluid" src="img/carou1.jpg"
                    alt="First slide">
                    <a class="carousel-caption">
                      <h3></h3>
                      <p></p>
                    </a>
                  </div>
                  <div class="carousel-item">
                    <img class="img img-fluid" src="img/carou2.jpg"
                    alt="Second slide">
                    <a class="carousel-caption">
                      <h3></h3>
                      <p></p>
                    </a>
                  </div>
                  <div class="carousel-item">
                    <img class="img img-fluid" src="img/carou3.jpg"
                    alt="Third slide">
                    <a class="carousel-caption">
                      <h3></h3>
                      <p></p>
                    </a>
                  </div>
                  <div class="carousel-item">
                    <img class="img img-fluid" src="img/carou4.jpg"
                    alt="Third slide">
                    <a class="carousel-caption">
                      <h3></h3>
                      <p></p>
                    </a>
                  </div>
                  <div class="carousel-item">
                    <img class="img img-fluid" src="img/carou6.jpg"
                    alt="Third slide">
                    <a class="carousel-caption">
                      <h3></h3>
                      <p></p>
                    </a>
                  </div>
                  <div class="carousel-item">
                    <img class="img img-fluid" src="img/carou7.jpg"
                    alt="Third slide">
                    <a class="carousel-caption">
                      <h3></h3>
                      <p></p>
                    </a>
                  </div>
                  <div class="carousel-item">
                    <img class="img img-fluid" src="img/carou8.jpg"
                    alt="Third slide">
                    <a class="carousel-caption">
                      <h3></h3>
                      <p></p>
                    </a>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Mobilité -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Mobilité
                <p class="title">Les différents moyens de transports</p>
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
            </div>
          </div>
        </div>

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
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
            </div>
          </div>
        </div>

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
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
            </div>
          </div>
        </div>

        <!-- Application -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingFive">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                Application
                <p class="title">Le jeu rallye mobilité</p>
              </a>
            </h4>
          </div>
          <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
            <div class="panel-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
            </div>
          </div>
        </div>

        <!-- CONTACTS -->
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingSix">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                Contacts
                <p class="title">Vous pouvez nous envoyer un message</p>
              </a>
            </h4>
          </div>
          <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
            <div class="panel-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php
include 'include/footer.php';
