<h1>Orden de Pedido</h1>
<div>	
	<?php echo $this->Form->create('Order', array('action' => 'confirm')); ?>
		<table>
			<thead>
				<tr>
					<th>Acc.</th>
					<th>Img</th>
					<th>Nombre</th>					
					<th>Cantidad</th>
					<th>P. Unitario</th>
					<th>P. Total</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (!empty($order)) :
				$i=0;
				$subtotal = 0;
				if (!empty($order['OrderProduct'])) :			
					foreach ($order['OrderProduct'] as $orderProduct):
						?>
						<tr id="orderProductId_<?php echo $orderProduct['id']; ?>">
							<td>
								<a class="eliminar" href="<?php
								echo $this->Html->url(array(
								'controller' => 'orderproducts',
								'action' => 'deleteItem', $orderProduct['id'])
								)?>">Eliminar</a>
							</td>
							<td>
								<?php if(!empty($orderProduct['Product']['BrwImage']['main']['sizes']['61x61'])) : ?>
									<img src="<?php echo $orderProduct['Product']['BrwImage']['main']['sizes']['61x61']?>">
								<?php endif ?>
							</td>
							<td>
								<a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'view', $orderProduct['Product']['id'])); ?>"><?php echo $orderProduct['Product']['name']?></a>
							</td>
							<td>
							<?php echo $this->Form->input('Order.OrderProduct.' . $i . '.id', array('value' => $orderProduct['id'], 'type' => 'hidden')); ?>
							<?php echo $this->Form->input('Order.OrderProduct.' . $i . '.quantity', array('value' => $orderProduct['quantity'], 'product_id' => $orderProduct['id'], 'type' => 'number', 'class' => 'quantity', 'label' => false, 'min'=>'1'));
							?>
							</td>
							<td>$ <span class="price"><?php echo $orderProduct['Product']['price'] ?></span>
							</td>
							<td>$ <span class="subtotal"><?php echo $orderProduct['subtotal'] ?></span>
							</td>
						</tr>
					<?php
					$i++;
					endforeach ?>
				<?php endif ?>
			<?php endif ?>
			</tbody>
		</table>
	    <div>
	    	<div>TOTAL: $ <span id="total"><?php echo $order['Order']['total'] ?></span></div>
	    	<?php if (!empty($order)) {
	    		if (!empty($order['Order']['message'])) {
	    			$arrayOpcions = array('label' => 'Observaciones', 'value' => $order['Order']['message'], 'rows' => '2');
	    		} else {
	    			$arrayOpcions = array('label' => 'Observaciones', 'rows' => '2');
	    		}
	    		echo $this->Form->input('Order.message', $arrayOpcions);
	    	} ?>
	    </div>			
	<?php echo $this->Form->end('Enviar Pedido', array('label' => false,)); ?>
</div>
