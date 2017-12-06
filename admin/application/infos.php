<?php if ($infos): ?>
  <div class="alert alert-dark" role="alert">
    <?php foreach ($infos as $info): ?>
      <p><?php echo $info; ?></p>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
