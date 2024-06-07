<div class="index-album contain clearfix">
	<?php echo $this->Session->flash(); ?>
	<h1>galerías de fotos</h1>
	<?php if (empty($albums)): ?>
		<p>Página en construcción</p>
	<?php else: ?>
		<ul>
			<?php foreach ($albums as $album): ?>
				<li>
					<p class="date"><?php echo $this->Time->format($date_format, $album['Album']['date']) ?></p>
					<p class="name">
						<a href="<?php	echo $this->Html->url(array('action' => 'view', $album['Album']['id'])); ?>"><?php echo $album['Album']['name'] ?>
						</a>
					</p>					
				</li>
			<?php endforeach ?>	
		</ul>
	<?php endif ?>
</div>