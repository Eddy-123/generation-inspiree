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
			/*
			$pre->execute([$username, $password, $email, $token]);
			$user_id = $this->db->lastInsertId();
			mail($email, "Génération inspirée : Confirmation de compte", "Afin de valider votre compte, nous vous prions de cliquer sur ce lien\n\nhttp://localhost/generation-inspiree/pages/confirm/$user_id/$token");
			$connection_page = BASE_URL."/pages/view/1";
			header("Location: $connection_page");
			*/
			return array(
				"userId"	=>	$this->db->lastInsertId(),
				"token"		=>	$token
			);
		}


		public function getUserId($key, $value){
			$sql = "SELECT id FROM users WHERE $key = ?";
			$pre = $this->db->prepare($sql);
			$pre->execute([$value]);
			$response = $pre->fetch();
			return $response['id'];
		}
		
		public function getToken($userId){
			$req = $this->db->prepare("SELECT confirmation_token AS token FROM users WHERE id = ?");
			$req->execute(array($userId));
			$result = $req->fetch();
			return $result['token'];
		}

		public function	updateConfirmationInfo($userId){
			$req = $this->db->prepare("UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?");
			$req->execute(array($userId));
			
		}

		public function login($username, $password){
			$req = $this->db->prepare("SELECT * FROM users WHERE (username = :username OR email = :username) AND confirmed_at IS NOT NULL");
			$req->execute(array(
				'username' => $username
			));
			$user = $req->fetch();
			//debug($user);
			if(password_verify($password, $user['password'])){
				$_SESSION['auth'] = $user['id'];
				$account = BASE_URL.DS."pages".DS."account";
				header("Location: $account");
			}else{
				$_SESSION['flash']['danger'] = "Identifiant ou mot de passe incorrect";
			}
		}

	}
