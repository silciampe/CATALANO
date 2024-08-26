<?php

class AgropartesController extends AppController {


	function index($slug = null) {		
		$this->pageTitle = 'Agropartes';
		$agroparte = $this->Agroparte->get();
		$this->set(array(
			'agroparte' => $agroparte,
		));
	}


	

}