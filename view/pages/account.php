<h1>Bienvenu(e) sur Génération inspirée <?= $username ?></h1>
<p>Avez-vous une inspiration à partager avec votre génération inspirée ?</p>
<h4>Recommandations :</h4>
<div>
    <ul>
        <li>Veuillez colorer les mots-clés en bleu</li>
        <li>Veuillez mettre les versets en gras, si vous en utilisez</li>
    </ul>
</div>
<form action="" method="POST">
<div class="form-group">
    <label for="">Titre de la publication :</label>
    <input type="text" class="form-control" name="title" >
  </div>
<div class="form-group">
    <label for="">Text à publier :</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="post"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Partager</button>
</form>

<h1>Mes publications</h1>

<?php

foreach($posts as $post){
  echo "
  <div class='row d-block mt-5'>
  <h3 class='text-left'>".
  $post->name
  ."</h3>
  <p class='text-justify'>".
  $post->content
  ."</p>
  <br>".
      translateDate($post->created)
  ."</h4>
  <hr>
  </div>
  ";
}

?>