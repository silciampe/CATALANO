<?php

class PostsController extends AppController {


	function index($slug = null) {		
		$this->pageTitle = 'Blog';
		$this->set(array(
			'posts' => $this->Post->getAll(),
		));
	}


	function view($id, $slug = null) {
		$post = $this->Post->get($id);
		if (empty($post)) {
			throw new NotFoundException('Could not find that page');
		}
		$realSlug = strtolower(Inflector::slug($post['Post']['title'], '-'));
		if ($realSlug != $slug) {
			$this->redirect(array('controller' => 'posts', 'action' => 'view', $id, $realSlug), 301);
		}
		$this->set(array('post' => $post));
		$this->pageTitle = $post['Post']['title'];
	}

}