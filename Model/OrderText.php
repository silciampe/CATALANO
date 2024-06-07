<?php
class OrderText extends AppModel {
	//public $displayField = 'titulo';
	public $order = 'OrderText.title asc';
/*
	public $validate = array(
        'titulo' => array(
			'allowEmpty' => false,
           	'rule' => array('minLength', '1')
		),
		'texto' => array(
			'allowEmpty' => false,
           	'rule' => array('minLength', '1')
		)
    );
*/
	public $brwConfig = array(
		'names' => array(
			'plural' => 'Textos de Carro de compras',
			'singular' => 'Texto'
		),
		'actions' => array(
			'add' => false,
			'delete' => false,
			'edit' => true,
		),
	);

}