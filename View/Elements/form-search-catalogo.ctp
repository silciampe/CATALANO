<script>
	var APP_BASE = '<?php echo Router::url('/')?>';
</script>
<div class="row">
	<div class="col-sm-4">
		<div class="img_moto_fija"><img src="<?php echo Router::url('/img/img-moto-fija.png'); ?>" class="img-responsive"/></div>
	</div>
	<div class="col-sm-4">
		<ul class="catalogo line">
			<li>
				<h3>VER PRODUCTOS POR CATEGORÍA</h3>
				<div class="PorCategoria">
					<ul class="ulporcategoria">
						<li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index','grupo'=> 'CORONA'))?>">Coronas</a></li>
						<li><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index','grupo' => 'PIÑON'))?>">Piñones</a></li>
					</ul>
				</div>
			</li>
			<li>
				<h3>BÚSQUEDA DIRECTA</h3>
				<div class="BusquedaDirecta clearfix">
					<?php
					echo $this->Form->create('Product', array('url' => array('controller' => 'products', 'action' => 'search_filter_redirect')));
					echo $this->Form->input('grupoDirecta', array('type' => 'select', 'empty' => 'Todos', 'label' => 'Tipo', 'options' => array(
							'CORONA' => 'CORONAS', 
							'PIÑON' => 'PIÑONES',
						)));?>
					<div class="Marca"></div>
					<div class="Modelo"></div>
					<?php echo $this->Form->end('Buscar');?>
				</div>
			</li>
		</ul>
	</div>

	<div class="col-sm-4">
		<ul class="catalogo">
			<li>		
				<h3>BÚSQUEDA POR CÓDIGO</h3>
				<div class="BusquedaCodigo clearfix">
					<?php
					echo $this->Form->create('Product', array('url' => array('controller' => 'products', 'action' => 'search_filter_redirect')));
					echo $this->Form->input('id_catalano', array('type' => 'string', 'label' => 'Código Catalano'));
					?>		
					<?php echo $this->Form->end('Buscar'); ?>
				</div>	
			</li>
			<li>
				<h3>BÚSQUEDA AVANZADA</h3>	
				<div class="BusquedaAvanzada clearfix">
					<?php
					echo $this->Form->create('Product', array('url' => array('controller' => 'products', 'action' => 'search_filter_redirect')));
					echo $this->Form->input('grupo', array('type' => 'select', 'label' => 'Tipo', 'options' => array(
							'empty' => 'Seleccionar', 
							'CORONA' => 'CORONAS', 
							'PIÑON' => 'PIÑONES',
						)));
					?>
					<div class="todosInput">
						<?php	
						echo $this->Form->input('marca', array('label' => 'Marca'));
						echo $this->Form->input('modelo', array('label' => 'Modelo'));
						echo $this->Form->input('dtes', array('label' => 'Z'));
						echo $this->Form->input('cad', array('label' => 'Cad.'));
						echo $this->Form->input('diam_int', array('label' => 'Diám Int'));
						?>
						<div class="camposSoloCorona">
							<?php
							echo $this->Form->input('diam_ex_corona', array('label' => 'Diám E Ctro'));
							echo $this->Form->input('can_diam', array('label' => 'CantxDiámAg'));
							?>
						</div>
						<div class="camposSoloPiñon">
							<?php
							echo $this->Form->input('diam_ex_pinion', array('label' => 'Diám Ext'));
							echo $this->Form->input('diam_rod', array('label' => 'Diám E Ctro'));
							echo $this->Form->input('paso_esp', array('label' => 'Cant x RoscAg'));
							echo $this->Form->input('est_x_esp', array('label' => 'Nº EstxEsp'));			
							?>	
						</div>	
					</div>
					<?php echo $this->Form->end('Buscar');?>
				</div>
			</li>
		</ul>
	</div>
</div>


