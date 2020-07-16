<?php 

class PagesController extends Controller
{
	/**
	 * Send the page with $id and all pages to the view
	 */
	function view($id){
		//Single page
		$this->loadModel('Post');
		$d['page'] = $this->Post->findFirst(
			array(
				'conditions' => array('id' => $id, 'type' => 'page', 'online' => 1)
			)
		);
		if (empty($d['page'])) {
			$this->e404('Page introuvable');
		}	

		//Posts online
		$d['posts'] = $this->Post->find(
			array(
				'conditions' => array('type' => 'post', 'online' => 1),
				'order_by'		=>	"created DESC"
			)
		);

		//Users
		$this->loadModel('User');
		$d['users'] = $this->User->getUsers();
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
		if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
			$this->loadModel("User");
			$this->User->login($_POST['username'], $_POST['password']);
		}
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
		loggedOnly();
		$this->loadModel("User");
		$user = $this->User->getUserFromId($_SESSION['auth']);
		//$this->set($user);
		if(!empty($_POST) && !empty($_POST['post']) && !empty($_POST['title'])){
			$post = $_POST['post'];
			$title = $_POST['title'];

			//Define color for the publication
			if(isset($_POST['firstKeyWord'])){
				$keyWord = $_POST['firstKeyWord'];
				$post = preg_replace("#($keyWord)#", "<span class='text-primary'>$1</span>", $post);
			}
			if(isset($_POST['secondKeyWord'])){
				$keyWord = $_POST['secondKeyWord'];
				$post = preg_replace("#($keyWord)#", "<span class='text-primary'>$1</span>", $post);
			}
			if(isset($_POST['thirdKeyWord'])){
				$keyWord = $_POST['thirdKeyWord'];
				$post = preg_replace("#($keyWord)#", "<span class='text-primary'>$1</span>", $post);
			}


			$this->loadModel("Post");
			$this->Post->createPost($user['id'], $title, $post);
			$_SESSION['flash']['success'] = "Merçi pour votre publication, un email vous sera envoyé dès qu'elle sera affichée sur Génération inspirée";
		}

		$user_id = $user['id'];
		$this->loadModel("Post");
		
		$posts = $this->Post->find(array(
			'conditions'	=>	"user_id = $user_id",
			'order_by'		=>	"created DESC"
		));
		
		$set['user'] = $user;
		$set['username'] = $user['username'];
		$set['posts'] = $posts;
		$this->set($set);
	}

	public function disconnect(){
		unset($_SESSION['auth']);
		$_SESSION['flash']['success'] = "Vous êtes maintenant déconnecté";
		/*
		$actuality = BASE_URL.DS."pages".DS."view".DS."1";
		header("Location: $actuality");
		*/
	}

	public function forget(){
		if(!empty($_POST) && !empty($_POST['email'])){
			$this->loadModel("User");
			$user = $this->User->getUserFromEmail($_POST['email']);
			$userId = $user['id'];
			if($user){
				$reset_token = str_random(60);
				$this->User->updateToken($reset_token, $user['id']);
				mail($_POST['email'], "Génération inspirée : Réninitialiser votre mot de passe", "Afin de valider votre compte, nous vous prions de cliquer sur ce lien\n\nhttp://localhost/generation-inspiree/pages/reset/$userId/$reset_token");
				$_SESSION['flash']['success'] = "Veuillez consulter votre boîte email pour réinitialiser votre mot de passe";
			}else{
				$_SESSION['flash']['danger'] = "Aucun compte ne correspond à cette adresse";
			}
		}		
	}

	public function reset($id=null, $token=null){
		if($id != null && $token != null){
			$this->loadModel("User");
			$user = $this->User->getUserToReset($id, $token);
			if($user){
				if(!empty($_POST)){
					if(!empty($_POST['password']) AND $_POST['password'] == $_POST['password_confirm']){
						$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
						$this->User->resetPassword($id, $password);
						$_SESSION['flash']['success'] = "Votre mot de passe a bien été modifié";
					}
				}
			}else{
				$_SESSION['flash']['danger'] = "Le lien de réinitialisation n'est plus valide";
			}
		}
	}
}
