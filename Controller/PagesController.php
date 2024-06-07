<?php

class PagesController extends AppController {

	function view($id, $slug = null) {
		$page = $this->Page->get($id);
		if (empty($page)) {
			throw new NotFoundException('Could not find that page');
		}

		$realSlug = strtolower(Inflector::slug($page['Page']['title'], '-'));
		if ($realSlug != $slug) {
			$this->redirect(array('controller' => 'pages', 'action' => 'view', $id, $realSlug), 301);
		}

		$this->pageTitle = $page['Page']['title'];
		$this->set('page', $page);
	}

	function home() {
		$this->loadModel('Post');
		$posts = $this->Post->getHighlighted(3);
		$this->set('posts', $posts);

		$this->loadModel('Pdf');
		$pdf = $this->Pdf->get();
		$this->set('pdf', $pdf);

	}

	function empresa() {
		$page = $this->Page->get(1);
		if (empty($page)) {
			throw new NotFoundException('Could not find that page');
		}	

		$this->pageTitle = $page['Page']['title'];
		$this->set(array(
			'page'=> $page,			
		));		
	}

	function certificacion() {
		$page = $this->Page->get(2);
		if (empty($page)) {
			throw new NotFoundException('Could not find that page');
		}	

		$this->pageTitle = $page['Page']['title'];
		$this->set(array(
			'page'=> $page,			
		));		
	}

	function ubicacion() {
		
	}


	
}