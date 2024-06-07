<?php if (AuthComponent::user()): ?>
	<a class="salir" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>">Salir</a>		 
<?php  endif; ?>
