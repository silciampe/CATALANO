<?php if (!empty($images)): ?>
	<ul class="gallery">
		<?php foreach($images as $image): ?>
			<li><?php echo $image['tag'] ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif ?>