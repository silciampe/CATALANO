<?php

class AlbumsController extends AppController {


	function index() {
		if (!$this->Session->check('Personal')) {
			$this->Session->setFlash('Debe estar logueado para poder ver los álbumes', 'flash_error');
			$this->redirect(array('controller' => 'personals', 'action' => 'login'));
		}		
		$albums = $this->Album->getAll();			
		$this->set('albums', $albums);
	}

	function view($id) {
		$album = $this->Album->get($id);
		if (empty($album)) {
			throw new NotFoundException('Could not find that page');
		}		
		$this->set(array('album' => $album));		
	}
}