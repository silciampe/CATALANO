<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array('controller' => 'users', 'action' => 'login')) ?>
<?php
	echo $this->Form->input('cuit', array('label' => 'Usuario', 'div' => array('class' => 'clearfix input text')));
	echo $this->Form->input('password', array('label' => 'Clave', 'div' => array('class' => 'clearfix input password')));
?>
<?php echo $this->Form->end(__('Ingresar'));?>