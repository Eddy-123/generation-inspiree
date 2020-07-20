<?php 
    //Post model
	class Post extends Model
	{
		public function createPost($id, $title, $post){
			$req = $this->db->prepare("INSERT INTO posts(name, content, created, online, type, slug, user_id) VALUES(:name, :content, NOW(), 0, 'post', :slug, :user_id)");
            //debug($post);
            $req->execute(array(
				'name'	=>	$title,
				'content'	=>	$post,
				'slug'	=>	$title,
				'user_id'	=>	$id
			));			
		}

		public function acceptPost($id){
			$this->db->prepare("UPDATE posts SET online = 1 WHERE id = ?")->execute(array($id));
		}
		public function refusePost($id){
			$this->db->prepare("UPDATE posts SET online = 0 WHERE id = ?")->execute(array($id));
		}
	}
