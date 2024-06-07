<?php

class Pdf extends AppModel {
	
	var $brwConfig = array(
		'names' => array(
			'plural' => 'PDFs',
			'singular' => 'PDF',
			'gender' => 1,
		),		
		'files' => array(
			'moto' => array(
				'name_category' => 'Motoparte',
				'index' => true,
				'description' => false
			),
			'agro' => array(
				'name_category' => 'Agroparte',
				'index' => true,
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
		$pdf = $this->find('first', array(
			'conditions' => array('Pdf.id' => 1),
			'contain' => array(
				'BrwFile', 				
			),
		));
		return $pdf;
	}

}