<h3>Menu</h3>
<ul id="menu_categories">
	<?php foreach ($menuCategories as $categoria) : ?>
		<?php $url = $this->Html->url(array('controller' => 'products', 'action' => 'index', $categoria['ProductCategory']['id'],strtolower(Inflector::slug($categoria['ProductCategory']['name'], '-'))));?>
		<li><a href='<?php echo $url ?>'><?php echo $categoria['ProductCategory']['name']?></a></li>
	<?php endforeach ?>
</ul>