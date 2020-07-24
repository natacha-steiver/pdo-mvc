<?php
  /*
    ./app/vues/posts/indexAction.php
    Variables disponibles
        -$posts ARRAY(ARRAY(id, titre, sousTitre, ...))
   */
?>
<h1>Gestion des posts</h1>
<div><a href="posts/addForm">Ajouter un enregistrement</a></div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>Titre</th>
      <th>Slug</th>
      <th>datePublication</th>
      <th>Texte</th>
      <th>Media</th>
      <th>Auteur</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($posts as $post): ?>
      <tr>
        <td><?php echo $post['postId']; ?></td>
        <td><?php echo $post['postTitre']; ?></td>
        <td><?php echo $post['postSlug']; ?></td>
        <td><?php echo $post['datePublication']; ?></td>
        <td><?php echo substr($post['texte'], 0, 20); ?>...</td>
        <td><?php echo $post['media']; ?></td>
        <td><?php echo $post['pseudo']; ?></td>
        <td>
          <a href="posts/editForm/<?php echo $post['postId']; ?>">Edit</a> |
          <a href="posts/delete/<?php echo $post['postId']; ?>">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
