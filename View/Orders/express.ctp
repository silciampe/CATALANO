<h1 class="product_name">Pedido express</h1>

<?php if (!empty($userPrice) or $this->Session->check('Nuevo_Cliente')) :?>
	<div class="info_carro pedido_express_div">
		<?php echo $this->Form->create('Order', array('controller' => 'orders', 'action' => 'express')); ?>
			<?php echo $this->Form->input('Order.id', array('value' => null, 'type' => 'hidden')); ?>
			<?php if (!empty($userSeller['id'])) { ?>			
				<?php echo $this->Form->input('Order.seller_id', array('value' => $userSeller['id'], 'type' => 'hidden')); ?>
				<?php if (!empty($userPrice['id'])) { ?>
					<?php echo $this->Form->input('Order.user_id', array('value' => $userPrice['id'], 'type' => 'hidden')); ?>					
				<?php } ?>				
			<?php } ?>

			<?php if (!empty($userSeller['id'])) { ?>
				<div class="info_seller_cliente clearfix">
					<div class="info_seller">
						<h2>Vendedor</h2>
						<p><span>Código cliente:</span> <?php echo $userSeller['codigo_cliente'] ?></p>
						<p><span>Nombre:</span> <?php echo $userSeller['name'] ?></p>
						<p><span>Cuit:</span> <?php echo $userSeller['cuit'] ?></p>
					</div>
					<?php if (!empty($userPrice['id'])) { ?>
						<div class="info_cliente">					
							<h2>Cliente</h2>
							<p><span>Código cliente:</span> <?php echo $userPrice['codigo_cliente'] ?></p>
							<p><span>Nombre:</span> <?php echo $userPrice['name'] ?></p>
							<p><span>Cuit:</span> <?php echo $userPrice['cuit'] ?></p>	
							<p><span>Email:</span> <?php echo $userPrice['email'] ?></p>	
							<p><span>Nombre transporte:</span> <?php echo $userPrice['nombre_transporte'] ?></p>	
							<p><span>Dirección transporte:</span> <?php echo $userPrice['direccion_transporte'] ?></p>	
						</div>
					<?php } ?>	
					<?php if($this->Session->check('Nuevo_Cliente')) { ?>
						<div class="info_cliente">
							<h3>Nuevo Cliente</h3>	
							<div class="new_left">				
								<?php echo $this->Form->input('Order.NewUser.id', array('value' => null, 'type' => 'hidden')); ?>
								<?php echo $this->Form->input('Order.NewUser.seller_id', array('value' => $userSeller['id'], 'type' => 'hidden')); ?>
								<?php echo $this->Form->input('Order.NewUser.name', array('label' => 'Razón Social')); ?>
								<?php echo $this->Form->input('Order.NewUser.cuit', array('label' => 'Cuit')); ?>
								<?php echo $this->Form->input('Order.NewUser.direccion', array('label' => 'Dirección')); ?>
								<?php echo $this->Form->input('Order.NewUser.telefono', array('label' => 'Teléfono')); ?>
							</div>
							<div class="new_rigth">
								<?php echo $this->Form->input('Order.NewUser.email', array('label' => 'Email')); ?>
								<?php echo $this->Form->input('Order.NewUser.direccion_entrega', array('label' => 'Dirección entrega')); ?>
								<?php echo $this->Form->input('Order.NewUser.nombre_trasporte', array('label' => 'Nombre transporte')); ?>
								<?php echo $this->Form->input('Order.NewUser.direccion_transporte', array('label' => 'Dirección transporte')); ?>
							</div>
							<div class="clearfix">
								<?php echo $this->Form->input('Order.NewUser.lista', array('label' => 'Lista', 'div' => array('class' => 'input text lista'))); ?>
								<?php echo $this->Form->input('Order.NewUser.observaciones', array('label' => 'Observaciones')); ?>
							</div>
						</div>
					<?php }  ?>				
				</div>
			<?php } ?>
			<div class="producto_nuevo clearfix">
				<h4>Agregar artículo</h4>
				<?php 		
				echo $this->Form->input('Producto_nuevo.codigo_interno', array('label' => false)); 
				echo $this->Form->input('Enviar', array('label' => false, 'type' => 'submit', 'div' => array('class'=> 'envio_prd_nuevo')));
				if (!empty($mensaje_error)) {
					echo '<p class="error">'.$mensaje_error.'</p>';
				}			 
				?>			
			</div>		
			<div class="pedido_express clearfix">
				<?php if (!empty($lista_produtos)) : ?>
					<table class="maintbl">
						<thead>
							<tr>
								<th>Artículo</th>
								<th>Descripción</th>							
								<th>Color</th>								
								<th></th>	
								<?php if (!$this->Session->check('Nuevo_Cliente')) { ?>							
									<th class="p_total">Precio Total</th>
								<?php } ?>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php
							$i = 0;
							$subtotal = 0;						
							foreach ($lista_produtos as $key => $product): ?>							
										<tr>
											<td class="cod_prod"><?php echo $product['Product']['codigo_interno']; ?></td>
											<td class="nombre_prod"><?php echo $product['Product']['name']; ?></td>	
											<td>
												<table class="limpio">
													<thead>
														<tr>
														<?php foreach ($product['ProductStock'] as $key_stock => $productStock): ?>
															<th><?php echo $productStock['nombre_color'] ?></th>											
														<?php endforeach;?>	
														</tr>
													</thead>
													<tbody>	
														<tr>																
															<?php foreach ($product['ProductStock'] as $key_stock => $productStock): ?>											
																<td class="candidades">						
																	<?php 
																	if (!empty($productStock['precio_neto']) or $this->Session->check('Nuevo_Cliente')) : ?>									
																		<?php echo $this->Form->input('Order.OrderProductStock.' . $i . '.id', array('value' => null, 'type' => 'hidden')); ?>
																		<?php echo $this->Form->input('Order.OrderProductStock.' . $i . '.product_stock_id', array('value' => $productStock['id'], 'type' => 'hidden')); ?>
																		<?php if (!empty($productStock['quantity'])) {
																			$options = array('label' => false, 'type'=> 'number', 'min'=>'0', 'max'=>'999', 'value' => $productStock['quantity'], 'type'=> 'number');
																		} else {
																			$options = array('label' => false, 'type'=> 'number', 'min'=>'0', 'value' => 0);
																		} ?>
																		<?php echo $this->Form->input('Order.OrderProductStock.' . $i . '.quantity', $options);?>
																	<?php else:	?>
																		-
																	<?php endif; ?>
																</td>																		
																<?php $i++ ?>
															<?php endforeach;?>	
														</tr>
													</tbody>
												</table>
											</td>								
											<td class="link_view">
												<?php echo $this->Html->link('Ver más', array('controller' => 'products', 'action' => 'view', $product['Product']['id']))?>
											</td>	
											<?php if (!$this->Session->check('Nuevo_Cliente')) { ?>	 							
												<td class="subtotal">
													<?php if(!empty($product['Product']['subtotal'])) : ?>
														<?php echo '$'.$product['Product']['subtotal']; ?>
													<?php else: ?>
														-
													<?php endif; ?>
												</td>
											<?php } ?>
											<td class="acciones">
												<a class="eliminar" href="<?php	echo $this->Html->url(array('controller' => 'orders', 'action' => 'eliminar_express', $product['Product']['id']))?>"><img src="<?php echo $this->Html->url('/img/trash1.png') ?>"/></a>
											</td>										
										</tr>					
							<?php endforeach;?>
						</tbody>
					</table>
					<div id="precio_final">
				    	<div class="total">TOTAL:&nbsp;&nbsp;&nbsp;$&nbsp;
				    		<span class="peso">
				    			<?php if (!empty($total)) : ?>
									<?php echo $total; ?>
								<?php else: ?>	
									-
								<?php endif; ?>		
				    		 </span><br /><span class="flete">+ IVA + FLETE</span>
				    	</div> 			    	
				    </div>
					<?php 
					echo $this->Form->input('Order.message', array('label' => 'Observaciones'));					 		
					if (!$this->Session->check('Nuevo_Cliente')) {
						echo $this->Form->input('Actualizar', array('type' => 'submit', 'label' => false, 'name' => 'data[Order][type_request]'));
					}
					echo $this->Form->input('Confirmar pedido', array('type' => 'submit', 'label' => false, 'name' => 'data[Order][type_request]', 'div' => array('class' => 'input submit confirmar_pedido')));
					?>
				<?php endif;?>		
			</div>		
		</form>		
	</div>		
<?php else: ?>
	<p>Debe elegir un cliente para continuar</p>
<?php endif; ?>
<div style="clear:both"></div>
