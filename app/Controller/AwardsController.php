<?php

class AwardsController extends AppController {


	function index() {
		if (!AuthComponent::user()) {
			$this->Session->setFlash('Debe estar logueado para poder ver los premios', 'flash_error');
			$redir = env('HTTP_REFERER');
			if (!$redir) {
				$redir = array('controller' => 'users', 'action' => 'login');
			}
			$this->redirect($redir);
		}
		$userId = AuthComponent::user('id');
		if (AuthComponent::user('rubro') == 5) {
			$awardCategoryId = AGRO;
			$puntos = AuthComponent::user('puntos_agro');
			$idtexto = 2;
		} else {
			$awardCategoryId = MOTO;
			$puntos = AuthComponent::user('puntos_moto');
			$idtexto = 1;
		}
		$this->loadModel('Texto');
		$texto = $this->Texto->get($idtexto);
		$awardCategory = $this->Award->AwardCategory->get($awardCategoryId);		
		$awards = $this->Award->getAll($awardCategoryId);
			
		$this->set(array(
			'puntos' => $puntos,			
			'awards' => $awards,			
			'award_category' => $awardCategory,	
			'awardCategoryId' => $awardCategoryId,
			'texto' => $texto,		
		));
	}
}