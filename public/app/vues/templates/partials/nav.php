<?php
/*
    ./app/vues/templates/partials/nav.php
 */
?>
<nav class="navbar z-depth-2 info-color">
<div class="container ">
  <div class="navbar-header">

    <a class="navbar-brand waves-effect waves-light" href="<?php echo ROOT; ?>">
      Mon Super Blog
    </a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

    <form action="posts/search" method="post" class="navbar-form navbar-right waves-effect waves-light" role="search">
      <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Search">
      </div>
    </form>
  </div>
</div>
</nav>
