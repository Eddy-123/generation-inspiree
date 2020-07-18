<?php 
    //Post model
	class Post extends Model
	{
		public function createPost($id, $title, $post, $firstKeyWord, $secondKeyWord, $thirdKeyWord){
			$req = $this->db->prepare("INSERT INTO posts(name, content, created, online, type, slug, user_id, firstKeyWord, secondKeyWord, thirdKeyWord) VALUES(:name, :content, NOW(), 0, 'post', :slug, :user_id, :firstKeyWord, :secondKeyWord, :thirdKeyWord)");
            debug($post);
            $req->execute(array(
				'name'	=>	$title,
				'content'	=>	$post,
				'slug'	=>	$title,
				'user_id'	=>	$id,
                'firstKeyWord'  =>  $firstKeyWord,
                'secondKeyWord' =>  $secondKeyWord,
                'thirdKeyWord'  =>  $thirdKeyWord
			));			
		}

		public function acceptPost($id){
			$this->db->prepare("UPDATE posts SET online = 1 WHERE id = ?")->execute(array($id));
		}
		public function refusePost($id){
			$this->db->prepare("UPDATE posts SET online = 0 WHERE id = ?")->execute(array($id));
		}
	}
