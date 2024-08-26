<?php
class OrderProductsController extends AppController {

	public function changeQuantity($item_id, $quantity) {
		$this->OrderProduct->changeQuantityItem($item_id, $quantity);
	}

	public function deleteItem($orderProductId) {
		$orderProduct = $this->OrderProduct->findById($orderProductId);
		$this->OrderProduct->deleteItem($orderProductId);
		$order = $this->OrderProduct->Order->get($orderProduct['OrderProduct']['order_id']);
		if(!empty($order) and empty($order['OrderProduct'])) {
			$this->Session->delete('Order');
			$this->redirect(array('controller' => 'orders', 'action' => 'add' ));
		}
		$this->Session->setFlash(__('Se ha eliminado un producto', true), 'flash_success');
		$this->redirect($this->referer());
	}


}