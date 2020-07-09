<?php 
    //Post model
	class User extends Model
	{

		public function register($username, $password, $email){			
			$sql = "INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ?";
			$pre = $this->db->prepare($sql);
			$password = password_hash($password, PASSWORD_BCRYPT);
			$token = str_random(60);
		
			$pre->execute([$username, $password, $email, $token]);
			$user_id = $this->db->lastInsertId();
			mail($email, "Génération inspirée : Confirmation de compte", "Afin de valider votre compte, nous vous prions de cliquer sur ce lien\n\nhttp://localhost/generation-inspiree/pages/confirm/$user_id/$token");
			$connection_page = BASE_URL."/pages/view/1";
			header("Location: $connection_page");
			exit();
		}


		public function getUserId($key, $value){
			$sql = "SELECT id FROM users WHERE $key = ?";
			$pre = $this->db->prepare($sql);
			$pre->execute([$value]);
			$response = $pre->fetch();
			return $response['id'];
		}

	}
