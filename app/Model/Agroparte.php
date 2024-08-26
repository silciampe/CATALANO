<?php

class Agroparte extends AppModel {
	
	var $brwConfig = array(
		'names' => array(
			'plural' => 'Agropartes',
			'singular' => 'Agroparte',
			'gender' => 1,
		),		
		'images' => array(
			'gallery' => array(
				'name_category' => 'Galería de Imágenes',
				'sizes' => array('208x208', '999_999'),
				'index' => false,
				'description' => false
			),			
		),
		'actions' => array(
			'add' => false,
			'edit' => true,
			'delete' => false,
		),		
	);

	function get() {
		$agroparte = $this->find('first', array(
			'conditions' => array('Agroparte.id' => 1),
			'contain' => array(
				'BrwImage', 						
			),
		));
		return $agroparte;
	}	

}