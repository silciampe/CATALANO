<header class="main-header clearfix">
	<a class="logo" href="<?php echo $this->Html->url('/'); ?>"><img src="<?php echo Router::url('/img/logo.png'); ?>" /></a>
	<div class="header-menu">
		<ul class="sf-menu">
			<li>
				<a href="<?php echo Router::url(array('controller' => 'pages', 'action' => 'empresa')) ?>" class="empresa
			<?php if (!empty($selectedEmpresa)) {
				echo ' selected';
			} ?>
			">Empresa</a>
				<ul>
					<li><a href="<?php echo Router::url(array('controller' => 'pages', 'action' => 'empresa')) ?>">Historia</a></li>
					<li><a href="<?php echo Router::url(array('controller' => 'pages', 'action' => 'certificacion')) ?>">Certificacion</a></li>
					<li><a href="<?php echo Router::url(array('controller' => 'pages', 'action' => 'ubicacion')) ?>">Ubicacion</a></li>
				</ul>
			</li>
			<li><a href="<?php echo Router::url(array('controller' => 'products', 'action' => 'catalogo')) ?>" class="motopartes
			<?php if (!empty($selectedMotoPartes)) {
				echo ' selected';
			} ?>
			">Motopartes</a>
				<ul>
					<li><a href="<?php echo $pdf['BrwFile']['moto']['path']; ?>" target="_blank">Catalogo online</a></li>
					<li><a href="<?php echo Router::url(array('controller' => 'products', 'action' => 'catalogo')) ?>">Busqueda</a></li>
					
				</ul>
			</li>
				<li><a href="<?php echo Router::url(array('controller' => 'agropartes', 'action' => 'index')) ?>" class="agropartes
			<?php if (!empty($selectedAgroPartes)) {
				echo ' selected';
			} ?>
			">Agropartes</a>
				<ul>
					<li><a href="<?php echo $pdf['BrwFile']['agro']['path']; ?>" target="_blank">Catalogo online</a></li>
					<li><a href="<?php echo Router::url(array('controller' => 'agro_products', 'action' => 'catalogo')) ?>">Busqueda</a></li>
					<li><a href="<?php echo Router::url(array('controller' => 'agropartes', 'action' => 'index')) ?>">Imagenes</a></li>
				</ul>
			</li>
			<li>
				<a href="#" class="navegar
			<?php if (!empty($selectedClub)) {
				echo ' selected';
			} ?>
			">Club</a>
				<ul>
					<li><a href="<?php echo Router::url(array('controller' => 'users', 'action' => 'login')) ?>">Cliente</a></li>
					<li><a href="<?php echo Router::url(array('controller' => 'personals', 'action' => 'login')) ?>">Personal catalano</a></li>
				</ul>
			</li>
			<li><a href="<?php echo Router::url(array('controller' => 'posts', 'action' => 'index')) ?>" class="noticias
			<?php if (!empty($selectedNoticias)) {
				echo ' selected';
			} ?>
			">Novedades</a></li>
			<li><a href="<?php echo Router::url(array('controller' => 'messages', 'action' => 'send')) ?>" class="contacto
			<?php if (!empty($selectedMessages)) {
				echo ' selected';
			} ?>
			">Contacto</a></li>
		</ul>
	</div>

</header>
<div class="login-header">
	<?php echo $this->element('login_header'); ?>
</div>