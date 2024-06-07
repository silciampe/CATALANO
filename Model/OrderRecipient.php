<?php
class OrderRecipient extends AppModel {
	
	public $name = 'OrderRecipient';
	public $order = 'OrderRecipient.id desc';
    public $brwConfig= array(
		'default' => array('active' => 1),
	);
	public function getAll() {
		return $this->find('list', array(
			'conditions' => array('OrderRecipient.enabled' => 1),
			'fields' => array('email'),
		));		
	}

}
?>