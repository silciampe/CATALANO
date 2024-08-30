<?php

class AgroProduct extends AppModel
{
	var $name = 'AgroProduct';
	var $order = array('AgroProduct.marca', 'AgroProduct.modelo * 1', 'AgroProduct.dtes');
	var $brwConfig = array(
		'names' => array(
			'plural' => 'Productos de Agro',
			'singular' => 'Producto de Agro',
			'gender' => 1,
		),
		'fields' => array(
			'filter' => array('id_catalano' => true, 'grupo', 'marca', 'modelo'),
		),
		'paginate' => array(
			'fields' => array(
				'id', 'id_catalano', 'grupo', 'marca', 'modelo', 'med_cub', 'diam_int', 'diam_ex', 'can_diam', 'marca', 'esp_mm'
			),
		),
		'actions' => array(
			'export' => true,
			'import' => true,
		),
		'export' => array('type' => 'xlsx'),
	);



	function getAll($grupo, $id_catalano, $codigo_original, $marca, $modelo, $dtes, $cad, $diam_int, $diam_ex, $can_diam, $diam_rod, $paso_esp, $est_x_esp)
	{
		$conditions = array();

		if (!empty($grupo)) {
			$conditions['AgroProduct.grupo'] = $grupo;
		}

		if (!empty($id_catalano)) {
			$conditions['AgroProduct.id_catalano'] = $id_catalano;
		}

		if (!empty($codigo_original)) {
		     $conditions['AgroProduct.codigo_original LIKE'] = '%' . $codigo_original . '%';
		}

		if (!empty($marca)) {
		     $conditions['AgroProduct.marca LIKE'] = '%' . $marca . '%';
		}

		if (!empty($modelo)) {
		    $conditions['AgroProduct.modelo LIKE'] = '%' . $modelo . '%';
		 }

		 if (!empty($dtes)) {
		    $conditions['AgroProduct.dtes'] = $dtes;
		 }

		if (!empty($cad)) {
		    $conditions['AgroProduct.cad'] = $cad;
		}

		if (!empty($diam_int)) {
		     $conditions['AgroProduct.diam_int'] = $diam_int;
		}

		if (!empty($diam_ex)) {
		    $conditions['AgroProduct.diam_ex'] = $diam_ex;
		}

		if (!empty($can_diam)) {
		    $conditions['AgroProduct.can_diam LIKE'] = '%' . $can_diam . '%';
		}

		if (!empty($diam_rod)) {
		    $conditions['AgroProduct.diam_rod'] = $diam_rod;
		}

		if (!empty($paso_esp)) {
		    $conditions['AgroProduct.paso_esp LIKE'] = '%' . $paso_esp . '%';
		}
	
		if (!empty($est_x_esp)) {
		     $conditions['AgroProduct.est_x_esp LIKE'] = '%' . $est_x_esp . '%';
		}
		$products = $this->find('all', array(
			'conditions' => $conditions,
		));
		return $products;
	}

	// function getHightlighted($amount = 6)
	// {
	//     return $this->find('all', array(
	//         'conditions' =>    array(
	//             'AgroProduct.enabled' => 1,
	//             'AgroProduct.hightlighted' => 1,
	//         ),
	//         'contain' => array('BrwImage'),
	//         'limit' => $amount,
	//     ));
	// }

	// function haveAny($products, $grupo)
	// {
	//     if (empty($products)) {
	//         return false;
	//     }
	//     foreach ($products as $product) {
	//         if ($product['AgroProduct']['grupo'] == $grupo) {
	//             return true;
	//         }
	//     }
	//     return false;
	// }

	// function marcasList($grupo)
	// {
	//     $marcas = array();
	//     $marcasList = $this->find('list', array(
	//         'conditions' => array(
	//             'grupo' => $grupo,
	//             'marca NOT' => null,
	//         ),
	//         'fields' => array('marca'),
	//         'group' => 'marca'
	//     ));
	//     foreach ($marcasList as $key => $marca) {
	//         $marcas[$marca] = $marca;
	//     }
	//     return $marcas;
	// }


	// function modelosList($grupo, $marca)
	// {
	//     $modelos = array();
	//     $modelosList = $this->find('list', array(
	//         'conditions' => array(
	//             'grupo' => $grupo,
	//             'marca' => $marca,
	//             'modelo NOT' => null,
	//         ),
	//         'fields' => array('modelo'),
	//         'group' => 'modelo'
	//     ));
	//     foreach ($modelosList as $key => $modelo) {
	//         $modelos[$modelo] = $modelo;
	//     }
	//     return $modelos;
	// }

	public function brwImport($data)
	{
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
		// echo '<pre>';

		foreach ($productos as $key => $producto) {
			$producto = str_replace('"', '', $producto);
			$dataExplode = explode(',', $producto);
			$grupo = null;
			$grupoData = trim($dataExplode[1]);
			$grupoData = (string) $grupoData;
			$grupoData = utf8_decode($grupoData);
			switch ($grupoData) {
				case 'MEDIAS LLANTAS NATURALES':
					$grupo = 'MEDIA LLANTA NATURAL';
					// print_r($dataExplode);
					$dataSave = array(
						'id' => null,
						'id_catalano' => trim($dataExplode[2]),
						'grupo' => $grupo,
						'modelo' => $grupo,
						'med_cub' => trim(
							mb_convert_encoding($dataExplode[3] . ' ' . $dataExplode[4], 'UTF-8', 'UTF-8')
						), // med cub
						'diam_int' => trim($dataExplode[5]),
						'diam_ex' => trim($dataExplode[6]), // diam E C
						'can_diam' => trim($dataExplode[7]), //cant diametros por agujero
						'marca' => trim($dataExplode[8]),
						'esp_mm' => trim($dataExplode[9]), // esp MM
						'imagen' => strtolower(trim($dataExplode[10])),
					);
					break;
				case 'DISCOS DENT ASA 40':
				case 'DISCOS DENT ASA 50':
				case 'DISCOS DENT ASA 60':
				case 'DISCOS DENT ASA 80':
				case 'DISCOS DENT ASA 100':
					$dataSave = array(
						'id' => null,
						'id_catalano' => trim($dataExplode[2]),
						'grupo' => 'DISCOS DENTADOS',
						'modelo' => $grupoData,
						'dtes' => $dataExplode[3],
						'diam_int' => trim($dataExplode[4]),
						'imagen' => strtolower(trim($dataExplode[5])),
					);
					break;
				case 'DISCOS PLANOS LISOS':
				case 'CUCHILLAS PLANAS LISAS':
				case 'DISCOS PLANOS DENTADOS':
				case 'CUCHILLAS PLANAS DENTADAS':
				case 'DISCOS CONCAVOS DENTADOS':
				case 'DISCOS LLANTAS TAPADORES':
				case 'CUCHILLAS HELICOIDAL 18 ONDAS':
				case 'CUCHILLAS HELICOIDAL 31 ONDAS':
				case 'CUCHILLAS DURAFLUT 50 ONDAS':
				case 'DISCOS DE RASTRA':
				case 'CUCHILLAS DURAFLUT FILO LISO':
				case 'DISCOS Y CUCHILLAS ESPECIALES':
				
					// print_r($dataExplode);
					$dataSave = array(
						'id' => null,
						'id_catalano' => trim($dataExplode[2]),
						'grupo' => 'DISCOS Y CUCHILLAS',
						'modelo' => $grupoData,
						'diam_ex' => trim($dataExplode[3]),
						'esp_mm' => trim($dataExplode[4]), // esp MM
						'diam_int' => trim($dataExplode[5]),
						'can_diam' => trim($dataExplode[6]),
						'rad_mm' => trim($dataExplode[7]), // rad MM
						'observacion' => trim($dataExplode[8]), //observación
						'marca' => trim($dataExplode[9]),
						'imagen' => strtolower(trim($dataExplode[10])),
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
			'msg' => 'Se importo el archivo con éxito.',
		);
	}


	function get($id_catalano)
	{
		return $this->find('first', array(
			'conditions' =>    array(
				'AgroProduct.id_catalano' => $id_catalano,
			),
		));
	}
}
