<?php

class Post extends AppModel {

	public $order = 'Post.publication_date desc, Post.id desc';

	public $brwConfig = array(
		'names' => array(
			'plural' => 'Artículos de blog',
			'singular' => 'Artículo de blog',
			'gender' => 1,
		),
		'paginate' => array(
			'fields' => array('id', 'title', 'publication_date', 'enabled', 'highlighted'),
		),
		'images' => array(
			'main' => array(
				'name_category' => 'Imagen principal',
				'sizes' => array('222x222', '339_999'),
				'index' => true,
				'description' => false
			),			
			'gallery' => array(
				'name_category' => 'Imágenes en galería',
				'sizes' => array('110_110', '1024_1024'),
			),
		),
		'files' => array(
			'list' => array(
				'name_category' => 'Archivos adjuntos',
				'index' => false,
				'description' => true
			),
		),
		'custom_actions' => array(
			'view_online' => array(
				'url' => array('controller' => 'posts', 'action' => 'view'),
				'options' => array('target' => '_blank'),
			),
		),
		'fields' => array(
			'no_sanitize_html' => array('title'),
			'names' => array(
				'publication_date' => 'Fecha de publicación',
			),
		),
	);


	function get($id) {
		$posts = $this->find('first', array(
			'conditions' => array('Post.id' => $id),
			'contain' => array(
				'BrwImage', 
				'BrwFile', 				
			),
		));
		return $posts;
	}


	function getHighlighted($amount = 6) {
		return $this->find('all', array(
			'conditions' =>	array(
				'Post.enabled' => 1,
				'Post.highlighted' => 1,
				'Post.publication_date <=' => date("Y-m-d"),
			),
			'contain' => array('BrwImage'),
			'limit' => $amount,
		));
	}


	function getAll() {
		return $this->find('all', array(
			'conditions' => array(
				'Post.enabled' => 1,
				'Post.publication_date <=' => 'now()',
			),
			'contain' => array('BrwImage'),
		));		
	}


}