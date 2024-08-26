<div class="contain section-empresa-internal clearfix">

	<div class="row">
		<div class="col-sm-4 ">
			<div class="gallery-empresa">
				<?php echo $this->element('gallery', array('images' => $page['BrwImage']['gallery'], 'rel' => 'gallery')); ?>
			</div>	
		</div>
		<div class="col-sm-8">
			<h1><?php echo $page['Page']['title'] ?></h1>		
			<div class="html_text">
				<?php echo $page['Page']['text'] ?>
			</div>	
		</div>	
	</div>
	
</div>