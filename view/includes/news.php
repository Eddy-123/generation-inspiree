<main role="main" class="container">
    <br/> <br/>

    <div class="row">
        <div class="col-md-8">
            <img  src="<?= BASE_URL.DS.'img'.DS.'hero2.jpg' ?>" class="img-fluid img-responsive" alt="Génération inspirée"><!-- public/images/hero2.jpg -->
        </div>
        <div class="col-md-4">
            <br />
            <br />
            <span class="main-article-title text-primary">Dernier article</span>
            <h4 class="author-hero" >publié sur Génération inspirée</h4>

        </div>
    </div>
</main>
<?php
//debug($posts);
foreach($posts as $post){
    //print_r($post);
    echo "
    <div class='row d-block mt-5'>
    <h3 class='text-left'>".
    $post->name
    ."</h3>
    <p class='text-justify'>".
    $post->content
    ."</p>
    <h4 class='text-right strong'>".
    getUsernameFromArray($users, $post->user_id)
    ."<br>".
    translateDate($post->created)
    ."</h4>
    <hr>
    </div>
    ";
}


?>