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
for($i=0; $i<5; $i++){
    echo "
    <div class='row d-block mt-5'>
    <h3 class='text-left'>
    Titre de la publication
    </h3>
    <p class='text-justify'>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, nostrum! 
    Enim temporibus, natus optio accusantium eligendi accusamus libero porro perspiciatis 
    laboriosam ullam sit reiciendis ea, facere assumenda quos. Nam, iusto!
    </p>
    <h4 class='text-right text-muted'>
    Auteur
    </h4>
    <hr>
    </div>
    ";
}


?>