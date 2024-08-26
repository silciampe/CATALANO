<?php echo __('Pedido Número: ') ?> <?php echo $order['Order']['id']?><br>
<?php echo __('Fecha de pedido: ') ?> <?php 
	App::uses('CakeTime', 'Utility');
	echo CakeTime::format('d/m/Y', $order['Order']['created'])
?><br><br>
<?php if (!empty($order['User']['id'])) { ?>
	<b>Datos del cliente:</b><br>
	<?php echo __('Código: ') ?> <?php echo $order['User']['id'] ?><br />
	<?php echo __('Nombre: ') ?> <?php echo $order['User']['razon_social'] ?><br />
	<br><br>
<?php } ?>
<b>Pedido:</b>
<table width="100%" border="0" cellspacing="1" cellpadding="2">
	<tr>
		<td><?php echo __('Codigo Catalano') ?></td>
		<td><?php echo __('Grupo') ?></td>
		<td><?php echo __('Marca') ?></td>
		<td><?php echo __('Modelo') ?></td>
		<td><?php echo __('Cantidad') ?></td>
	</tr>
	<?php foreach ($order['OrderProduct'] as $detail): ?>
	<tr>
		<td><?php echo $detail['Product']['id_catalano'] ?></td>
		<td><?php echo $detail['Product']['grupo'] ?></td>
		<td><?php echo $detail['Product']['marca'] ?></td>
		<td><?php echo $detail['Product']['modelo'] ?></td>
		<td><?php echo $detail['quantity'] ?></td>
	</tr>
	<?php endforeach ?>
	<?php if (!empty($order['Order']['message'])) { ?>
		<tr>
			<td colspan="5"><b>Observaciones:</b> <?php echo $order['Order']['message'] ?></td>
		</tr>
	<?php } ?>
</table>
<br><br>
Los datos vertidos en este mail, son los cargados en nuestra base de datos, por favor revise su correcta información para dar por asentado el pedido.

Desde ya muchas gracias por su compra.