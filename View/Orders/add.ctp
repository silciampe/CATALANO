<?php if (AuthComponent::user()): ?>
	<div class="container-fluid order-form">
		<?php echo $this->Form->create('Order', array('controller' => 'orders', 'action' => 'add')); ?>
		<?php echo $this->Form->input('OrderProduct.id_catalano', array('label' => 'Código Catalano', 'type'=> 'number', 'tabindex' => 1, 'autofocus', 'class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
		<div class='nombre_producto'></div>
		<?php echo $this->Form->input('OrderProduct.quantity', array('value' => '0', 'class' => 'lacanti', 'label' => 'Cantidad', 'type'=> 'number', 'min'=>'1', 'tabindex' => 2, 'class' => 'form-control', 'div' => array('class' => 'form-group'))); ?>
		<?php echo $this->Form->button('Agregar', array('class' => 'btn btn-default', 'type' => 'submit', 'label' => false, 'tabindex' => 3)); ?>
		<?php if (!empty($files['BrwFile']['list'])): ?>
			<ul class="files">
			<?php foreach ($files['BrwFile']['list'] as $file): ?>
				<li>
					<a target="_blank" href="<?php echo $file['url'] ?>" title="<?php echo $file['name']?>">
						<?php echo $file['description'] ?>
					</a>
				</li>
			<?php endforeach ?>
			</ul>
		<?php endif ?>
		</form>
	</div>
<?php endif; ?>	
<?php echo $this->element('order/list_order'); ?>
