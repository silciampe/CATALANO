<div class="image-header clearfix"></div>
<div class="boton-big clearfix">
	<div class="conatain-botom"> 
		<ul class="row">
			<li class="col-sm-4"><a class="moto" href="<?php echo $pdf['BrwFile']['moto']['path']; ?>" target="_blanck"><img src="<?php echo Router::url('/img/Boton-catalgo-motos.png'); ?>"/></a></li>
			<li class="col-sm-4"><a class="agro" href="<?php echo $pdf['BrwFile']['agro']['path']; ?>" target="_blanck"><img src="<?php echo Router::url('/img/Boton-catalgo-agro.png'); ?>"/></a></li>
			<li class="col-sm-4"><a class="novedades" href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'index')); ?>"><img src="<?php echo Router::url('/img/Boton-novedades.png'); ?>"/></a></li>
		</ul>
	</div>	
</div>
<div class="section-empresa">
	<div class="row">
		<div class="col-md-6 col-sm-6 nopadding">
			<div class="img-empresa">
				<a class="novedades" href="<?php echo $this->Html->url('/'); ?>"><img src="<?php echo Router::url('/img/EMPRESA.jpg'); ?>" class="img-responsive" /></a>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 nopadding">
			<div class="derecha">
				<div class="empresa-historia">
					<a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'empresa')); ?>">Historia</a>
				</div>
				<div class="certificados clearfix">
					<div class="conatain-certificados clearfix"> 
						<ul class="clearfix">
							<li><a class="iram" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'certificacion')); ?>"><img src="<?php echo Router::url('/img/iram.png'); ?>"/></a></li>
							<li><a class="IQnet" href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'certificacion')); ?>"><img src="<?php echo Router::url('/img/iqnet.png'); ?>"/></a></li>
						</ul>
					</div>				
				</div>
			</div>
		</div>
	</div>
</div>
<div class="catalogo-moto-home clearfix">
	<h1>Motopartes</h1>
	<div class="catalogo-link">
		<p>Catálogo Moto</p>
		<a class="bajar bajarMoto" href="<?php echo $pdf['BrwFile']['moto']['path']; ?>" download="<?php echo $pdf['BrwFile']['moto']['name']; ?>"><i class="fa fa-chevron-circle-down"></i> Bajar</a>
		<a class="vermas vermasMoto" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'catalogo')); ?>"><i class="fa fa-plus-circle"></i> Ver mas</a>	
	</div>
</div>
<div class="catalogo-agro-home clearfix">
	<h1>Agropartes</h1>
	<div class="catalogo-link">
		<p>Catálogo Agro</p>
		<a class="bajar bajarAgro" target="_blanck" href="<?php echo $pdf['BrwFile']['agro']['path']; ?>" download="<?php echo $pdf['BrwFile']['agro']['name']; ?>"><i class="fa fa-chevron-circle-down"></i> Bajar</a>
		<a class="vermas vermasAgro" href="<?php echo $this->Html->url(array('controller' => 'agropartes', 'action' => 'index')); ?>"><i class="fa fa-plus-circle"></i> Ver mas</a>	
	</div>
</div>
<div class="club clearfix">
	<div class="row">
		<div class="col-md-3 col-sm-6">
			<h2>BENEFICIOS!</h2>
		</div>
		<div class="col-md-3 col-sm-6">
			<img src="<?php echo Router::url('/img/logo-club.png'); ?>" class="img-responsive" />
		</div>
		<div class="col-md-3 col-sm-6">
			<a class="clientes btn-club" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>">Clientes</a>
		</div>
		<div class="col-md-3 col-sm-6">
			<a class="personal btn-club" href="<?php echo $this->Html->url(array('controller' => 'personals', 'action' => 'login')); ?>">Personal Catalano</a>
		</div>
	</div>
</div>
<?php if (!empty($posts)) { ?>
	<div class="noticias-section">
		<h1>noticias</h1>
		<div class="lista-noticias">
			<?php foreach ($posts as $post) {
				$slug = strtolower(Inflector::slug($post['Post']['title'], '-'));
				$url = $this->Html->url(array('controller' => 'posts', 'action' => 'view', $post['Post']['id'], $slug));
			?>		
				<div class="row">
					<div class="col-sm-3">
						<div class="index-image">
							<?php if (!empty($post['BrwImage']['main'])): ?>
							<a href="<?php echo $url; ?>" title="'<?php echo $post['Post']['title']; ?>">
								<img src="<?php echo reset($post['BrwImage']['main']['sizes']); ?>" alt="<?php echo $post['Post']['title']; ?>" />
							</a>
							<?php endif ?>
						</div>
					</div>
					<div class="col-sm-9">
						<div class=" info-post">
							<h2><a href="<?php echo $url; ?>"><?php echo $post['Post']['title'] ?></a></h2>
							<p class="index-date">
								<?php echo $this->Time->format($date_format, $post['Post']['publication_date']); ?>
							</p>					
							<p class="_abstract"><?php echo $post['Post']['abstract']; ?></p>
							<div class="html_text">
								<?php echo $post['Post']['text'] ?>
							</div>
							<a class="vermaspost" href="<?php echo $url; ?>">Ver más..</a>
						</div>
					</div>
				</div>
			<?php } ?>	
		</div>
	</div>
<?php } ?>	