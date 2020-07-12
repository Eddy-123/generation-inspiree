<h1>Se connecter</h1>
<form action="" method="POST">
<div class="form-group">
    <label for="">Pseudo ou email</label>
    <input type="text" class="form-control" name="username" >
  </div>
  <div class="form-group">
    <label for="">Mot de passe <a href="<?= BASE_URL.DS."pages".DS."forget" ?>">(J'ai oublié mon mot de passe oublié)</a></label>
    <input type="password" class="form-control" name="password" >
  </div>
  <button type="submit" class="btn btn-primary">Me connecter</button>
</form>