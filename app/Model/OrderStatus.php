<?php

class OrderStatus extends AppModel {

	public $hasMany = array('Order');

	public $displayField = 'name';

	public $order = 'OrderStatus.sort';

   	public $brwConfig = array(
		'names' => array(
			'plural' => 'Estados de pedidos',
			'singular' => 'estado de pedido'
		),
	);


	public function getEnabled($type = 'all') {
		return $this->find($type, array(
			'conditions' => array('OrderStatus.enabled' => 1),
		));

	}


}