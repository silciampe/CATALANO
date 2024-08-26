<h1 class="title_line_color">Agropartes</h1>
<div class="index-agropartes contain clearfix">	
	<div class="contain_list_image">
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<img src="<?php echo Router::url('/img/img-agro-fija.png'); ?>" class="img-responsive"/>
			</div>

			<?php if (!empty($agroparte)): ?>
				<?php foreach($agroparte['BrwImage']['gallery'] as $image): ?>
					<div class="col-md-3 col-sm-3"><?php echo $image['tag'] ; ?></div>
				<?php endforeach; ?>
			<?php endif ?>
		</div>
		
		
	</div>
</div>