<?php
  /*
      ./app/vues/users/loginForm.php
      Variables disponibles :
        -
   */
?>
<form class="col-md-6 col-md-offset-3" action="users/login/submit" method="post">
  <h5>Connexion to the BackOffice</h5>
  <br>
  <div class="input-field">
    <i class="material-icons prefix">account_circle</i>
    <input id="login" type="text" class="validate" name="login">
    <label for="login">Login</label>
  </div>
  <div class="input-field">
    <i class="material-icons prefix">error</i>
    <input id="pwd" type="password" class="validate" name="pwd">
    <label for="pwd">Password</label>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-info waves-effect waves-light">Connect</button>
  </div>
</form>
