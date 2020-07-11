<?php 

class PagesController extends Controller
{
	/**
	 * Send the page with $id and all pages to the view
	 */
	function view($id){
		$this->loadModel('Post');
		$d['page'] = $this->Post->findFirst(
			array(
				'conditions' => array('id' => $id, 'type' => 'page', 'online' => 1)
			)
		);
		if (empty($d['page'])) {
			$this->e404('Page introuvable');
		}	
		$this->set($d);
	}

	public function register(){
		//Start session
		//session_start();
		  /** */
		$errors = array();
		if(!empty($_POST)){
			$this->loadModel('User');
			if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
				$errors['username'] = "Votre pseudo n'est pas valide (alphanumerique)";
			} else {
				$username = $_POST['username'];
				$user = $this->User->getUserId("username", $username);
				if($user){
					$errors['username'] = "Ce pseudo est déja pris";
				}
			}
		
			if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$errors['email'] = "Votre email n'est pas valide";
			} else {
				$email = $_POST['email'];
				$user = $this->User->getUserId("email", $email);
				if($user){
					$errors['email'] = "Cet email est déja utilisé pour un autre compte";
				}
			}
		
			if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
			  $errors['password'] = "Vous devez rentrer un mot de passe valide";
			}
		
		}
		//Send errors to view
		$this->set('errors', $errors);

		//Register user if there is no error
		if(empty($errors) && !empty($_POST)){
			
			$result = $this->User->register($_POST['username'], $_POST['password'], $_POST['email']);
			
			
			//$user_id = $this->db->lastInsertId();
			$userId = $result['userId'];
			$token = $result['token'];
			mail($_POST['email'], "Génération inspirée : Confirmation de compte", "Afin de valider votre compte, nous vous prions de cliquer sur ce lien\n\nhttp://localhost/generation-inspiree/pages/confirm/$userId/$token");
			$_SESSION['flash'] = array('success' => 'Un email de confirmation vous a été envoyé') ;
			
			//debug($_SESSION);
			//die();
			//header("Location: $actuality");
		}
	}

	public function login(){
		
	}

	public function confirm($userId, $token){
		$this->loadModel("User");
		$tokenFromDb = $this->User->getToken($userId);
		/*
		$this->set(array(
			"userId" => $userId,
			"token"	=>	$token
		));
		*/
		//session_start();
		if($token == $tokenFromDb){
			$this->User->updateConfirmationInfo($userId);
			$_SESSION['auth'] = $userId;
			$account_page = BASE_URL."/pages/account";
			header("Location: $account_page");
			echo "<h1>matched</h1>";
		}else{
			$_SESSION['flash']['danger'] = "Ce lien de confirmation est expiré";
			$loginPage = BASE_URL."/pages/login";
			header("Location: $loginPage");
		}
	}

	public function account(){

	}
}
