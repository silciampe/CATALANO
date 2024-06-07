<div class="contain yellow clearfix">
	<div class="row">
		
		<?php
		$galleryOptions = array('images' => $post['BrwImage']['gallery'], 'rel' => 'gallery');
		?>
		<div class="col-sm-4">
			<?php if (!empty($post['BrwImage']['main'])): ?>
				<img src="<?php echo end($post['BrwImage']['main']['sizes']); ?>" alt="<?php echo $post['Post']['title']; ?>" class="img-responsive" />
			<?php endif ?>
			<div class="gallery">
				<?php echo $this->element('gallery', $galleryOptions); ?>
			</div>
		</div>
		<div class="col-sm-8">
			<h1><?php echo $post['Post']['title'] ?></h1>
			<div class="date">
				<?php echo $this->Time->format($date_format, $post['Post']['publication_date']) ?>
			</div>
			<div class="html_text">
				<?php echo $post['Post']['text'] ?>
			</div>	
			<div class="files">
				<?php echo $this->element('files', array('files' => $post['BrwFile']['list'])) ?>
			</div>
			<?php echo $this->element('social_share') ?>
		</div>
	</div>	
</div>