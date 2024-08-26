<?php if(!empty($productHightlighted)):?>
	<div class="_product_hightlighted clearfix">  
		<h2 class="title">Productos destacados</h2>	
		<?php
		foreach ($productHightlighted as $hightlighted) {
			echo $this->element('product/item', array('product' => $hightlighted));
		}
		?>
	</div>
<?php endif ?>