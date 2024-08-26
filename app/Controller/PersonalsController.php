<?php

class PersonalsController extends AppController{

	
	public $uses = array();

	public function login() {
		$urlAlbum = array('controller' => 'albums', 'action' => 'index');
		if ($this->Session->check('Personal')) {
			return $this->redirect($urlAlbum);
		}
	    if ($this->request->is('post')) {	
	    	if (
	        	!empty($this->data['Personal']['username']) and !empty($this->data['Personal']['password']) and 
	        	$this->data['Personal']['username'] == USERNAME  and $this->data['Personal']['password'] == PASSWORD
	        ) {
	        	$this->Session->write('Personal',true);
	        	$this->Session->setFlash(__('Ingreso realizado con exito'), 'flash_success');
	            return $this->redirect($urlAlbum);
	        } else {
	            $this->Session->setFlash(__('Usuario o clave incorrecto'), 'flash_error');
	        }
	    }		
	}


	public function logout() {
		$this->Session->delete('Personal');
		$this->redirect(array('controller' => 'personals', 'action' => 'login'));
	}


}
