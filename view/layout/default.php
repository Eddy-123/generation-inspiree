<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="#">
    <title><?= isset($title_for_layout) ? $title_for_layout : "Génération Inspiree"?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div ><a class="navbar-brand" href="index.php">Génération inspirée</a></div>
    <div >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="index.php">Acceuil</a>
            </li>            
            <li class="nav-item">
            <a class="nav-link" href="index.php">Vision</a>
            </li>
            <?php foreach ($pages as $page) { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL.'/pages/view/'.$page->id ?>"><?= $page->name ?></a>
            </li>
          <?php } ?>
        </ul>
        </div>
    </div>
</nav>

    <?= $content_for_layout."<br><br>" ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<footer><!-- #footer begin -->

  <span>
    <a
      href="https://www.facebook.com/G%C3%A9n%C3%A9ration-inspir%C3%A9e-104352227597722/?hc_ref=ARRzMlDvxIAkYuDbK7cA6oB-BDYiw3Sp98fTwvgD0f92rw53dkGW8ydzm6KJ6-PPzSY&fref=nf&__xts__[0]=68.ARCJEepFqmpyio0go73Y64I5SdBVhniEwAwUdRUgc7jNZNfAQFnFb1pjMptBCtuzX-X9daaWqhNB6GPg4hpyRrl_Ne1_SBql_LAJlhImju1yef9i0d_mGMr7d7RNMa-NkAzjIZ9Tf1aoox67S_jnmgCCCoQHyeHTREWb3RXItabi53jn5NJfiCP9hbtifb3eoLONGPZ3I9LAYb6MuiADQHi9A4BMZ1X_77wvySmP7XP5yEFjD23YEJEcs-s2DMxZrEw1_0e1Gr4rSdB_8nQ98ZBtMfr7MvF3mCtvFvdkhW2CcdBVFekBEatuMyPcqivFLfr13y-h_2HvGz2XAMIvswA&__tn__=kC-R"
      class="fa fa-facebook">
      Nous joindre sur facebook
    </a>
  </span>
  <br/>
  <span class="mr-0">Copyright &copy; 2019, Fr@ncky</span>

</footer><!-- #footer end -->

</body>
</html>
