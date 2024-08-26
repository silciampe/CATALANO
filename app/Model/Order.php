<?php
class Order extends AppModel {

	public $name = 'Order';
	public $hasMany = array(
		'OrderProduct'
	);
	public $belongsTo = array(
		'User', 
		'OrderStatus'
	);
	public $displayField = 'id';
	public $order = 'Order.id desc';

	public $brwConfig = array(
		'names' => array(
			'plural' => 'Pedidos',
			'singular' => 'Pedido'
		),
		'actions' => array(
			'add' => false,
			'delete' => false,
			'edit' => true,
		),		
		'fields' => array(			
			'filter' => array(
				'id' => true, 
				'user_id' => true,
				'order_status_id',
				'confirmed',
			),
			'names' => array(
				'user_id' => 'Cliente',
				'order_status_id' => 'Estado',
				'confirmed' => 'Confirmado',
				'created' => 'Creado',
				'modified' => 'Modificado',
			),
		),		
	);


	public function createOrder($userId) {
		$orderStatus = $this->OrderStatus->find('first', array('order' => 'OrderStatus.sort', 'fields' => array('OrderStatus.id')));
		$data = array(
			'user_id' => $userId,
			'order_status_id' => $orderStatus['OrderStatus']['id'],
		);
		$this->save($data);	
		return $this->id;
	}


	public function get($idOrder) {
		$order =  $this->find('first', array(
			'conditions' => array(
				'Order.id' => $idOrder,
			),
			'contain' => array(
				'User', 
				'OrderStatus', 
				'OrderProduct' => array(
					'Product',
				)
			),
		));
		return $order;
	}

	public function sendEmails($orderId) {
		$order = $this->get($orderId);
		$enviado_admin = $this->sendAdmin($order);
		$enviado_client = $this->sendClient($order);
		return true;
	}


	public function sendAdmin($order){	
		App::import('Model', 'OrderRecipient');
    	$OrderRecipient = new OrderRecipient();
		$recipient = $OrderRecipient->getAll();
		if(!empty($recipient)) {
			App::uses('CakeEmail', 'Network/Email');
			$email = new CakeEmail();
			$email->viewVars(array(
				'order' => $order,
			));
			$email->from(array('no-reply@catalano.com.ar' => 'catalano.com.ar'));
			$email->to($recipient);
			$email->subject('Nuevo Pedido Nro '.$order['Order']['id'].' - catalano.com.ar');
			$email->template('orderAdmin');	
			if (!empty($data['archivo'])) {
				$email->attachments(array(
					$data['archivo']['name'] => array(
						'file' => $data['archivo']['tmp_name'],
						'mimetype' => $data['archivo']['type'],
						//'contentId' => 'my-unique-id'
					)
				));
			}
			$email->emailFormat('html');
			//$email->transport('Debug'); //lo descomentamos cuando tenemos que usar pruebas en local.
			$result = $email->send();
			//$this->log($result, 'debug');
			return $result;
		}
	}

	public function sendClient($order){
		App::import('Model', 'OrderRecipient');
		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail();
		$email->viewVars(array(
			'order' => $order,
		));
		$email->from(array('no-reply@catalano.com.ar' => 'catalano.com.ar'));
		$email->to($order['User']['email']);
		$email->subject('Nuevo Pedido Nro '.$order['Order']['id'].' - catalano.com.ar');
		$email->template('orderClient');	
		if (!empty($data['archivo'])) {
			$email->attachments(array(
				$data['archivo']['name'] => array(
					'file' => $data['archivo']['tmp_name'],
					'mimetype' => $data['archivo']['type'],
					//'contentId' => 'my-unique-id'
				)
			));
		}
		$email->emailFormat('html');
		//$email->transport('Debug'); //lo descomentamos cuando tenemos que usar pruebas en local.
		$result = $email->send();
		//$this->log($result, 'debug');
		return $result;
	}

}