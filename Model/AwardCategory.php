<?php

class AwardCategory extends AppModel {

	public $hasMany = array('Award');
	public $displayField = 'name';
	public $brwConfig = array(
		'names' => array(
			'plural' => 'Categorías de premios',
			'singular' => 'Categoría de premios',
			'gender' => 2,
		),
		'fields' => array(
			'names' => array(
				'name' => 'Nombre',
			),
		),
		'actions' => array(
			'delete' => false,
			'add' => false,
			'edit' => false,
		),		
	);

	public function get($id) {
		return $this->find('first', array('conditions' => array('AwardCategory.id' => $id)));
	}
}