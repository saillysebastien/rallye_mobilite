<?php if ($errors): ?>
  <div class="alert alert-danger text-center" role="alert">
    <?php foreach ($errors as $error): ?>
      <p><?php echo $error; ?></p>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
