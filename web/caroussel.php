<?php
require('config/connect.php');

if ($sql = $db->query("SELECT * FROM home WHERE id = 1")) {
  while ($row = $sql->fetch_assoc()) {
    printf('
    <div class="carousel-item active">
    <img class="img img-fluid" src="admin/www/images/%s"
    alt="Visite de %s">
    <a class="carousel-caption">
    <h3 class="slide_color">Visite de %s</h3>
    <p class="slide_color">Réalisé en %s</p>
    </a>
    </div>'
    , $row["image"]
    , $row["title"]
    , $row["title"]
    , $row["text"]);
  }
}
if ($sql = $db->query("SELECT * FROM home WHERE done = 1")) {
  while ($row = $sql->fetch_assoc()) {
    printf('
    <div class="carousel-item">
    <img class="img img-fluid" src="admin/www/images/%s"
    alt="visite de  %s">
    <a class="carousel-caption">
    <h3 class="slide_color">Visite de %s</h3>
    <p class="slide_color">Réalisé en %s</p>
    </a>
    </div>'
    , $row["image"]
    , $row["title"]
    , $row["title"]
    , $row["text"]);
  }
}

?>
