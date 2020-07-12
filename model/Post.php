<?php 
    //Post model
	class Post extends Model
	{
		public function createPost($id, $title, $post){
			$req = $this->db->prepare("INSERT INTO posts(name, content, created, online, type, slug, user_id) VALUES(:name, :content, NOW(), 0, 'post', :slug, :user_id)");
			$req->execute(array(
				'name'	=>	$title,
				'content'	=>	$post,
				'slug'	=>	$title,
				'user_id'	=>	$id
			));			
		}
	}
