<?php if(!empty($productHighlighted)):?>
	<div class="_product_highlighted clearfix">  
		<h2 class="title">Productos destacados</h2>	
		<?php
		foreach ($productHighlighted as $highlighted) {
			echo $this->element('product/item', array('product' => $highlighted));
		}
		?>
	</div>
<?php endif ?>