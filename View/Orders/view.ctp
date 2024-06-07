<div id="order" class="view">
	<h1><?php echo __('Pedido');?>: <?php echo $orderDetail['Order']['id']?></h1>
	<h3><?php echo __('Dia');?>: <?php echo $this->Time->format($date_format, $orderDetail['Order']['created']);?></h3>
	<h3><?php echo __('Estado');?>: <?php echo $orderDetail['OrderStatus']['name'];?></h3>
	<table border="2">
		<thead>
			<tr>
				<th><?php echo __('Cantidad');?></th>
				<th><?php echo __('Nombre');?></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($orderDetail['OrderProduct'] as $detail): ?>
			<tr>
				<td><?php echo $detail['quantity']; ?></td>
				<td><?php echo $detail['Product']['name']; ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<a href="<?php echo $this->Html->url(array('controller' => 'orders', 'action' => 'index')) ?>"><?php echo __('Volver');?></a>
</div>