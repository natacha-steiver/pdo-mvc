<?php
  /*
      ./app/vues/categories/show.php
      Variables disponibles :
        - $categorie ARRAY(id, titre, slug)
        - $posts ARRAY(ARRAY(id, titre, slug, texte, image, auteur))
   */

?>
<h1>
  Articles de la catégorie:
  <?php echo $categorie['titre']; ?>
</h1>

<!-- Ici viennent les articles de la catégorie -->

<?php include '../app/vues/posts/liste.php'; ?>



    <?php
      // On aurait pu faire comme ceci
      // include_once  '../app/controleurs/postsControleur.php';
      // indexByCategorieAction($connexion, $categorie['id']);
    ?>
