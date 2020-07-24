<?php
  /*
      ./app/vues/categories/index.php
      Variables disponibles :
        - $categories ARRAY(ARRAY(id, titre, slug))
   */
?>

<h4>Categories</h4>

<ul class="collection">
  <?php foreach ($categories as $categorie): ?>
    <li>
      <a href="categories/<?php echo $categorie['id']; ?>/<?php echo $categorie['slug']; ?>" class="collection-item">
        <?php echo $categorie['titre']; ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>
