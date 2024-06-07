<div id="order" class="index">
	<h1><?php echo __('Todos mis pedidos');?></h1>
	<table border="1">
		<thead>
			<tr>
				<th><?php echo __('N&ordm; de pedido');?></th>
				<th><?php echo __('Estado');?></th>
				<th><?php echo __('Fecha y hora');?></th>
				<th><?php echo __('Detalles');?></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($orderAll as $order) {?>
			<tr>
				<td><?php echo $order['Order']['id']?></td>
				<td><?php echo $order['OrderStatus']['name']?></td>
				<td><?php echo $this->Time->format($format = 'd-m-Y H:i:s',$order['Order']['created'])?></td>
				<td>
					<a href="<?php
					echo $this->Html->url(array('controller' => 'orders', 'action' => 'view', $order['Order']['id']))
					?>"><?php echo __('Ver');?></a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>