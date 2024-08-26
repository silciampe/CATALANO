var util = new function () {

var self = this;
	self.fuentes =  {
		init: function (WebFontConfig) {

			if (typeof WebFontConfig === 'undefined') {

				WebFontConfig = {
			        google: {
			        	families: []
			        }
			    };
			}

			WebFontConfig.google.families.push('Material+Icons');
			WebFontConfig.google.families.push('Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700:latin');

		    var wf = document.createElement('script');
		    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		    wf.type = 'text/javascript';
		    wf.async = 'true';
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(wf, s);

		}
	};
};

$( document ).ready( function () {


    /** Carga Fuentes **/
    WebFontConfig = { google: { families: ['Fjalla+One'] } };
    util.fuentes.init(WebFontConfig);


});

/* News Letter */
function suscripcionNewsletter(email) {
    // Expresion regular para validar el correo
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    // Comprueba que el email sea valido
    if (regex.test(email.trim())) {
        emailValido = true;
    } else {
        emailValido = false;
    }

    if ((email != '') && emailValido) {
        $('.suscripcion .contenedor-input').hide();
        $('.suscripcion a').hide();
        $('.suscripcion .mensaje-espere').css('display', 'block');
        $.ajax({
            url: "https://app.envialosimple.com/form/subscribe/format/jsonp?callback=subscribeCallback_58f7a6105d1f2_1492624946379&AdministratorID=49390&FormID=8&isFacebook=0&Email=" + email + "&Topo=",
            dataType: "jsonp",
            success: function (a) {
                $('.suscripcion .mensaje-espere').hide();
                $('.suscripcion .mensaje-exito').css('display', 'block');
            }
        });
    }
    else {
        $('.suscripcion .mensaje-error').show();
    }
};

$('.suscripcion input').keypress(function (e) {
    if (e.keyCode == 13) {
        var email = $('input[name=Email]').val();
        suscripcionNewsletter(email);
    }
});


function anclaAnimada ( destino ) {        
        $( 'html, body' )
            .stop( true, true )
            .animate({
                    scrollTop: $( destino )
                                    .offset()
                                    .top
        }, 1000 );
}
