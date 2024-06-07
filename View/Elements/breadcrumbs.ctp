<?php if(isset($crumb)){ ?>
	<div id="breadcrumbs">
		<?php
			$crumb = array_merge(
				array('Home' => array('controller' => 'pages', 'action' => 'home')), $crumb
			);
			end($crumb); //obtendo ultimo elemento de array
			$urlLast = '<span>' . key($crumb) . '</span>'; //tomo el label del elemento actual (ultimo)
			$labelLast = key($crumb);
			array_pop($crumb); //quita el ultimo elemento, lo elimina y hace un reset
			$crumb[$labelLast] = $urlLast;
			//pr($crumb);
			foreach($crumb as $label => $url){
				if (is_array($url)) {
					$this->Html->addCrumb($label, $url, array('escape' => false));
				} else {
					$this->Html->addCrumb($url);
				}
				
			}
			echo $this->Html->getCrumbs(' &raquo; ');
		?>
	</div>
<?php } ?>