<?php

class OrderTextsController extends AppController {

	public function view($id) {
		$txt = $this->OrderText->read(null, $id);
		$this->set('txt', $txt['OrderText']);
		$this->pageTitle = $txt['OrderText']['title'];
	}

}