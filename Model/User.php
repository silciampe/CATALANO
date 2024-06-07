<?php
class User extends AppModel {

	public $brwConfig = array(
		'names' => array(
			'plural' => 'Clientes',
			'singular' => 'Cliente',
			'gender' => 1,
		),		
		'fields' => array(
			'filter' => array('id' => true, 'razon_social'),
		),
		'actions' => array(
			'import' => true,
		),
	);

	public function beforeSave($options = array()) {
		if (!empty($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return parent::beforeSave();
	}

	public function afterFind($results, $primary = false) {
		$results = $this->_addHash($results);
		return $results;
	}

	public function _addHash($results) {
		foreach ($results as $key => $value) {
			if (!empty($value[$this->alias]['id']) and !empty($value[$this->alias]['email']) and !empty($value[$this->alias]['created'])) {
				$hash = AuthComponent::password($value[$this->alias]['id'] . $value[$this->alias]['email'] . $value[$this->alias]['created']);
				$results[$key][$this->alias]['hash'] = $hash;
			}
		}
		return $results;
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
		$puntos = file($data['Content']['file']['tmp_name']);
		foreach ($puntos as $key => $punto) {
			$punto = str_replace('"', '', $punto);
			$dataExplode = explode('¦', $punto);
			$fecha=explode("/",trim($dataExplode[5]));
			$fecha=$fecha[2]."-".$fecha[1]."-".$fecha[0];
			$dataSave = array(
				'id' => $dataExplode[0],
				'razon_social' => trim($dataExplode[1]),
				'puntos_moto' => trim($dataExplode[2]),
				'puntos_agro' => trim($dataExplode[3]),
				'cuit' => trim($dataExplode[4]),
				'password' => trim($dataExplode[0]),
				'fecha_actualizacion' => $fecha,
				'rubro' => trim($dataExplode[6]),
				'email' => trim($dataExplode[7]),
			); 

			$this->save($dataSave);
				
		}
		return array(
				'result' => true,
				'msg' => 'Se importo el archivo con exito.',
			);		
	}

}