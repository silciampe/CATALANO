<h1 class="title_line_color blue">Motopartes</h1>
<div id="product_index" class="contain product_catalogo product clearfix">
	<?php echo $this->element('form-search-catalogo'); ?>
	<div class="product_index_container clearfix">
		<?php if (!$haveAnyCorona and !$haveAnyPiñon) { ?>	
			<p class="center">No hay productos encontrados</p>
		<?php } ?>
		<?php if ($haveAnyCorona) { ?>		
			<h1>CORONAS</h1>
			<div class="table-responsive">	
				<table class="table">
					<tr>
						<th>Código Catalano</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Z</th>
						<th>Cad.</th>
						<th>Diám Int</th>
						<th>Diám E Centro</th>
						<th>CantxDiámAg</th>
						<th>Imagen</th>
					</tr>
					<?php foreach ($products as $key => $product) { ?>
						<?php if ($product['Product']['grupo'] == 'CORONA') { ?>			
							<tr>
								<td><?php echo !empty($product['Product']['id']) ? $product['Product']['id_catalano'] : ''; ?></td>
								<td><?php echo !empty($product['Product']['marca']) ? $product['Product']['marca'] : ''; ?></td>
								<td><?php echo !empty($product['Product']['modelo']) ? $product['Product']['modelo'] : ''; ?></td>		
								<td><?php echo !empty($product['Product']['dtes']) ? $product['Product']['dtes'] : ''; ?></td>	
								<td><?php echo !empty($product['Product']['cad']) ? $product['Product']['cad'] : ''; ?></td>
								<td><?php echo !empty($product['Product']['diam_int']) ? $product['Product']['diam_int'] : ''; ?></td>	
								<td><?php echo !empty($product['Product']['diam_ex']) ? $product['Product']['diam_ex'] : ''; ?></td>	
								<td><?php echo !empty($product['Product']['can_diam']) ? $product['Product']['can_diam'] : ''; ?></td>				
								<td><?php if(!empty($product['Product']['imagen']) and file_exists('img/productImg/'. $product['Product']['imagen'])) { ?>
									<a class="brw_image" href="<?php echo Router::url('/img/productImg/'. $product['Product']['imagen']); ?>">imagen</a>			
								<?php } ?>								
								</td>
							</tr>	
						<?php } ?>
					<?php } ?>
				</table>
			</div>
		<?php } ?>
		<?php if ($haveAnyPiñon) { ?>
			<h1>PIÑONES</h1>
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>Código Catalano</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Z</th>
						<th>Cad.</th>
						<th>Diám Int</th>
						<th>Diám Ext</th>
						<th>Diám E Centro</th>
						<th>Cant x RoscAg</th>
						<th>N° EstxEsp</th>
						<th>Imagen</th>
					</tr>
					<?php foreach ($products as $key => $product) { ?>
						<?php if ($product['Product']['grupo'] == 'PIÑON') { ?>			
							<tr>
								<td><?php echo !empty($product['Product']['id']) ? $product['Product']['id_catalano'] : ''; ?></td>
								<td><?php echo !empty($product['Product']['marca']) ? $product['Product']['marca'] : ''; ?></td>
								<td><?php echo !empty($product['Product']['modelo']) ? $product['Product']['modelo'] : ''; ?></td>		
								<td><?php echo !empty($product['Product']['dtes']) ? $product['Product']['dtes'] : ''; ?></td>	
								<td><?php echo !empty($product['Product']['cad']) ? $product['Product']['cad'] : ''; ?></td>
								<td><?php echo !empty($product['Product']['diam_int']) ? $product['Product']['diam_int'] : ''; ?></td>	
								<td><?php echo !empty($product['Product']['diam_ex']) ? $product['Product']['diam_ex'] : ''; ?></td>	
								<td><?php echo !empty($product['Product']['diam_rod']) ? $product['Product']['diam_rod'] : ''; ?></td>	
								<td><?php echo !empty($product['Product']['paso_esp']) ? $product['Product']['paso_esp'] : ''; ?></td>	
								<td><?php echo !empty($product['Product']['est_x_esp']) ? $product['Product']['est_x_esp'] : ''; ?></td>				
								<td>
									<?php if(!empty($product['Product']['imagen']) and file_exists('img/productImg/'. $product['Product']['imagen'])) { ?>
									<a class="brw_image" href="<?php echo Router::url('/img/productImg/'. $product['Product']['imagen']); ?>">imagen</a>			
								<?php } ?>								
								</td>
							</tr>	
						<?php } ?>
					<?php } ?>
				</table>
			</div>
		<?php } ?>						
	</div>	
</div>