<?php

class ProductsController extends AppController {

	var $name = 'Products';


	function search_filter_redirect() {
		$grupo = $grupoDirecta =$id_catalano = $codigo_original = $marca = $marcaDirecta = $modelo = $modeloDirecta  = $dtes =  $cad = $diam_int = $diam_ex = $can_diam = $diam_rod = $paso_esp = $est_x_esp = null;
		if (!empty($this->data['Product']['grupo']) and ($this->data['Product']['grupo'] == 'CORONA' OR $this->data['Product']['grupo'] == 'PIÑON')) {
			$grupo = $this->data['Product']['grupo'];			
		}

		if (!empty($this->data['Product']['grupoDirecta']) and ($this->data['Product']['grupoDirecta'] == 'CORONA' OR $this->data['Product']['grupoDirecta'] == 'PIÑON')) {
			$grupoDirecta = $this->data['Product']['grupoDirecta'];			
		}

		if (!empty($this->data['Product']['id_catalano'])) {
			$id_catalano = $this->data['Product']['id_catalano'];			
		}

		if (!empty($this->data['Product']['codigo_original'])) {
			$codigo_original = $this->data['Product']['codigo_original'];			
		}	

		if (!empty($this->data['Product']['marca'])) {
			$marca = $this->data['Product']['marca'];			
		}

		if (!empty($this->data['Product']['marcaDirecta'])) {
			$marcaDirecta = $this->data['Product']['marcaDirecta'];			
		}

		if (!empty($this->data['Product']['modelo'])) {
			$modelo = $this->data['Product']['modelo'];			
		}

		if (!empty($this->data['Product']['modeloDirecta'])) {
			$modeloDirecta = $this->data['Product']['modeloDirecta'];			
		}

		if (!empty($this->data['Product']['dtes'])) {
			$dtes = $this->data['Product']['dtes'];			
		}

		if (!empty($this->data['Product']['cad'])) {
			$cad = $this->data['Product']['cad'];			
		}

		if (!empty($this->data['Product']['diam_int'])) {
			$diam_int = $this->data['Product']['diam_int'];			
		}

		if (!empty($this->data['Product']['diam_ex_corona'])) {
			$diam_ex = $this->data['Product']['diam_ex_corona'];						
		}

		if (!empty($this->data['Product']['diam_ex_pinion'])) {
			$diam_ex = $this->data['Product']['diam_ex_pinion'];						
		}

		if (!empty($this->data['Product']['can_diam'])) {
			$can_diam = $this->data['Product']['can_diam'];			
		}

		if (!empty($this->data['Product']['diam_rod'])) {
			$diam_rod = $this->data['Product']['diam_rod'];			
		}

		if (!empty($this->data['Product']['paso_esp'])) {
			$paso_esp = $this->data['Product']['paso_esp'];			
		}

		if (!empty($this->data['Product']['est_x_esp'])) {
			$est_x_esp = $this->data['Product']['est_x_esp'];			
		}

		$this->redirect(array(
			'controller' => 'products',
			'action' => 'index',
			'grupo' => $grupo,
			'grupoDirecta' => $grupoDirecta,
			'id_catalano' => $id_catalano,
			'codigo_original' => $codigo_original,
			'marca' => $marca,
			'marcaDirecta' => $marcaDirecta,
			'modelo' => $modelo,
			'modeloDirecta' => $modeloDirecta,
			'dtes' => $dtes,						
			'cad' => $cad,						
			'diam_int' => $diam_int,						
			'diam_ex' => $diam_ex,						
			'can_diam' => $can_diam,						
			'diam_rod' => $diam_rod,						
			'paso_esp' => $paso_esp,						
			'est_x_esp' => $est_x_esp,						
		));
	}


	function index() {		
		$grupo = $id_catalano = $codigo_original = $modelo = $marca = $dtes = $cad = $diam_int = $diam_ex = $can_diam = $diam_rod = $paso_esp = $est_x_esp = null;

		if (!empty($this->params['named']['grupo'])) {
			$this->request->data['Product']['grupo'] = $grupo = $this->params['named']['grupo'];
		}

		if (!empty($this->params['named']['grupoDirecta'])) {
			$this->request->data['Product']['grupoDirecta'] = $grupo = $this->params['named']['grupoDirecta'];
		}

		if (!empty($this->params['named']['id_catalano'])) {
			$this->request->data['Product']['id_catalano'] = $id_catalano = $this->params['named']['id_catalano'];
		}

		if (!empty($this->params['named']['codigo_original'])) {
			$this->request->data['Product']['codigo_original'] = $codigo_original = $this->params['named']['codigo_original'];
		}

		if (!empty($this->params['named']['marca'])) {
			$this->request->data['Product']['marca'] = $marca = $this->params['named']['marca'];
		}

		if (!empty($this->params['named']['marcaDirecta'])) {
			$this->request->data['Product']['marcaDirecta'] = $marca = $this->params['named']['marcaDirecta'];
		}

		if (!empty($this->params['named']['modelo'])) {
			$this->request->data['Product']['modelo'] = $modelo = $this->params['named']['modelo'];
		}	

		if (!empty($this->params['named']['modeloDirecta'])) {
			$this->request->data['Product']['modeloDirecta'] = $modelo = $this->params['named']['modeloDirecta'];
		}		

		if (!empty($this->params['named']['dtes'])) {
			$this->request->data['Product']['dtes'] = $dtes = $this->params['named']['dtes'];
		}	

		if (!empty($this->params['named']['cad'])) {
			$this->request->data['Product']['cad'] = $cad = $this->params['named']['cad'];
		}

		if (!empty($this->params['named']['diam_int'])) {
			$this->request->data['Product']['diam_int'] = $diam_int = $this->params['named']['diam_int'];
		}

		if (!empty($this->params['named']['diam_ex']) and !empty($this->params['named']['grupo']) and $this->params['named']['grupo'] == 'CORONA') {
			$this->request->data['Product']['diam_ex_corona'] = $diam_ex = $this->params['named']['diam_ex'];
		}		

		if (!empty($this->params['named']['diam_ex']) and !empty($this->params['named']['grupo']) and $this->params['named']['grupo'] == 'PIÑON') {
			$this->request->data['Product']['diam_ex_pinion'] = $diam_ex = $this->params['named']['diam_ex'];
		}

		if (!empty($this->params['named']['can_diam'])) {
			$this->request->data['Product']['can_diam'] = $can_diam = $this->params['named']['can_diam'];
		}

		if (!empty($this->params['named']['diam_rod'])) {
			$this->request->data['Product']['diam_rod'] = $diam_rod = $this->params['named']['diam_rod'];
		}

		if (!empty($this->params['named']['paso_esp'])) {
			$this->request->data['Product']['paso_esp'] = $paso_esp = $this->params['named']['paso_esp'];
		}

		if (!empty($this->params['named']['est_x_esp'])) {
			$this->request->data['Product']['est_x_esp'] = $est_x_esp = $this->params['named']['est_x_esp'];
		}

		$products = $this->Product->getAll($grupo, $id_catalano, $codigo_original, $marca, $modelo, $dtes, $cad, $diam_int, $diam_ex, $can_diam, $diam_rod, $paso_esp, $est_x_esp);

		$this->set(array(
			'products' => $products,
			'haveAnyCorona' => $this->Product->haveAny($products, 'CORONA'),
			'haveAnyPiñon' => $this->Product->haveAny($products, 'PIÑON'),
		));
	}

	function marcas($grupo) {
		$this->layout = 'ajax';
		$this->set(array(						
			'marcas' => $this->Product->marcasList($grupo),				
		));
	}

	function modelos($grupo, $marca) {
		$this->layout = 'ajax';
		$this->set(array(						
			'modelos' => $this->Product->modelosList($grupo, $marca),				
		));
	}

	
	function hightlighted() {
		$products = $this->Product->HighlightedProduct->find('all',array(
			'contain' => array(
				'Product' => array(
					'conditions' => array('Product.enabled' => 1),
					'BrwImage',
				),
			)
		));
		foreach ($products as $i => $product) {
			$products[$i]['BrwImage'] = $product['Product']['BrwImage'];
		}
		/*pr($products);

		$conditions = array(
			'Product.enabled' => 1,
			'Product.hightlighted' => 1,
		);

		$this->paginate = array(
			'conditions' => $conditions,
			'limit' => 12,
			'contain' => array('BrwImage'),
		);
		$products = $this->paginate('Product');
		pr($products);*/
		$this->set('products', $products);

		$crumb = array(__('Productos destacados', true) => array('controller' => 'products', 'action' => 'hightlighted'),
//			$info_client['Client']['title'], array()
		);
		$this->set('crumb', $crumb);
	}


	function catalogo() {

	}


}