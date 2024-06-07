<div class="contain club_index clearfix
<?php 
if($awardCategoryId == AGRO): 
	echo ' green';
endif;
?>">
	<div>
		<?php //echo $this->element('logout'); ?>
	</div>
	<?php echo $this->Session->flash('auth'); ?>
	<div class="row">
		<div class="col-sm-5">
			<div class="info_cliente">
				<div class="contain_welcome">
					<p class="welcome">Bienvenido <?php echo AuthComponent::user('razon_social'); ?></p>
					<p class="text_puntos">Total de puntos acumulados al día <?php echo $this->Time->format($date_format, AuthComponent::user('fecha_actualizacion')) ?>:</p>
					<p class="puntos"><?php echo $puntos; ?> puntos</p>
				</div>
				<div class="logo-club">
					<?php if($awardCategoryId == AGRO): ?> 
						<img src="<?php echo Router::url('/img/club-logo-agro.png'); ?>"/>
					<?php else: ?> 
						<img src="<?php echo Router::url('/img/club-logo-moto.png'); ?>"/>
					<?php endif; ?> 
				</div>
				<div class="texto">
					<p class="estimado">ESTIMADO CLIENTE: LE INFORMAMOS QUE EN LA NUEVA WEB YA SE ENCUENTRAN ACTUALIZADOS LOS PUNTOS DEL CLUB DE BENEFICIOS. LOS MISMOS CORRESPONDEN A LO ACUMULADO DESDE SUS INICIOS A LA FECHA. </p> 
					<p class="nota">Nota: los puntos acumulados se actualizarán semanalmente.</p>
					<div class="texto_dinamico">
						<?php echo $texto['Texto']['text']; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-7">
			<?php foreach ($awards as $award): ?>
				<div class="index-award clearfix">
					<p class="points">Puntos: <?php echo $award['Award']['points'] ?></p>
					<div class="index-name clearfix
						<?php if ($award['Award']['new']): ?>
							new
						<?php endif ?>
					">						
						<?php if (!empty($award['BrwImage']['main'])): ?>
							<div class="index-image-award">					
								<img src="<?php echo reset($award['BrwImage']['main']['sizes']); ?>" alt="<?php echo $award['Award']['name']; ?>" />						
							</div>
						<?php endif ?>
						<h2><?php echo $award['Award']['name'] ?></h2>	
					</div>	
					<div class="index-info clearfix">	
						<p class="description"><?php echo $award['Award']['description'] ?></p>	
						<?php echo $this->element('gallery', array('images' => $award['BrwImage']['gallery'], 'rel' => 'gallery')); ?>			
					</div>				
				</div>
			<?php endforeach; ?>	
		</div>
	</div>
	
	<?php if (empty($award_category)) { ?>
		<h1><?php echo $award_category['AwardCategory']['name']; ?></h1>
	<?php } ?>
	<div class="">		
		
	</div>
</div>