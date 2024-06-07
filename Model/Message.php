<?php
class Message extends AppModel {

	var $name = 'Message';
	var $displayField = 'email';

    var $validate = array(
        'email' => array(
			'allowEmpty' => false,
           	'rule' => array('email', true),
		),
		'name' => array(
			'allowEmpty' => false,
           	'rule' => array('minLength', '1'),
		)
    );

	var $brwConfig = array(
    	'names' => array(
			'singular' => 'Mensaje recibido',
			'plural' => 'Mensajes recibidos',
			'gender' => 1,
		),
		'actions' => array(
			'add' => false,
			'edit' => false,
			'delete' => true,
		),
    );

	function send($data){
		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail();
		
		$MessageRecipient = ClassRegistry::init('Recipient');
		$recipient = $MessageRecipient->getAll();		
		if (!empty($data['subject'])) {
			$subject = Configure::read('brwSettings.companyName').' - '.$data['subject'];
		} else {
			$subject = Configure::read('brwSettings.companyName');
		}
		$email->viewVars(array(
			'mensaje' => $data['message'],
			'nombre' => $data['name'],
			'email' => $data['email'],
			'telefono' => $data['telephone'],			
		));
		$email->from(array($data['email'] => $data['name']));
		$email->to($recipient);		
		$email->subject($subject);
		$email->template('message');
		if (!empty($data['archivo'])) {
			$email->attachments(array(
				$data['archivo']['name'] => array(
					'file' => $data['archivo']['tmp_name'],
					'mimetype' => $data['archivo']['type'],					
				)
			));
		}
		$email->emailFormat('html');
		//$email->transport('Debug'); //lo descomentamos cuando tenemos que usar pruebas en local.
		return $result = $email->send();
	}
	
}
