<div id="social_share">
	<?php $url_share = Router::url($this->here, true); ?>
	<table>
		<tr>
			<td>
				<a href="https://twitter.com/share" class="twitter-share-button" data-lang="es" data-size="small">Twittear</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</td>
			<td>
				<!-- Place this tag where you want the share button to render. -->
				<div class="g-plus" data-action="share" data-annotation="bubble"></div>

				<!-- Place this tag after the last share tag. -->
				<script type="text/javascript">
				  window.___gcfg = {lang: 'es-419'};

				  (function() {s
					var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					po.src = 'https://apis.google.com/js/plusone.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
			</td>
			<td>
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-like" data-href="<?php echo Router::url( $this->here, true ); ?>" data-width="150" data-layout="button_count" data-show-faces="false" data-send="false"></div>
			</td>
		</tr>
	</table>
</div>