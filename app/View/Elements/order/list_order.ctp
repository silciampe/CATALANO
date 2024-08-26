<?php
if (!empty($orderlist)) :
	$i=0;
	if (!empty($orderlist['OrderProduct'])) :
?>
		<h1 class="order-title">Orden de Pedido</h1>
		<div class="block-table-cart order-form">
			<?php echo $this->Form->create('Order', array('action' => 'confirm')); ?>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th width="20%">C&oacute;digo Catalano</th>
								<th width="20%">Grupo</th>
								<th width="20%">Marca</th>
								<th width="20%">Modelo</th>
								<th width="20%">Z</th>
								<th width="20%">Cad.</th>
								<th width="10%">Cantidad</th>
								<th width="5%">Eliminar</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($orderlist['OrderProduct'] as $orderProduct):
								?>
								<tr id="orderProductId_<?php echo $orderProduct['id']; ?>">
									<td>
										<a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'view', $orderProduct['Product']['id'])); ?>"><?php echo $orderProduct['Product']['id_catalano']?></a>
									</td>
									<td><?php echo $orderProduct['Product']['grupo']?></td>
									<td><?php echo $orderProduct['Product']['marca']?></td>
									<td><?php echo $orderProduct['Product']['modelo']?></td>
									<td><?php echo $orderProduct['Product']['dtes']?></td>
									<td><?php echo $orderProduct['Product']['cad']?></td>
									<td class="quantity"><?php echo $orderProduct['quantity'];?></td>
									<td class="delete">
										<a class="eliminar" href="<?php
										echo $this->Html->url(array(
										'controller' => 'orderproducts',
										'action' => 'deleteItem', $orderProduct['id'])
										)?>"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
							<?php
							$i++;
							endforeach ?>
						</tbody>
					</table>
				</div>
			    <div class="block-table-cart-footer">
			    	<?php if (!empty($orderlist)) {
			    		if (!empty($orderlist['Order']['message'])) {
			    			$arrayOpcions = array('label' => 'Observaciones', 'value' => $orderlist['Order']['message'], 'rows' => '2');
			    		} else {
			    			$arrayOpcions = array('label' => 'Observaciones', 'rows' => '2');
			    		}
			    		echo $this->Form->input('Order.message', $arrayOpcions);
			    	} ?>
			    </div>			
			<?php echo $this->Form->button('Enviar Pedido', array('class' => 'btn btn-default', 'label' => false,)); ?>
			</form>
		</div>
	<?php endif ?>
<?php endif ?>
