<?php

class PostsController extends Controller {
    /**
	 * ADMIN
	 */
	function admin_index(){		
		
        //GET
        if(isset($_GET) && isset($_GET['id']) && isset($_GET['action'])){
            $this->loadModel("Post");
            if($_GET['action'] == 'accept'){
                $this->Post->acceptPost($_GET['id']);
            }else if ($_GET['action'] == 'refuse'){
                $this->Post->refusePost($_GET['id']);
            }
        }
		$this->loadModel('Post');
		$conditions = array('type' => 'post');
		$d['posts'] = $this->Post->find(array(
			'fields' => 'id, name, online',
			'conditions' => $conditions,
			'order_by' => 'created DESC'
		));
        $this->set($d);
        
	}

	/**
	 * Permet d'éditer un article
	 */
	function admin_edit($id = null){
		$this->loadModel('Post');
		$d['id'] = '';
		if ($this->request->data) {
			if ($this->Post->validates($this->request->data)) {
				$this->request->data->type = 'post';
				$this->request->data->created = empty($this->request->data->created) ? date('Y-m-d h:i:s') : $this->request->data->created;
				$this->Post->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été modifié');
				//$id = $this->Post->id;
				$this->redirect('admin/posts/index');
			}else{
				$this->Session->setFlash('Merci de corriger vos informations', 'text-danger');
			}
			
		}else{
			if ($id) {			
				$this->request->data = $this->Post->findFirst(array(
					'conditions' => array('id' => $id)
				));
				$d['id'] = $id;
			}			
		}
		$this->set($d);
	}

	/**
	 * Permet de supprimer un article
	 */
	function admin_delete($id){
		$this->loadModel('Post');
		$this->Post->delete($id);
		$this->Session->setFlash('Le contenu a bien été supprimé');
		$this->redirect('admin/posts/index');
	}

}