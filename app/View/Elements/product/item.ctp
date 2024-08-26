<?php 
$url = $this->Html->url(array(
	'controller' => 'products', 
	'action' => 'view', 
	$product['Product']['id'],
	strtolower(Inflector::slug($product['Product']['name'],'-'))
));
?>
<div class="product_item">
	<div class="imagen_product">
		<table>
			<tr>
				<td valign="middle">
					<?php if(!empty($product['BrwImage']['main']['sizes'])): ?>
					<a href="<?php echo $url ?>"><img src="<?php echo reset($product['BrwImage']['main']['sizes']); ?>" alt="<?php echo htmlspecialchars($product['Product']['name']); ?>"></a>
					<?php endif; ?>
				</td>
			</tr>
		</table>
	</div>
	<a class="name" href="<?php echo $url ?>"><?php echo $product['Product']['name'] ?></a>    
    <div class="abstract">
    	<?php if(!empty($product['Product']['abstract'])) : ?>
			<p> <?php echo $product['Product']['abstract']; ?></p>
		<?php endif; ?>
	</div>
	<div class="price">
    	<?php if(!empty($product['Product']['price'])) : ?>
			<p> $<?php echo $product['Product']['price']; ?></p>
			<?php if (AuthComponent::user()): ?>
				<?php echo $this->Form->create('Order', array('controller' => 'orders', 'action' => 'addToCartForm')); ?>
					<div>
						<?php echo $this->Form->input('OrderProduct.id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>
						<?php echo $this->Form->input('OrderProduct.quantity', array('value' => '0', 'class' => 'lacanti', 'label' => false, 'type'=> 'number', 'min'=>'1')); ?>
					</div>
				<?php echo $this->Form->end('Agregar') ?>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<div class="more_info"><a href="<?php echo $url ?>">más info</a></div>
</div>