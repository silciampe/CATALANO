<?php

class Product extends AppModel {
	var $name = 'Product';
	var $order = array('Product.marca', 'Product.modelo * 1', 'Product.dtes');
	var $brwConfig = array(
		'names' => array(
			'plural' => 'Motopartes',
			'singular' => 'Motoparte',
			'gender' => 1,
		),		
		'fields' => array(
			'filter' => array('id_catalano' => true, 'codigo_original'=> true, 'grupo', 'marca', 'modelo'),
		),
		'paginate' => array(
			'fields' => array('id', 'id_catalano', 'grupo', 'marca', 'modelo'),
		),
		'actions' => array(
			'export' => true,
			'import' => true,
		),
		'export' => array('type' => 'xlsx'),
	);

	

	function getAll($grupo, $id_catalano, $codigo_original, $marca, $modelo, $dtes, $cad, $diam_int, $diam_ex, $can_diam, $diam_rod, $paso_esp, $est_x_esp) {
		$conditions = array();
		
		if (!empty($grupo)) {
			$conditions['Product.grupo'] = $grupo;
		}

		if (!empty($id_catalano)) {
			$conditions['Product.id_catalano'] = $id_catalano;
		}

		if (!empty($codigo_original)) {
			$conditions['Product.codigo_original LIKE'] = '%'.$codigo_original.'%';
		}

		if (!empty($marca)) {
			$conditions['Product.marca LIKE'] = '%'.$marca.'%';
		}

		if (!empty($modelo)) {
			$conditions['Product.modelo LIKE'] = '%'.$modelo.'%';
		}

		if (!empty($dtes)) {
			$conditions['Product.dtes'] = $dtes;
		}

		if (!empty($cad)) {
			$conditions['Product.cad'] = $cad;
		}

		if (!empty($diam_int)) {
			$conditions['Product.diam_int'] = $diam_int;
		}

		if (!empty($diam_ex)) {
			$conditions['Product.diam_ex'] = $diam_ex;
		}

		if (!empty($can_diam)) {
			$conditions['Product.can_diam LIKE'] = '%'.$can_diam.'%';
		}		

		if (!empty($diam_rod)) {
			$conditions['Product.diam_rod'] = $diam_rod;
		}

		if (!empty($paso_esp)) {
			$conditions['Product.paso_esp LIKE'] = '%'.$paso_esp.'%';
		}

		if (!empty($est_x_esp)) {
			$conditions['Product.est_x_esp LIKE'] = '%'.$est_x_esp.'%';
		}

		$products = $this->find('all', array(
			'conditions' => $conditions,			
		));
		return $products;
	}

	function getHightlighted($amount = 6) {
		return $this->find('all', array(
			'conditions' =>	array(
				'Product.enabled' => 1,
				'Product.hightlighted' => 1,
			),
			'contain' => array('BrwImage'),
			'limit' => $amount,
		));
	}

	function haveAny($products, $grupo) {
		if (empty($products)) {
			return false;
		}
		foreach ($products as $product) {
			if ($product['Product']['grupo'] == $grupo) {
				return true;
			}
		}
		return false;
	}	

	function  marcasList($grupo) {
		$marcas = array();
		$marcasList = $this->find('list', array(
			'conditions' => array(
				'grupo' => $grupo,
				'marca NOT' => null,
			),
			'fields' => array('marca'),
			'group' => 'marca'
		));
		foreach ($marcasList as $key => $marca) {
			$marcas[$marca] = $marca;
		}
		return $marcas;
	}


	function  modelosList($grupo, $marca) {
		$modelos = array();
		$modelosList = $this->find('list', array(
			'conditions' => array(
				'grupo' => $grupo,
				'marca' => $marca,
				'modelo NOT' => null,
			),
			'fields' => array('modelo'),
			'group' => 'modelo'
		));
		foreach ($modelosList as $key => $modelo) {
			$modelos[$modelo] = $modelo;
		}		
		return $modelos;
	}

	public function brwImport($data) {
		if (empty($data['Content']['file']) or $data['Content']['file']['error'] != 0) {
			return array(
				'result' => false,
				'msg' => 'Error al subir el archivo. Intente nuevamente.',
			);
		}
		if (!file_exists($data['Content']['file']['tmp_name'])) {
			return false;
		}
		$info = pathinfo($data['Content']['file']['name']);
		$ext = strtolower($info['extension']);
		$this->deleteAll(array('id NOT' => null));
		$productos = file($data['Content']['file']['tmp_name']);
		foreach ($productos as $key => $producto) {
			$producto = str_replace('"', '', $producto);
			$dataExplode = explode(',', $producto);
			$grupo = null;
			$grupoData = trim($dataExplode[0]);
			$grupoData = (string) $grupoData; 
			$grupoData = utf8_decode($grupoData);
		
			switch ($grupoData) {
				case 'CORONAS':
					$grupo = 'CORONA';
					$dataSave = array(
						'id' => null,
						'id_catalano' => trim($dataExplode[1]),
						'grupo' => $grupo,
						'marca' => trim($dataExplode[2]),
						'modelo' => trim($dataExplode[3]),
						'dtes' => trim($dataExplode[4]),
						'cad' => trim($dataExplode[5]),
						'diam_int' => trim($dataExplode[6]),
						'diam_ex' => trim($dataExplode[7]),
						'can_diam' => trim($dataExplode[8]),
						'codigo_original' => trim($dataExplode[9]),
						'imagen' => strtolower(trim($dataExplode[10])),				
					); 
					break;
				case 'PI?ONES':
					$grupo = 'PIÑON';	
					$dataSave = array(
						'id' => null,
						'id_catalano' => trim($dataExplode[1]),
						'grupo' => $grupo,
						'marca' => trim($dataExplode[2]),
						'modelo' => trim($dataExplode[3]),
						'dtes' => trim($dataExplode[4]),
						'cad' => trim($dataExplode[5]),
						'diam_int' => trim($dataExplode[6]),
						'diam_ex' => trim($dataExplode[7]),
						'diam_rod' => trim($dataExplode[8]),
						'paso_esp' => trim($dataExplode[9]),
						'est_x_esp' => trim($dataExplode[10]),
						'codigo_original' => trim($dataExplode[11]),
						'imagen' => strtolower(trim($dataExplode[12])),				
					); 
					break;
			}
			if (!empty($dataSave)) {
				$this->save($dataSave);
			}
			$dataSave = null;
		}
		return array(
			'result' => true,
			'msg' => 'Se importo el archivo con exito.',
		);		
	}


	function get($id_catalano) {
		return $this->find('first', array(
			'conditions' =>	array(
				'Product.id_catalano' => $id_catalano,
			),
		));
	}


}