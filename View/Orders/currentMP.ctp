<div id="prod_display" class="current_carro">
	<div class="seccion"><h4>Mi Carro · Resumen de Compra</h4></div>
	<div id="menu_vertical">
		<?php echo $this->element('product/categoriesmenuheader'); ?>
		<!-- <div class="marcas"><?php echo $this->element('product/brands'); ?></div> -->
		<div class="marcas"><?php echo $this->element('product/prices'); ?></div>
		<div class="bannercito"><?php echo $this->Html->image('banner.jpg'); ?></div>
	</div>
	<div id="breadcrumb"><?php echo $this->element('/product/breadcrumbs'); ?></div>

	<div class="info_carro">
		<?php echo $this->Form->create('OrderProductStock', array('controller' => 'OrderProductStocks', 'action' => 'changeQuantity')); ?>
		<h1 class="product_name">Canasto de compra</h1>
		<div class="separa_productos"></div>
		<table class="maintbl">
		  <thead>
			<tr>
			  <th class="p_name"><?php echo __('PRODUCTO');?></th>
			  <th class="p_precio"><?php echo __('PRECIO');?></th>
			  <th class="p_cantidad"><?php echo __('CANTIDAD');?></th>
			  <th class="p_precio"><?php echo __('SUBTOTAL');?></th>
			  <th></th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			if (!empty($orderDetail)) :
				$i=0;
				$subtotal = 0;
				foreach ($orderDetail['OrderProductStock'] as $item):
					?>
					<tr>
						<td class="p_name">
							<table>
								<tr>
									<td>
										<?php if(!empty($item['ProductStock']['Product']['BrwImage']['main']['sizes']['98x73'])) : ?>
										<img src="<?php echo $item['ProductStock']['Product']['BrwImage']['main']['sizes']['98x73']?>">
									<?php endif ?>
									</td>
									<td><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'view', $item['ProductStock']['Product']['id'])); ?>"><?php echo $item['ProductStock']['Product']['name']?></a>
									<br><span>Color: <?php echo $item['ProductStock']['Color']['name'] ?></span></td>
								</tr>
							</table>	
						</td>
						<td class="p_precio">$<?php echo $item['ProductStock']['Product']['price']; ?></td>
						<td class="p_cantidad">
						<?php echo $this->Form->input('OrderProductStock.' . $i . '.id', array('value' => $item['id'], 'type' => 'hidden')); ?>
						<?php echo $this->Form->input('OrderProductStock.' . $i . '.quantity', array('value' => $item['quantity'], 'class' => '', 'label' => false));
						?>
						</td>
						<td class="p_subtotal">$<?php
						echo $precio = $item['ProductStock']['Product']['price'] * $item['quantity'];
						$subtotal = $subtotal + $precio;
						?><span></span>
						</td>
						<td class="acciones">
							<!-- <a class="quitar" href="<?php echo $this->Html->url(array(
							'controller' => 'orders',
							'action' => 'removeQuantity', $item['ProductStock']['Product']['id']
						))?>"><img src="<?php echo Router::url('/img/quit.png') ?>"/></a>
							<a class="agregar" href="<?php echo $this->Html->url(array(
							'controller' => 'orders',
							'action' => 'addToCart', $item['ProductStock']['Product']['id']
						))?>"><img src="<?php echo Router::url('/img/add.png') ?>"/></a> -->
						   <a class="eliminar" href="<?php
						   echo $this->Html->url(array(
						   'controller' => 'orders',
						   'action' => 'deleteItem', $item['id'])
						   )?>"><img src="<?php echo Router::url('/img/tachito.jpg') ?>"/></a>
						</td>
					</tr>
					<?php
					$i++;
				endforeach ?>
			<?php endif ?>		  
		  </tbody>
		</table>
	    <div id="precio_final">
	    	<div class="total"><span class="peso">TOTAL:&nbsp;&nbsp;&nbsp;</span>$<?php
	    	echo ((!empty($subtotal)))?$subtotal:'0' ?></div>
	    	<?php if (!empty($orderDetail)) {
	    		echo $this->Form->input('', array('label' => false, 'type' => 'submit'));
	    	} ?>
			<!-- <a href="<?php
			echo $this->Html->url(array(
			'controller' => 'orders',
			'action' => 'flushOrder',
			))?>"><?php echo $this->Html->image('vaciar_carrito.jpg'); ?></a> -->
	    </div>
		</form>
	    <table width="100%">
		  	<tr>
		  		<td class="confirmar" width="100%">
<?php /*
<!-- // ***************    M E R C A D  O P A G O   HTML 5    ***************** //  -->
<img src="http://imgmp.mlstatic.com/org-img/banners/ar/medios/575X40.jpg" title="MercadoPago - Medios de pago" alt="MercadoPago - Medios de pago" width="575" height="40"/>
<?php 
$idOrder = $this->Session->read('Order.id');
$hash_md5 = md5('2572608445579947'.'rnF61ZFfSPRKVtIkW9bCjLBqQvz41VED'.'1'.'ARS'.$subtotal.$idOrder.'tumerceriaonline');
?>
<form action="https://www.mercadopago.com/checkout/init" method="post" enctype="application/x-www-
form-urlencoded" target="">
    <!-- Autenticación y hash MD5 -->     
    <input type="hidden" name="client_id" value="2572608445579947"/>
    <input type="hidden" name="md5" value="<?php echo $hash_md5 ?>"/>
    
    <!-- Datos obligatorios del item -->
    <input type="hidden" name="item_title" value="Paquete unico de pedido nro: <?php echo $idOrder?>"/>
    <input type="hidden" name="item_quantity" value="1"/>
    <input type="hidden" name="item_currency_id" value="ARS"/>
    <input type="hidden" name="item_unit_price" value="<?php echo $subtotal ?>"/>
    
    <!-- Datos opcionales -->
    <input type="hidden" name="item_id" value="<?php echo $idOrder?>"/>
    <input type="hidden" name="external_reference" value="tumerceriaonline"/>
<!--     <input type="hidden" name="payer_name" value="<?php echo AuthComponent::user('name'); ?>"/>
    <input type="hidden" name="payer_surname" value="<?php echo AuthComponent::user('last_name'); ?>"/> -->
    <input type="hidden" name="payer_email" value="<?php echo AuthComponent::user('email'); ?>"/>
    <input type="hidden" name="back_url_success" value="http://www.tumerceriaonline.com/order_texts/view/pago-acreditado"/>
    <input type="hidden" name="back_url_pending" value="http://www.tumerceriaonline.com/order_texts/view/pago-pendiente"/>
     
    <!-- Boton de pago -->
    <button type="submit" class="lightblue-rn-m-tr" name="MP-Checkout">Pagar</button>
</form>

<!-- Pega este código antes de cerrar la etiqueta </body> -->
<script type="text/javascript">
    (function(){function $MPBR_load(){window.$MPBR_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;
    s.src = ("https:"==document.location.protocol?"https://www.mercadopago.com/org-img/jsapi/mptools/buttons/":"http://mp-tools.mlstatic.com/buttons/")+"render.js";
    var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPBR_loaded = true;})();}
    window.$MPBR_loaded !== true ? (window.attachEvent ? window.attachEvent('onload', $MPBR_load) : window.addEventListener('load', $MPBR_load, false)) : null;})();
</script>
<!-- // ***************    fin     ***     M E R C A D  O P A G O   ***************** // -->		  			
*/ ?>


<?php
$data = array (
    // Required
    "item_title" => "Title",
    "item_quantity" => "1",
    "item_unit_price" => "10.00",
    "item_currency_id" => "ARS", //Argentina: ARS, Brasil: BRL

    // Optional
    "item_id" => "CODE_012",
    "item_description" => "",
    "item_picture_url" => "Image URL",
    "external_reference" => "BILL_001",
    "payer_name" => "",
    "payer_surname" => "",
    "payer_email" => "",
    "back_url_success" => "https://www.success.com",
    "back_url_pending" => ""
);

$md5String = "CLIENT_ID".                    
        "CLIENT_SECRET".
        $data["item_quantity"].                 // item_quantity
        $data["item_currency_id"].              // item_currency_id
        $data["item_unit_price"].               // item_unit_price
        $data["item_id"].                       // item_id
        $data["external_reference"];            // external_reference

// Get md5 hash
$md5 = md5($md5String);
?>


<form action="https://www.mercadopago.com/checkout/init" method="post" enctype="application/x-www-form-urlencoded" target="">
	<!--Required authentication. Get the CLIENT_ID: 
	Argentina: https://www.mercadopago.com/mla/herramientas/aplicaciones 
	Brasil: https://www.mercadopago.com/mlb/ferramentas/aplicacoes -->	
	<input type="hidden" name="client_id" value="CLIENT_ID"/>

	<!-- Hash MD5 -->
	<input type="hidden" name="md5" value="<?php echo $md5 ?>"/>

	<!-- Required -->
	<input type="hidden" name="item_title" value="<?php echo $data["item_title"]?> "/>
	<input type="hidden" name="item_quantity" value="<?php echo $data["item_quantity"]?>"/>
	<input type="hidden" name="item_currency_id" value="<?php echo $data["item_currency_id"]?>"/>
	<input type="hidden" name="item_unit_price" value="<?php echo $data["item_unit_price"]?>"/>

	<!-- Optional -->
	<input type="hidden" name="item_id" value="<?php echo $data["item_id"]?>"/>
	<input type="hidden" name="external_reference" value="<?php echo $data["external_reference"]?>"/>
	<input type="hidden" name="item_picture_url" value="<?php echo $data["item_picture_url"]?>"/>
	<input type="hidden" name="payer_name" value="<?php echo $data["payer_name"]?>"/>
	<input type="hidden" name="payer_surname" value="<?php echo $data["payer_surname"]?>"/>
	<input type="hidden" name="payer_email" value="<?php echo $data["payer_email"]?>"/>
	<input type="hidden" name="back_url_success" value="<?php echo $data["back_url_success"]?>"/>
	<input type="hidden" name="back_url_pending" value="<?php echo $data["back_url_pending"]?>"/>

	<!-- Checkout Button -->
	<button type="submit" class="lightblue-rn-m-tr-arall" name="MP-Checkout">Pagar</button>
</form>

<!-- More info about render.js: https://developers.mercadopago.com -->
<script type="text/javascript" src="http://mp-tools.mlstatic.com/buttons/render.js"></script>


<? /*
<!-- // ***************    M E R C A D  O P A G O  (JSON) ***************** // -->
<!-- Aquí debes insertar la URL que corresponde al "init_point" -->
<a href="<?php echo $init_point ?>" name="MP-Checkout" class="lightblue-M-Ov-ArOn" mp-mode="modal" onreturn="execute_my_onreturn">Pagar</a>

<!-- Pega este código antes de cerrar la etiqueta </body> -->
<script type="text/javascript">
	(function(){function $MPBR_load(){window.$MPBR_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;
	s.src = ("https:"==document.location.protocol?"https://www.mercadopago.com/org-img/jsapi/mptools/buttons/":"http://mp-tools.mlstatic.com/buttons/")+"render.js";
	var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPBR_loaded = true;})();}
	window.$MPBR_loaded !== true ? (window.attachEvent ? window.attachEvent('onload', $MPBR_load) : window.addEventListener('load', $MPBR_load, false)) : null;})();
</script>

<script type="text/javascript">
	function execute_my_onreturn (json) {
	  if (json.collection_status=='approved'){
	    alert ('Pago acreditado');
	  } else if(json.collection_status=='pending'){
	    alert ('El usuario no completó el pago');
	  } else if(json.collection_status=='in_process'){
	    alert ('El pago está siendo revisado');
	    //window.location.href = json.back_url;
	  } else if(json.collection_status=='rejected'){
	    alert ('El pago fué rechazado, el usuario puede intentar nuevamente el pago');
	  } else if(json.collection_status==null){
	    alert ('El usuario no completó el proceso de pago, no se ha generado ningún pago');
	  }
	}
</script>
<!-- // ***************  *****    fin    *****    M E R C A D  O P A G O  (JSON) ***************** // -->
*/ ?>









<!-- 		  			Verifique si los datos de cada item son correctos.
		  			<?php if (!AuthComponent::user()) : ?>
						<a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')) ?>"><?php echo $this->Html->image('confirme_su_compra.jpg'); ?>
						</a>	  				
		  			<?php else : ?>
						<a href="<?php	echo $this->Html->url(array('controller' => 'orders', 'action' => 'confirm')) ?>"><?php echo $this->Html->image('confirme_su_compra.jpg'); ?>
						</a>
					<?php endif ?> -->
				</td>
			</tr>
		</table>
	</div>
</div>