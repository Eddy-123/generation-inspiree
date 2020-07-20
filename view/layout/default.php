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

      <!-- Place inside the <head> of your HTML -->
      <script src="https://cdn.tiny.cloud/1/o69cgnwxudbil0l7q0dnyiwjeoufx5i2uoyxtjf9pin4ilop/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script type="text/javascript">
          tinymce.init({
              selector: "textarea"
          });
      </script>

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
      <li class="nav-item"><a class="nav-link" href="<?= BASE_URL.DS.'pages/account' ?>">Mon compte</a></li>
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

  <footer>
      <div class="container">
          <div class="row">
              <div class="col-md-4">
                  <h3>Carte du site</h3>
                  <ul class="list-unstyled three-column">
                      <?php foreach ($pages as $page) { ?>
                          <li class="">
                              <a class="" href="<?= BASE_URL.'/pages/view/'.$page->id ?>"><?= $page->name ?></a>
                          </li>
                      <?php } ?>
                      <?php if(isset($_SESSION['auth'])): ?>
                          <li class=""><a class="" href="<?= BASE_URL.DS.'pages/account' ?>">Mon compte</a></li>
                          <li class=""><a class="" href="<?= BASE_URL.DS.'pages/disconnect' ?>">Déconnexion</a></li>
                      <?php else : ?>
                          <li class=""><a class="" href="<?= BASE_URL.DS.'pages/register' ?>">S'inscrire</a></li>
                          <li class=""><a class="" href="<?= BASE_URL.DS.'pages/login' ?>">Se connecter</a></li>
                      <?php endif; ?>
                  </ul>
              </div>
              <div class="col-md-4">
                  <h3>Description</h3>
                  <p class="toure">Génération inspirée</p>
              </div>
              <div class="col-md-4">
                  <h3>Nous retrouver sur facebook</h3>
                  <p>
                      <button>
                          <a href="#">
                              Facebook <i class="fab fa-facebook-f"></i>
                          </a>
                      </button>
                  </p>
              </div>
          </div>
      </div>
  </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
