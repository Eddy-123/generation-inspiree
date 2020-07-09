<?php
/*
if(!empty($_POST)){
    $errors = array();
    if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
        $errors['username'] = "Votre pseudo n'est pas valide (alphanumerique)";
    }

    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Votre email n'est pas valide";
    }

    if(empty($_POST['password'] || $_POST['password'] != $_POST['password_confirm'])){
      $errors['password'] = "Vous devez rentrer un mot de passe valide";
    }


    debug($_POST);
    echo "<br><br><br>";
    debug($errors);
}
debug($_POST);
echo "<br><br><br>";
debug($errors);
*/
if(!empty($errors)){
  echo "
  <div class='alert alert-danger'>
  <p>Veuillez remplir le formulaire correctement</p>
  </div>    
  ";
  echo "<ul>";
  foreach($errors as $error){
    echo "
      <li>$error</li>
    ";
  }
  echo "</ul>";
}
?>

<h1>S'inscrire</h1>
<form action="" method="POST">
<div class="form-group">
    <label for="">Pseudo</label>
    <input type="text" class="form-control" name="username" >
  </div>
<div class="form-group">
    <label for="">Email</label>
    <input type="text" class="form-control" name="email" >
  </div>
  <div class="form-group">
    <label for="">Mot de passe</label>
    <input type="password" class="form-control" name="password" >
  </div>
  <div class="form-group">
    <label for="">Confirmez votre mot de passe</label>
    <input type="password" class="form-control" name="password_confirm" >
  </div>
  <button type="submit" class="btn btn-primary">M'inscrire</button>
</form>