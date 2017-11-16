<?php if ($informations): ?>
  <div class="alert alert-dark" role="alert">
    <?php foreach ($informations as $information): ?>
      <p><?php echo $information; ?></p>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
