<?php if ($errors): ?>
  <div class="error alert alert-danger" role="alert">
    <?php foreach ($errors as $error): ?>
      <p><?php echo $error; ?></p>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
