<?php
  /*
      ./app/vues/posts/liste.php
      Variables disponibles :
        - $posts ARRAY(ARRAY(id, titre, slug, texte, datePublication, media, auteur))
   */
?>
<?php foreach ($posts as $post): ?>
 <h2>
     <a href="posts/<?php echo $post['postId']; ?>/<?php echo $post['postSlug']; ?>">
       <?php echo $post['postTitre']; ?>
     </a>
 </h2>
 <p class="lead">
   by <a href="#"><?php echo $post['pseudo']; ?></a>
 </p>
 <p> Posted on
    <?php
    // METHODE 1
      //$date = date_create($post['datePublication']);
      //echo date_format($date, "D d M Y");

    // METHODE 2
      echo date('D d M Y',strtotime($post['datePublication']));

    ?>     </p>
 <hr>
 <img class="img-responsive z-depth-2" src="<?php echo $post['media']; ?>" alt="<?php echo $post['postTitre']; ?>">
 <hr>
     <div><?php echo substr($post['texte'],0,100); ?>...</div>
  <a href="posts/<?php echo $post['postId']; ?>/<?php echo $post['postSlug']; ?>">
    <button type="button" class="btn btn-info waves-effect waves-light">Read more</button>
  </a>
  <hr>
<?php endforeach; ?>
