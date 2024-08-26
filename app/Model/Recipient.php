<?php
class Recipient extends AppModel {
	
	var $brwConfig = array(
		'names' => array(
			'plural' => 'Receptores de correos',
			'singular' => 'Receptor de correos',
			'gender' => 1,
		),		
		'paginate' => array(
			'fields' => array('id', 'email'),
		),
	);
	
	function getAll() {
		return $this->find('list', array(			
			'fields' => array('email'),
		));
	}
}
?>