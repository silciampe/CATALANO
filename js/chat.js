$( document ).ready( function () {

/* CHAT */
area_chat = 11;
IdiomaFix = "es";
codPaisActual = "ar";

$('a.btn_item_trigger').click(function(e){
    e.preventDefault();
});

cClicks = 1;
$('.contacto_item_trigger, .contacto_items').click(function(){

   if(cClicks == 0){
        $('.chat-container').removeClass('open');
        cClicks = 1;
    } else{
        $('.chat-container').addClass('open');
        cClicks = 0;
    }
});


$('.contacto_item_trigger, .contacto_items').mouseleave(function(){
    $('.chat-container').removeClass('open');
});

$('.contacto_item_trigger, .contacto_items').mouseenter(function(){
    $('.chat-container').addClass('open');
});

$('.chat_link').click(function(e){
    $('.Link_Chat').click();
    e.preventDefault();
});

if(document.location.hash=="#chat"){
    setTimeout(function(){
        $('.Link_Chat').click();
    },1000);
}


setTimeout(function(){
    $('.chat-container').addClass('active');
},1000);


$.ajax({
    url: 'https://phplive.donweb.com/js/phplive.js.php?idioma='+IdiomaFix+'&cod_pais='+codPaisActual+'&base_url=https://phplive.donweb.com&d='+area_chat+'&text=',
    dataType: 'script',
    type: 'GET',
    data: {},
    success: function() {
        $('.chat-container .Link_Chat').addClass('btn-chat').attr('title','Asesoramiento en línea chat').html($('div[data-template="Link_Chat_bt"]').html());
        $('.Link_Chat').click(function(e){
           // ga('send', 'event', 'BT CHAT', 'Clicks', $(this).attr('rel'));
        });
    }
});

/** Animaciones chat **/
/* para animación circulos*/
var tiempo_delay = 8000; //minimo 4000

setInterval(function(){
  $('.a-1').addClass('anim-1');
  $('.a-2').addClass('anim-2');
  $('.a-3').addClass('anim-3');
},tiempo_delay);

setInterval(function(){
  $('.a-1').removeClass('anim-1');
  $('.a-2').removeClass('anim-2');
  $('.a-3').removeClass('anim-3');
},tiempo_delay-10);


var timer=setInterval(function(){
  $('.tooltip-chatea').slideDown();
},6000);


$('.contacto_item_trigger, .contacto_items').hover(function(){
  clearTimeout(timer);  
  $('.tooltip-chatea').removeClass('mostrar-tooltip-al-inicio');

});

});
/***************/
