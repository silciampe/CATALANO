<?php if (AuthComponent::user()): ?>
	<p>
		<span class="welcome">Bienvenido:</span>
		<span class="name"><?php echo AuthComponent::user('razon_social'); ?></span>
		<a class="salir" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>">Salir</a>
	</p>	 
<?php  endif; ?>
