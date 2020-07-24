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
    <!-- Fixed navbar -->
    <?php include '../app/vues/templates/partials/nav.php'; ?>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <?php echo $content1; ?>
      </div>
      <!-- /container -->

    <!-- Scripts -->
        <?php include '../app/vues/templates/partials/scripts.php'; ?>
  </body>
</html>
