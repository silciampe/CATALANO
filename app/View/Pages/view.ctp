<h1><?php echo $page['Page']['title'] ?></h1>
<div class="_html_text">
	<?php echo $page['Page']['text'] ?>
</div>
<?php
echo $this->element('gallery', array('images' => $page['BrwImage']['gallery']));
?>
