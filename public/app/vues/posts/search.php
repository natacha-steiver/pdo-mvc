<?php
  /*
      ./app/vues/posts/index.php
      Variables disponibles :
        - $search STRING
        - $posts ARRAY(ARRAY(id, titre, slug, texte, datePublication, media, auteur))
   */
?>

 <h1 class="page-header">
     Résultat de votre recherche :
     <small><?php echo $search; ?></small>
 </h1>
    <?php include '../app/vues/posts/liste.php'; ?>
