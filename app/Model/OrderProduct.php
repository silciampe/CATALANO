<?php
class OrderProduct extends AppModel {

	public $name = 'OrderProduct';
	public $belongsTo = array('Order', 'Product');	
	public $order = 'OrderProduct.id asc';
	public $validate = array(
		'quantity' => array(
	 	 	'rule' => array('comparison', '>=', 1),
		    'message' => 'La cantidad debe ser mayor a 0'
		 )
	 );

	public $brwConfig = array(
		'names' => array(
			'plural' => 'Detalles de pedidos',
			'singular' => 'Detalle de pedido'
		),
		'actions' => array(
			'add' => false,
			'delete' => false,
			'edit' => false,
			'export' => true,
		),
		'fields' => array(			
			'names' =>array(				
				'order_id' => 'Pedido',
				'product_id' => 'Código de producto',
				'quantity' => 'Cantidad',
				'created' => 'Fecha de pedido',
				'modified' => 'Modificado',
				'user_id' => 'Código de cliente',
				'id_catalano' => 'Código Catalano'
			),
			'filter' => array (
				'order_id',
				'created',
			),
		),
		'paginate' => array(
			'fields' => array(
				'id',
				'order_id',
				'user_id',
				'id_catalano',
				//'product_id',
				'quantity',
				'created',
			),
		),
		'action_labels' => array(
			'export' => 'Exportar',
		),

	);


	public function addItem($orderId, $productId, $quantity = 1, $user_id) {

		$product = $this->Product->findById($productId);
		$order = $this->Order->findById($orderId);

		if (empty($product) or empty($order)) {
			return false;
		}

		$orderProduct = $this->find('first', array(
			'conditions' => array(
				'OrderProduct.order_id' => $orderId,
				'OrderProduct.product_id' => $productId,
			),
		));

		if (empty($orderProduct)) {
			$this->save(array(
				'id' => null,
				'order_id' => $orderId, 
				'product_id' => $productId, 
				'quantity' => $quantity,
				'user_id' => $user_id,
				'id_catalano' => $product['Product']['id_catalano'],
			));
		} else {
			$quantity =  $orderProduct['OrderProduct']['quantity'] + $quantity;
			$this->save(array(
				'id' => $orderProduct['OrderProduct']['id'],
				'order_id' => $orderId,
				'product_id' => $productId,
				'quantity' => $quantity,
				'user_id' => $user_id,
				'id_catalano' => $product['Product']['id_catalano'],
			));
		}

		return $orderProduct;
	}


	public function deleteItem($orderProductId){
		$orderProduct = $this->findById($orderProductId);
		if(!empty($orderProduct)) {
			if($this->delete($orderProductId)){
				return true;
			} 
		}
		return false;		
	}


	public function changeQuantityItem($orderProductId, $quantity){
		if(!ctype_digit($quantity)) {
			return false;
		}
		$orderProduct = $this->findById($orderProductId);
		if(empty($orderProduct)) {
			return false;
		}
		$arrayData = array(
			'id' => $orderProduct['OrderProduct']['id'],
			'quantity' => $quantity,
		);
		if($this->save($arrayData)){
			return true;
		} 
		return false;		
	}
}