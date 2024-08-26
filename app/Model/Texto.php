<?php

class Texto extends AppModel {

	var $name = 'Texto';
	var $displayField = 'title';
	
	var $brwConfig = array(
		'names' => array(
			'plural' => 'Páginas',
			'singular' => 'Página',
			'gender' => 2,
		),
		'fields' => array(
			'no_edit' => array('key'),			
		),	
		'actions' => array(
			'add' => false,
			'delete' => false,
			'edit' => true,
		),		
		'files' => array(
			'list' => array(
				'name_category' => 'Archivos adjuntos',
				'index' => false,
				'description' => true,
			),
		),
	);

	function get($id) {
		$texto = $this->find('first', array(
			'conditions' => array('id' => $id),
			'contain' => 'BrwFile',
		));
		return $texto;
	}

	function getByKey($key) {
		$texto = $this->find('first', array(
			'conditions' => array('key' => $key),
			'contain' => 'BrwFile',
		));
		return $texto;
	}

}