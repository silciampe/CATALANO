<?php

class Award extends AppModel {

	public $belongsTo = array('AwardCategory');

	public $brwConfig = array(
		'names' => array(
			'plural' => 'Premios',
			'singular' => 'Premio',
			'gender' => 1,
		),		
		'images' => array(	
			'main' => array(
				'name_category' => 'Imágene principal',
				'index' => true,
				'description' => false,
				'sizes' => array('158_107'),
			),			
			'gallery' => array(
				'name_category' => 'Imágenes en galería',
				'sizes' => array('60_60', '1024_1024'),
			),
		),		
		'fields' => array(			
			'names' => array(
				'name' => 'Nombre',
				'points' => 'Puntos',
				'award_category_id' => 'Categoría',
				'new' => 'Nuevo',
				'description' => 'Descripción',
			),
			'filter' => array('name', 'award_category_id'),
		),
	);


	function getAll($award_category_id) {
		$awards = $this->find('all', array(
			'conditions' => array('Award.award_category_id' => $award_category_id),
			'contain' => array(
				'BrwImage', 				 
				'AwardCategory'
			),
			'order' => array('Award.points desc')	
		));
		return $awards;
	}


	


}