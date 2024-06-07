<?php if (!empty($files)): ?>
	<ul class="files">
	<?php foreach ($files as $file): ?>
		<li>
			<a class="file" href="<?php echo $file['url'] ?>" title="<?php echo $file['name']?>">
				<?php echo $file['name'] ?>
			</a>
		</li>
	<?php endforeach ?>
	</ul>
<?php endif ?>