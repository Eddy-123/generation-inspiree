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
		
	}
}
