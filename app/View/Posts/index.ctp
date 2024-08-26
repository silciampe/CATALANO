<div class="index-posts noticias-section clearfix">	
	<h1 class="index">Novedades</h1>
	<?php if (empty($posts)): ?>
	<p>Página en construcción</p>
	<?php endif ?>		
	<div class="lista-noticias">
		<?php foreach ($posts as $post) {
			$slug = strtolower(Inflector::slug($post['Post']['title'], '-'));
			$url = $this->Html->url(array('controller' => 'posts', 'action' => 'view', $post['Post']['id'], $slug));
		?>		
			<div class="row">
				<div class="col-sm-3">
					<div class="index-image">
						<?php if (!empty($post['BrwImage']['main'])): ?>
						<a href="<?php echo $url; ?>" title="'<?php echo $post['Post']['title']; ?>">
							<img src="<?php echo reset($post['BrwImage']['main']['sizes']); ?>" alt="<?php echo $post['Post']['title']; ?>" />
						</a>
						<?php endif ?>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="info-post">
						<h2><a href="<?php echo $url; ?>"><?php echo $post['Post']['title'] ?></a></h2>
						<p class="index-date">
							<?php echo $this->Time->format($date_format, $post['Post']['publication_date']); ?>
						</p>					
						<p class="_abstract"><?php echo $post['Post']['abstract']; ?></p>
						<div class="html_text">
							<?php echo $post['Post']['text'] ?>
						</div>
						<a class="vermaspost" href="<?php echo $url; ?>">Ver más..</a>
					</div>
				</div>
			</div>
		<?php } ?>	
	</div>
	<div class="pagination-posts">
		<?php
		if ($this->Paginator->params['paging']['Post']['pageCount'] > 1) {
			//$this->Paginator->options(array('url' => $this->passedArgs));
			echo $this->Paginator->prev('&laquo;', array('escape' => false));
			echo $this->Paginator->numbers(array('separator' => '', 'modulus' => 10));
			echo $this->Paginator->next('&raquo;', array('escape' => false));
		}
		?>
	</div>	
</div>