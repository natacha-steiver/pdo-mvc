<?php
  /*
      ./app/vues/posts/show.php
      Variables disponibles :
        - $post ARRAY(id, titre, slug, texte, datePublication, media, auteur, pseudo)
   */
?>
<!-- Title -->
<h1><?php echo $post['titre']; ?></h1>

<!-- Author -->
<p class="lead">
  by <a href="#"><?php echo $post['pseudo']; ?></a>
</p>

<hr>

<!-- Date/Time -->
<p>Posted on
  <?php echo $post['datePublication']; ?></p>

<hr>

<!-- Preview Image -->
<img class="img-responsive z-depth-2" src="<?php echo $post['media']; ?>" alt="<?php echo $post['titre']; ?>">

<hr>

<!-- Post Content -->
<div><?php echo $post['texte']; ?></div>

<hr>
