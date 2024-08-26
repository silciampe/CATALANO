<?php

class UsersController extends AppController{

	public $components = array('Email');
	public $uses = array('UserText', 'Recipient', 'User');

	public function login() {
	    if ($this->request->is('post')) {
	    	if ($this->Auth->login()) {
	        	$this->Session->setFlash(__('Ingreso realizado con exito'), 'flash_success', array(), 'auth');
	            return $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash(__('Usuario o clave incorrecto'), 'flash_error', array(), 'auth');
	        }
	    }
		$crumb = array(
			'Ingresar como usuario' => false,
		);
		$this->set('crumb', $crumb);
	}


	public function logout() {
		$this->Session->delete('Order');
		$this->redirect($this->Auth->logout());
	}


}
