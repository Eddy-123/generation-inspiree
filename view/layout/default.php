<?php
/*
if(session_status() == PHP_SESSION_NONE){
  session_start();
}
*/
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Customize CSS -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL.DS.'css'.DS.'style.css' ?>">

    <title><?= isset($title_for_layout) ? $title_for_layout : "Génération Inspiree"?></title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= BASE_URL.DS.'pages'.DS.'view'.DS.'1' ?>">Génération inspirée</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <?php foreach ($pages as $page) { ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL.'/pages/view/'.$page->id ?>"><?= $page->name ?></a>
      </li>
    <?php } ?>
    <?php if(isset($_SESSION['auth'])): ?>
      <li class="nav-item"><a class="nav-link" href="<?= BASE_URL.DS.'pages/disconnect' ?>">Déconnexion</a></li>
    <?php else : ?>
      <li class="nav-item"><a class="nav-link" href="<?= BASE_URL.DS.'pages/register' ?>">S'inscrire</a></li>
    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL.DS.'pages/login' ?>">Se connecter</a></li>
    <?php endif; ?>
    </ul>
  </div>
</nav>
<div class="container">
<?php
//debug($_SESSION);
?>

<?php
if(isset($_SESSION['flash'])){
  foreach($_SESSION['flash'] as $type => $message){
    ?>
    <div class="alert alert-<?= $type ?>"><?= $message ?></div>
    <?php
  }
  
unset($_SESSION['flash']);
}

?>

<?= $content_for_layout."<br><br>" ?>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
