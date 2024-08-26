$(document).ready(function(){
/*	porCategoria();	
	busquedaDirecta();	
	busquedaCodigo();	
	busquedaAvanzada();	*/
	busquedaAvanzadaGrupo();	
	busquedaAvanzadaGrupoChangeSelect();
	marcasList();
	marcasListChangeSelect();	
	changeOrderProductQuantity();
	show_product();
	
	$(".brw-image").fancybox();

	// initialise plugin
	var example = $('#example').superfish({
		//add options here if required
	});

	// buttons to demonstrate Superfish's public methods
	$('.destroy').on('click', function(){
		example.superfish('destroy');
	});

	$('.init').on('click', function(){
		example.superfish();
	});

	$('.open').on('click', function(){
		example.children('li:first').superfish('show');
	});

	$('.close').on('click', function(){
		example.children('li:first').superfish('hide');
	});

	$('.lista-noticias .html_text').ellipsis();

	$('.sf-menu').slicknav({
		prependTo:'.main-header .header-menu',
		label: ''
	});
		
});

function porCategoria(){	
	$('a.PorCategoria').click(function(){
		$('div.PorCategoria').toggle();
	});
}

function busquedaDirecta(){
	$('a.BusquedaDirecta').click(function(){
		$('div.BusquedaDirecta').toggle();
	});
	marcasList();
	marcasListChangeSelect();
}

function busquedaCodigo(){
	$('a.BusquedaCodigo').click(function(){
		$('div.BusquedaCodigo').toggle();
	});
}

function busquedaAvanzada(){
	$('a.BusquedaAvanzada').click(function(){
		$('div.BusquedaAvanzada').toggle();
		busquedaAvanzadaGrupo();
		busquedaAvanzadaGrupoChangeSelect();
	});
}



function busquedaAvanzadaGrupo(){	
	productGrupo = $('#ProductGrupo').val();	
	switch(productGrupo) {
		case 'empty':
			$('.todosInput').hide();			
		break;
		case 'CORONA':
			$('.todosInput').show();
			$('.camposSoloCorona').show();			
			$('.camposSoloPiñon').hide();		
		break;
		case 'PIÑON':
			$('.todosInput').show();
			$('.camposSoloCorona').hide();			
			$('.camposSoloPiñon').show();
		break;
	}
}

function busquedaAvanzadaGrupoChangeSelect(){
	$("#ProductGrupo").change(busquedaAvanzadaGrupo);
}

function marcasListChangeSelect(){
	$("#ProductGrupoDirecta").change(marcasList);	
}

function marcasList(){
	grupo = $('#ProductGrupoDirecta').val();
	if(grupo == 'CORONA' || grupo == 'PIÑON') {
		$('.Marca').show();			
		$('.Modelo').show();
		$('.Marca').load(APP_BASE + 'products/marcas/' + grupo, function() {modelosListChangeSelect();} );	
	} else {
		$('.Marca').css('display', 'none');
		$('.Modelo').css('display', 'none');		
	}		
}



function modelosListChangeSelect(){	
	$("#ProductMarcaDirecta").change(modelosList);
}

function modelosList(){
	grupo = $('#ProductGrupoDirecta').val();
	marca = $('#ProductMarcaDirecta').val();
	if (marca) {
		$('.Modelo').load(APP_BASE + 'products/modelos/' + grupo + '/' + marca, function() {modelosListChangeSelect();} );
	} else {
		$('.Modelo').css('display', 'none');
	}	
}

function changeOrderProductQuantity(){
	$('.quantity').change(orderProductQuantity);
}

function orderProductQuantity(){
	orderProductid = $(this).attr('product_id');
	quantity = $(this).val();
	if (quantity >= 1) {
		$.get(APP_BASE + 'orderproducts/changeQuantity/' + orderProductid + '/' + quantity);
		unit_price = $('tr#orderProductId_'+orderProductid+' .price').text();
		subtotal = quantity * unit_price;
		$('tr#orderProductId_'+orderProductid+' .subtotal').text(subtotal);
		total = 0;
		$('.subtotal').each(function(){
			subtotal = Number($(this).text());
			total = total + subtotal;
		});
		$('#total').text(total);
	}
}

function show_product () {
	$('#OrderProductIdCatalano').focusout(function() {
		codigo_catalano = $('#OrderProductIdCatalano').val();
	    //alert(codigo_catalano);
	    $('.nombre_producto').load(APP_BASE + 'orders/show/' + codigo_catalano);
	});
}

