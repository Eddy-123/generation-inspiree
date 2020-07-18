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
    /*
    $post->content = preg_replace("#($post->firstKeyWord)#", "<span class='text-primary'>$1</span>", $post->content);
    $post->content = preg_replace("#($post->secondKeyWord)#", "<span class='text-primary'>$1</span>", $post->content);
    $post->content = preg_replace("#($post->thirdKeyWord)#", "<span class='text-primary'>$1</span>", $post->content);
    if(isset($_POST['post'])){
        $post = $_POST['post'];
        $post = preg_replace("#\*(.*)\*#", "<strong>$1</strong>", $post);
    }
    */
    $content = $post->content;
    if(!empty($post->firstKeyWord)){
        $firstKeyWord = $post->firstKeyWord;
        $content = preg_replace("#($firstKeyWord)#", "<span class='text-primary'>$1</span>", $post->content);
        //$content = htmlspecialchars($content);
    }

    if(!empty($post->secondKeyWord)){
        $secondKeyWord = $post->secondKeyWord;
        $content = preg_replace("#($secondKeyWord)#", "<span class='text-primary'>$1</span>", $post->content);
      //  $content = htmlspecialchars($content);
    }

    $content = preg_replace("#\*(.*)\*#", "<strong>$1</strong>", $content);
    //echo $content;
    echo "
    <div class='row d-block mt-5'>
    <h3 class='text-left'>".
    $post->name
    ."</h3>
    <p class='text-justify'>".
    $content
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