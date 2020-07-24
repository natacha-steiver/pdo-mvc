<?php
  /*
    ./app/vues/posts/addForm.php
    Variables disponibles
      - $auteurs ARRAY(ARRAY(id, pseudo))
      - $categories ARRAY(ARRAY(id, titre, slug))
   */
?>

<h1>Ajout d'un post</h1>
<div>
  <a href="">
    Retour vers la liste des posts
  </a>
</div>

<form action="posts/add" method="post">
  <div>
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" />
  </div>
  <div>
    <label for="texte">Texte</label>
    <textarea name="texte" id="texte"></textarea>
  </div>

  <!-- MENU DEROULANT DYNAMIQUE -->
  <div>
    <label for="auteur">Auteur</label>
    <select name="auteur" id="auteur">
      <?php foreach ($auteurs as $auteur): ?>
        <option value="<?php echo $auteur['id']; ?>">
          <?php echo $auteur['pseudo']; ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
  <!-- FIN MENU DEROULANT DYNAMIQUE -->

  <!-- LISTE DYNAMIQUE DE CHECKBOXES -->
  <div> <label>Catégories</label><br/>
    <?php foreach ($categories as $categorie): ?>
      <input type="checkbox" name="categories[]" value="<?php echo $categorie['id']; ?>" id="<?php echo $categorie['slug']; ?>" />
      <label for="<?php echo $categorie['slug']; ?>">
        <?php echo $categorie['titre']; ?>
      </label><br/>
    <?php endforeach; ?>
  </div>
  <!-- FIN LISTE DYNAMIQUE DE CHECKBOXES -->

  <div>
    <label for="media">Media</label>
    <input type="file" name="media" id="media" />
  </div>

  <div><input type="submit" /></div>
</form>
