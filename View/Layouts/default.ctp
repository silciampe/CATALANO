<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script>
			var APP_BASE = '<?php echo Router::url('/')?>';
		</script>
		<title><?php echo $title_for_layout; ?></title>
		<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array(
			'bootstrap.min',
			'fancybox/jquery.fancybox',
			'superfish',
			'slicknav.min',
			'site',
			'mobile',	
		));
		echo $this->Html->script(array(
			'jquery-1.10.1.min',
			'fancybox/jquery.fancybox',
			'fancybox/jquery.fancybox.pack',
			'bootstrap.min',
			'jquery.autoellipsis-1.0.10.min',
			'hoverIntent',
			'superfish',
			'jquery.slicknav.min',
			'default', 			
		));
		echo $scripts_for_layout;
		?>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>

	</head>
	<body>
		<div class="container">
			<?php
			echo $this->element('ie7_warning');
			echo $this->Session->flash(); ?>
			<?php echo $this->element('header'); ?>			
			<?php echo $content_for_layout; ?>
			<?php echo $this->element('footer'); ?>
		</div>
	</body>
</html>