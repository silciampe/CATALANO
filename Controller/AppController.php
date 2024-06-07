<?php
ini_set('upload_max_filesize', '200M');
ini_set('max_execution_time', 90000);
ini_set('post_max_size', '200M');
App::uses('Controller', 'Controller');

class AppController extends Controller
{

	var $components = array(
		'Auth',
		'Session',
		'Brownie.BrwPanel',
		'DebugKit.Toolbar'
	);
	var $helpers = array('Html', 'Js', 'Time', 'Form', 'Session');

	// Este es el menu de Brownie
	var $brwMenu = array(
		'Menú' => array(
			'Paginas' => 'Page',
			'Productos Moto' => 'Product',
			'Productos Agro' => 'AgroProduct',
			'Agropartes' => array('controller' => 'contents', 'action' => 'view', 'Agroparte', 1),
			'Noticias' => 'Post',
			'Clientes' => 'User',
			'Premios' => 'Award',
			'Álbumes' => 'Album',
			'Textos' => 'Texto',
			'PDFs' => array('controller' => 'contents', 'action' => 'view', 'Pdf', 1),
		),
		'Contacto' => array(
			'Mensajes recibidos' => 'Message',
			'Receptores de correos' => 'Recipient',
		),
		'Pedidos' => array(
			'Pedidos' => 'Order',
			'Estados de pedidos' => 'OrderStatus',
			'Receptores de pedidos' => 'OrderRecipient',
			//'Pedidos pendientes' => Modelo Order con filtro de OrderStatus a pedidos no confirmados
		),
	);

	public function _isPanel()
	{
		return (!empty($this->params['plugin']) or !empty($this->params['brw']));
	}

	function beforeFilter()
	{
		if (!$this->_isPanel()) {
			Controller::loadModel('Order');
			if ($this->Session->check('Order.id') and  $this->Session->check('Auth.userJedi.id')) {
				$nroOrden = $this->Session->read('Order.id');
				$orderExist = $this->Order->get($nroOrden);
				if (!empty($orderExist)) {
					//$detalle = $this->Order->currentPedido($nroOrden);
					$this->set('orderDetail', $orderExist);
				} else {
					$this->Session->destroy('Order');
				}
			}
			$this->_customAuthSettings();
		}
		//Poner lo quesea dentro de if (!$this->_isPanel()) { y solo llamados a funciones!
	}

	function beforeRender()
	{
		$this->set('date_format', 'd/m/Y');
		$this->_setTitle();
	}

	function _setTitle()
	{
		if (!empty($this->pageTitle)) {
			$this->pageTitle .= ' - ';
		}
		$this->pageTitle .= Configure::read('brwSettings.companyName');
		$this->set('title_for_layout', $this->pageTitle);
	}

	function _customAuthSettings()
	{
		if (empty($this->request->params['plugin']) or $this->request->params['plugin'] != 'brownie') {
			AuthComponent::$sessionKey = 'Auth.userJedi';
			$this->Auth->authorize = array('Controller');
			$this->Auth->authenticate = array(
				//'ConfirmationEmail',
				'Form' => array(
					'fields' => array(
						'username' => 'cuit',
					),
					'userModel' => 'User',
				)
			);
			$this->Auth->userModel = 'User';
			$this->Auth->loginAction = array('controller' => 'awards', 'action' => 'index');
			$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
			$this->Auth->loginRedirect = array('controller' => 'awards', 'action' => 'index');
			$this->Auth->allow();
		}
	}
}
