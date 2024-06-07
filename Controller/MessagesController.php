<?php
class MessagesController extends AppController {

	public function send() {
		$this->pageTitle = __('Contacto');
		if (!empty($this->data)) {
			$this->Message->create();
			if ($this->Message->save($this->data)) {
				$data = $this->data['Message'];
				//$enviado = $this->Message->send($data);
				/*
				$this->log($enviado, 'debug');
				$this->Session->write('Message.email', $enviado);
				pr($this->Session->read('Message.email'));
				*/
				$this->Session->setFlash(__('El mensaje fue enviado', true), 'flash_success');
				
			} else {
				$this->Session->setFlash(__('El mensaje no se envó, verifique los errores', true) , 'flash_error');
			}
		} 
		// Si necesitamos consultar por un producto
		/*
		else {
			if (!empty($this->params['named']['product_id'])) {
				$product = ClassRegistry::init('Product')->findById($this->params['named']['product_id']);
				if (!$product) {
					throw new NotFoundException('Could not find that page');
				} else {
					$this->request->data['Message']['subject'] = 'Consulta por el producto: ' . $product['Product']['name'] . 'con ID: ' . $product['Product']['id'];
				}
			}		
		}*/
	}
	
}