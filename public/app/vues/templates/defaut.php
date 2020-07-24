<?php
/*
    ./app/vues/templates/defaut.php
    Template par défaut
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../app/vues/templates/partials/head.php'; ?>
</head>

<body>
  <!-- Navigation -->
  <?php include '../app/vues/templates/partials/nav.php'; ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php echo $content1; ?>
        </div>

      <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">
          <?php include '../app/vues/templates/partials/aside.php'; ?>
        </div>

    </div>
    <!-- /.row -->
    <hr>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="page-footer info-color darken-1" id="footer">
    <?php include '../app/vues/templates/partials/footer.php'; ?>
  </footer>

  <!-- SCRIPTS -->
  <?php include '../app/vues/templates/partials/scripts.php'; ?>

</body>
</html>
