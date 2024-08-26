<?php echo $this->Form->create('Personal', array('controller' => 'personals', 'action' => 'login')) ?>
<?php
	echo $this->Form->input('username', array('label' => 'Usuario', 'div' => array('class' => 'clearfix input text')));
	echo $this->Form->input('password', array('label' => 'Clave', 'div' => array('class' => 'clearfix input password')));
?>
<?php echo $this->Form->end(__('Ingresar'));?>