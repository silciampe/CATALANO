<?php

class Album extends AppModel {

	public $order = 'Album.date desc, Album.id desc';

	public $brwConfig = array(
		'names' => array(
			'plural' => 'Álbumes de fotos',
			'singular' => 'Álbum de fotos',
			'gender' => 1,
		),		
		'images' => array(					
			'gallery' => array(
				'name_category' => 'Imágenes en galería',
				'sizes' => array('120_120', '1024_1024'),
			),
		),	
	);


	function get($id) {
		$album = $this->find('first', array(
			'conditions' => array('Album.id' => $id),
			'contain' => array(
				'BrwImage', 			
			),
		));
		return $album;
	}

	function getAll() {
		$album = $this->find('all', array(
			'conditions' => array('Album.enabled' => 1),			
		));
		return $album;
	}


}