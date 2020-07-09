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
		$errors = array();
		if(!empty($_POST)){
			$this->loadModel('Post');
			if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
				$errors['username'] = "Votre pseudo n'est pas valide (alphanumerique)";
			} else {
				//$req = $this->Post->
			}
		
			if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$errors['email'] = "Votre email n'est pas valide";
			}
		
			if(empty($_POST['password'] || $_POST['password'] != $_POST['password_confirm'])){
			  $errors['password'] = "Vous devez rentrer un mot de passe valide";
			}
		
		}
		//Send errors to view
		$this->set('errors', $errors);

		//Register user if there is no error
		if(empty($errors) && !empty($_POST)){
			
			$this->Post->register($_POST['username'], $_POST['password'], $_POST['email']);
		}
	}
}
