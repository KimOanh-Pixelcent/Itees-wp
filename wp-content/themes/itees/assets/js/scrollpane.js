
Init();

$operator = "";
$itemScroll = null;
$outerHeight = 0;
$outerHeightItem = 0;


//Mouse Wheel event : jQuery Mouse Wheel Plugin
if($(window).width() > 991){
	$('.pane,.scrzone').mousewheel(function(event) {
		event.preventDefault();
		$operator = event.deltaY < 0 ? '+' : '-';
		if($ScrollState==false){$ScrollState=true;if(event.deltaY < 0){UpdateScreen('+');}else if(event.deltaY > 0){UpdateScreen('-');}else{$ScrollState=false;}}
	});
}

//Init
function Init(){
	$ScrollSpeed = 1.5; //Vitesse animation
	$ScrollState=false; //Scroll possible si True - Si False anim déjà en cours //
	$ActualSlide = $CibleSlide = $('.pane').first().attr('data-id'); //Première slide
	$ListSlides = new Array(); $('.pane').each(function(){ $ListSlides.push($(this).attr('data-id')); }); //Liste des slides (.pane)
	TweenMax.to(window, 0, {scrollTo:0});
	TweenMax.to('.spane', 0, {scrollTo:{y:0, x:0}});
	$('.visible').removeClass('visible');
	$('.visible-d').addClass('visible');
	$CibleSlideDOM = $('.pane[data-id='+$CibleSlide+']');

	$('.Horizontal01').click(function () {
		$CibleSlide = $ListSlides[$ListSlides.indexOf('Horizontal01')]; 
		$ActualSlideDOM = $('.pane[data-id='+$ActualSlide+']');
		$CibleSlideDOM = $('.pane[data-id='+$CibleSlide+']');
		TweenMax.to($ActualSlideDOM.closest('.spane'), $ScrollSpeed, 
			{scrollTo:'.pane[data-id='+$CibleSlide+']',
			ease: Power2.easeOut,
			onComplete:function(){
				$ScrollState=false; 		
			}
		}); 
		$('.dots').removeClass('active');
		$(this).addClass('active');
		$('body').removeClass('contact-slide');
	});
	$('.Horizontal02').click(function () {
		$CibleSlide = $ListSlides[$ListSlides.indexOf('Horizontal02')]; 
		$ActualSlideDOM = $('.pane[data-id='+$ActualSlide+']');
		$CibleSlideDOM = $('.pane[data-id='+$CibleSlide+']');
		TweenMax.to($ActualSlideDOM.closest('.spane'), $ScrollSpeed, 
			{scrollTo:'.pane[data-id='+$CibleSlide+']',
			ease: Power2.easeOut,
			onComplete:function(){
				$ScrollState=false; 		
			}
		}); 
		$('.dots').removeClass('active');
		$(this).addClass('active');
		$('body').removeClass('contact-slide');
	});
	$('.Horizontal03').click(function () {
		$CibleSlide = $ListSlides[$ListSlides.indexOf('Horizontal03')];
		$ActualSlideDOM = $('.pane[data-id='+$ActualSlide+']');
		$CibleSlideDOM = $('.pane[data-id='+$CibleSlide+']');
		TweenMax.to($ActualSlideDOM.closest('.spane'), $ScrollSpeed, 
			{scrollTo:'.pane[data-id='+$CibleSlide+']',
			ease: Power2.easeOut,
			onComplete:function(){
				$ScrollState=false; 		
			}
		}); 
		$('.dots').removeClass('active');
		$(this).addClass('active');
		$('body').removeClass('contact-slide');
	});	
	$('.Horizontal04').click(function () {
		$CibleSlide = $ListSlides[$ListSlides.indexOf('Horizontal04')];
		$ActualSlideDOM = $('.pane[data-id='+$ActualSlide+']');
		$CibleSlideDOM = $('.pane[data-id='+$CibleSlide+']');
		TweenMax.to($ActualSlideDOM.closest('.spane'), $ScrollSpeed, 
			{scrollTo:'.pane[data-id='+$CibleSlide+']',
			ease: Power2.easeOut,
			onComplete:function(){
				$ScrollState=false; 		
			}
		}); 
		$('.dots').removeClass('active');
		$(this).addClass('active');
		$('body').removeClass('contact-slide');
	});	
	$('.Horizontal05').click(function () {
		$CibleSlide = $ListSlides[$ListSlides.indexOf('Horizontal05')];
		$ActualSlideDOM = $('.pane[data-id='+$ActualSlide+']');
		$CibleSlideDOM = $('.pane[data-id='+$CibleSlide+']');
		TweenMax.to($ActualSlideDOM.closest('.spane'), $ScrollSpeed, 
			{scrollTo:'.pane[data-id='+$CibleSlide+']',
			ease: Power2.easeOut,
			onComplete:function(){
				$ScrollState=false; 		
			}
		}); 
		$('.dots').removeClass('active');
		$(this).addClass('active');
		$('body').addClass('contact-slide');
	});	
}

function UpdateScreen(operator){
	$ActualSlide = $CibleSlide;

	if($('.pane[data-id='+$ActualSlide+'] .ct .main-item').length) {
		$itemScroll = $('.pane[data-id='+$ActualSlide+'] .ct .main-item');
		$outerHeight = $('.pane[data-id='+$ActualSlide+']').height(); // height pane
		$outerHeightItem = $itemScroll[0].scrollHeight;
	
		if($outerHeightItem > $outerHeight) {
			if(!$._data($itemScroll[0], 'events') || !$._data($itemScroll[0], 'events').mousewheel) { 

				$itemScroll.mousewheel(function(event, delta) {

					// Check Scroll on Bottom
					if($outerHeightItem - this.scrollTop <= $outerHeight) {
						if($operator == "-"){ // scroll lên
							if(this.scrollTop != 0) { 
								// let deltaTmp = delta ? delta : 1; // delta scrolll xuống 1, scroll lên -1
 								this.scrollTop += -30; 
 							}
 						} else{  
 							UpdateScreen_v2($operator);	 									    
 						}
 						
 					} else {
						// Check Scroll on Top: if top = 0 => back slide previous
						if($operator == "-" && this.scrollTop == 0) {
							if($ListSlides[$ListSlides.indexOf($ActualSlide)-1]) {
								UpdateScreen_v2($operator);									
							}
							return;
						}
						if($operator == "+" && this.scrollTop == 0 && $outerHeightItem - $outerHeight < 1){
 							UpdateScreen_v2($operator);							
 						}
						this.scrollTop -= (delta * 30); //this.scrollTop = this.scrollTop - (-1 * 50)
		    			
					}
					event.preventDefault();
				});
			}			

			return;
		}
	}
	UpdateScreen_v2($operator);
}
function UpdateScreen_v2(operator){	

	// $ActualSlide = $CibleSlide;
	if(operator=="+"){ 		
		$CibleSlide = $ListSlides[$ListSlides.indexOf($ActualSlide)+1]; 
	}
	else{ 
		$CibleSlide = $ListSlides[$ListSlides.indexOf($ActualSlide)-1]; }//Si + slide suivante / si - slide précédente
		

		if($CibleSlide == 'Horizontal01'){
			$('.dots').removeClass('active');
			$('.Horizontal01').addClass('active');
			$('body').removeClass('contact-slide');
		}
		if($CibleSlide == 'Horizontal02'){
			$('.dots').removeClass('active');
			$('.Horizontal02').addClass('active');
			$('body').removeClass('contact-slide');
		}
		if($CibleSlide == 'Horizontal03'){
			$('.dots').removeClass('active');
			$('.Horizontal03').addClass('active')
			$('body').removeClass('contact-slide');
		}
		if($CibleSlide == 'Horizontal04'){
			$('.dots').removeClass('active');
			$('.Horizontal04').addClass('active')
			$('body').removeClass('contact-slide');
		}
		if($CibleSlide == 'Horizontal05'){
			$('.dots').removeClass('active');
			$('.Horizontal05').addClass('active');
			$('body').addClass('contact-slide');
		}

	if(!$CibleSlide){ $ScrollState=false; $('#Helper').html("Break");$CibleSlide = $ActualSlide; return; }//Arrete tout si pas de slide avant/après
	$ActualSlideDOM = $('.pane[data-id='+$ActualSlide+']');
	$CibleSlideDOM = $('.pane[data-id='+$CibleSlide+']');
	//Scroll To : Greensock GSAP
	
	if( $ActualSlideDOM.closest('.prt').find('.spane').length && (operator=="+" && $ActualSlideDOM.next('.pane').length  ||  operator=="-" && $ActualSlideDOM.prev('.pane').length ) ){

		TweenMax.to($ActualSlideDOM.closest('.spane'), $ScrollSpeed, 
			{scrollTo:'.pane[data-id='+$CibleSlide+']',
			ease: Power2.easeOut,
			onComplete:function(){
				$ScrollState=false; 
				$CibleSlideDOM.addClass('visible');	
			}
		}); //Horizontal ou vertical		
	}
	else{
		TweenMax.to(window, $ScrollSpeed, {scrollTo:'.pane[data-id='+$CibleSlide+']',ease: Power2.easeOut,onComplete:function(){$ScrollState=false; $CibleSlideDOM.addClass('visible');}});//Normal
	}
}

//Init() On Resize
if($(window).width() > 991){
	$(window).resize(function(){	
		Init();
	});
}
