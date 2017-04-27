 	//For Navigation Dropdown
 	$(function(){
			$("li").has(".sub-menu").hover(
				function(){
					$(this).find(".sub-menu").slideDown();
				},
				function(){
					$(this).find(".sub-menu").slideUp("fast");
				}
			);
			$(".sub-menu li").has(".sub-menu-2").hover(
				function(){
					$(this).find(".sub-menu-2").slideDown();
				},
				function(){
					$(this).find(".sub-menu-2").slideUp("fast");
				}
			);
			$(".sub-menu-2 li").has(".sub-menu-3").hover(
				function(){
					$(this).find(".sub-menu-3").slideDown();
				},
				function(){
					$(this).find(".sub-menu-3").slideUp("fast");
				}
			);
			$('.newsticker').newsTicker({
				row_height: 48,
				max_rows: 2,
				speed: 600,
				direction: 'up',
				duration: 6000,
				autostart: 1,
				pauseOnHover: 0
			});			
		});


//For Navigation Dropdown Responsive - Works on window resize
$(window).resize(function(){
   if($(window).width()<=750){
  	$("ul.sub-menu-3").removeClass('sub-menu-3').addClass("subMneu3");
  	$("ul.sub-menu-2").removeClass('sub-menu-2').addClass("subMneu2");
  	$("ul.sub-menu").removeClass('sub-menu').addClass("subMneu1");
  }
  else{
  	$("ul.subMneu3").removeClass('subMneu3').addClass("sub-menu-3");
  	$("ul.subMneu2").removeClass('subMneu2').addClass("sub-menu-2");
  	$("ul.subMneu1").removeClass('subMneu1').addClass("sub-menu");
  }
});

//For Navigation Dropdown Responsive - Works on fix window
$(function() {
  if($(window).width()<=750){
  	$("ul.sub-menu-3").removeClass('sub-menu-3').addClass("subMneu3");
  	$("ul.sub-menu-2").removeClass('sub-menu-2').addClass("subMneu2");
  	$("ul.sub-menu").removeClass('sub-menu').addClass("subMneu1");
  }
  else
  {
  	$("ul.subMneu3").removeClass('subMneu3').addClass("sub-menu-3");
  	$("ul.subMneu2").removeClass('subMneu2').addClass("sub-menu-2");
  	$("ul.subMneu1").removeClass('subMneu1').addClass("sub-menu");
  }
});

/* $(function() {

    var quotes = $(".quotes");
    var quoteIndex = -1;

    function showNextQuote() {
        ++quoteIndex;
        quotes.eq(quoteIndex % quotes.length)
            .fadeIn(2000)
            .delay(2000)
            .fadeOut(2000, showNextQuote);
    }

    showNextQuote();

});​ */

