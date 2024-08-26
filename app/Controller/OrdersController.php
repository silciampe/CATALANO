<?php
class OrdersController extends AppController {

	public $name = 'Orders';
	public $components = array('Email');
	public $uses = array('Order', 'OrderRecipient');



	// Mis pedidos hacerlo a futuro
	public function index() {
		if (!$this->authUser) {
			$this->redirect(array('controller' => 'orderTexts', 'action' => 'view', 'usuario-para-ver-pedidos'));
		} else {
			$orders = $this->Order->getAllOrder($this->authUser['id']);
			if ($orders) {
				$this->set('orderAll', $orders);
			} else {
				$this->redirect(array('controller' => 'orderTexts', 'action' => 'view', 'ningun-pedido'));
			}
		}
		$this->pageTitle = __('Todos mis pedidos', true);
	}

	//view de mis pedidos hacer a futuro
	public function view($idOrder) {
		if (!$this->authUser) {
		//descomentar para que envie sin estar logueado
			//$idUser = 0;
		//descomentar para que se loguee en el momento de confirmar compra
			//$this->render('/users/login');
			//$this->redirect(array('controller' => 'users', 'action' => 'login'));
			$this->redirect(array('controller' => 'orderTexts', 'action' => 'view', 'usuario-para-ver-detalle-pedido'));
		} else {
			$orderDetail = $this->Order->get($idOrder, $this->authUser['id']);
			if (empty($orderDetail)) {
				$this->redirect(array('controller' => 'orderTexts', 'action' => 'view', 'ningun-detalle-pedido'));
			}

			$this->set('orderDetail', $orderDetail);
			$this->pageTitle = __('Detalle de pedido', true);
			$crumb = array(
				'Pedidos realizados' => array('controller' => 'orders', 'action' => 'index'),
				'Pedido Nº '.$orderDetail['Order']['id'] => array('controller' => 'orders', 'action' => 'view', $orderDetail['Order']['id']),
			);

			$this->set('crumb', $crumb);
		}
	}

	public function current() {
		if (!AuthComponent::user()) {
			$this->Session->setFlash('Debe estar logueado para agregar productos al carro', 'flash_error');			
			$this->redirect(array('controller' => 'users', 'action' => 'login'));
		}

		$ordenId = $this->Session->read('Order.id');
		$order = $this->Order->get($ordenId);
		if(empty($order)) {
			$this->Session->setFlash('Debe cargar algun producto al carro', 'flash_error');
			$this->redirect(array('controller' => 'products', 'action' => 'index'));
		}		
		$this->set('order', $order);
	}	
	

	public function confirm() {
		if (!AuthComponent::user()) {
			$this->redirect(array('controller' => 'orders', 'action' => 'current'));
		}				
		if ($this->Session->read('Order.id')) {
			$order = $this->Order->read(null, $this->Session->read('Order.id'));
			if (!$order) {
				return false;
			} else {	
				$this->request->data['Order']['id'] = $order['Order']['id'];
				$this->request->data['Order']['confirmed'] = 1;
				$this->Order->saveAll($this->data);
				$this->Order->sendEmails($order['Order']['id']);
				$this->Session->delete('Order');
				$this->redirect(array('controller' => 'order_texts', 'action' => 'view', 'pedido-guardado'));			
			}
		} else {
			$this->redirect(array('controller' => 'orderTexts', 'action' => 'view', 'invalido-pedido-actual'));
		}		
	}
	

	public function show($id_catalano = null) {
		$this->layout = 'ajax';
		$product = $this->Order->OrderProduct->Product->get($id_catalano);
		if (!empty($product)) {
			$this->set('product', $product);
		} else {
			$this->set('no_existe', 'No existe el producto');
		}

	}


	public function add() {
		if (!AuthComponent::user()) {
			$this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
		if (!empty($this->data)) {
			$idCatalanoProduct = $this->data['OrderProduct']['id_catalano'];
			$quantity = $this->data['OrderProduct']['quantity'];

			if (!AuthComponent::user('id')) {
				$this->redirect(array('controller' => 'users', 'action' => 'login'));
			}
			
			$user = $this->Order->User->read(null, AuthComponent::user('id'));
			if (!$user) {
				return false;
			}
			//pr($user);
			$product = $this->Order->OrderProduct->Product->findByIdCatalano($idCatalanoProduct);
			if (!$product) throw new NotFourndException('Could not find that page');
			
			if (!$this->Session->read('Order.id')) {
				$orderId = $this->Order->createOrder($user['User']['id']);
				$this->Session->write('Order.id', $orderId);
			} else {
				$order = $this->Order->read(null, $this->Session->read('Order.id'));

				if (!$order) {
					$orderId = $this->Order->createOrder($user['User']['id']);
					$this->Session->write('Order.id', $orderId);
				} else {
					$orderId = $order['Order']['id'];
				}
			}
			$idProduct = $product['Product']['id'];
			$this->Order->OrderProduct->addItem($orderId, $idProduct, $quantity, $user['User']['id']);
			$this->Session->setFlash(__('Un producto fue agregado al carro de pedido', true), 'flash_success');
			$this->data = array();
			
			/*
			*/
			
		}

		//resumen de order para el listadito
		$nroOrden = $this->Session->read('Order.id');
		$orderExist = $this->Order->get($nroOrden);
		if(!empty($orderExist)) {
			$this->set('orderlist', $orderExist);
		} else {
			//$this->Session->destroy('Order');
		}

		Controller::loadModel('Texto');
		$files = $this->Texto->getByKey('listado-productos');
		$this->set('files', $files);

	}



}