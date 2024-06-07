<div id="order" class="current">
	<h4><?php __('Su Pedido actual');?></h4>

	<?echo $form->create('OrderProduct', array('action' => 'changeQuantity'));?>
	<table border="1">
	  <thead>
	    <tr>
	      <th><?php __('Cantidad');?></th>
	      <th><?php __('Nombre');?></th>
	      <th><?php __('Eliminar');?></th>
	    </tr>
	  </thead>
	  <tbody>
		<?php
		$i=0;
		foreach ($orderDetail['OrderProduct'] as $item):
		?>
		    <tr>
		      <td>
				<?echo $form->input('OrderProduct.'.$i.'.id', array('value' => $item['id']));?>
				<?echo $form->input('OrderProduct.'.$i.'.quantity', array('value' => $item['quantity'], 'class' => 'text span-2', 'label' => false));?>
			</td>
			  <td><?php echo $item['Product']['name']?></td>
			  <td>
				<a href="<?php
				echo $html->url(array(
					'controller' => 'orders',
					'action' => 'deleteItem', $item['id'])
				)?>">X</a>
			  </td>
		    </tr>
		<?php
		$i++;
		endforeach
		?>
	  </tbody>
	</table>
			<div class="span-2">
				<input type="submit" name="Submit" value="<?php __('Actualizar');?>" />
			</div>
	</form>
	<p>
	<a href="<?php
		echo $html->url(array('controller' => 'orders', 'action' => 'confirm')) ?>"><?php __('Confirmar Pedido') ?>
	</a>
	</p>
</div>