<?php $galleryOptions = array('images' => $album['BrwImage']['gallery'], 'rel' => 'gallery'); ?>
<div class="contain album clearfix">
	<h1><?php echo $album['Album']['name'] ?></h1>
	<div class="date">
		<?php echo $this->Time->format($date_format, $album['Album']['date']) ?>
	</div>
	<?php echo $this->element('gallery', $galleryOptions); ?>
</div>