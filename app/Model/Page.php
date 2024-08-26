<?php

class Page extends AppModel {

	var $name = 'Page';
	var $displayField = 'title';
	
	var $brwConfig = array(
		'names' => array(
			'plural' => 'Páginas',
			'singular' => 'Página',
			'gender' => 2,
		),
		'images' => array(
			'gallery' => array(
				'name_category' => 'Imágenes en galería',
				'sizes' => array(/*'120_120',*/ '346_196', '1024_1024'),
			),
		),	
		'fields' => array(
			'names' => array(
				'title' => 'Titulo',
				'text' => 'Texto',
			),
		),	
		'actions' => array(
			'add' => false,
			'delete' => false,
			'edit' => true,
		),		
	);

	function get($id) {
		$page = $this->find('first', array(
			'conditions' => array('Page.id' => $id),
			'contain' => array('BrwImage'),
		));
		return $page;
	}

}