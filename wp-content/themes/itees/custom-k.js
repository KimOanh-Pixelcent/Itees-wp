(function($) {
  'use strict'; 	

	$(document).ready(function() {
  		
  		$('header').hide();
	  	var counter = 10;
	  	var c = 10;
	  	var i = setInterval(function(){
		    $(".landing-page .percent").html(c + "%");
		    counter++;
		    c++;
		    if(counter == 101) {
		        clearInterval(i);
		    }
	  	}, 50);
		
		$('#scroll-home').each(function(){       
	        this.style.height = '100%';	        
	    });
	    $('#testimonial-slider').carousel({
			wrap: false,
			interval: false,
		});
		$('#highlights-slider').carousel({
			wrap: false,
			interval: false,
		});		

	    $('.nav-sidebar').hide();
		$('.nav-bar').on("click", function() {
		    $('.nav-bar').toggleClass('open');
		    $('header').toggleClass('open-menu');
		    if($('.nav-bar').hasClass('open')){
		    	$('.nav-sidebar').slideDown();
		    }
		    else{
		    	$('.nav-sidebar').slideUp();
		    }
		    $('.nav-tab .nav-menu').removeClass('active');
		    $('.nav-content .group').removeClass('active');	
			$('#nav-home').addClass('active');
		   	$('.nav-content .nav-content-1').addClass('active');
		});
		
		$('.mb-services-tab').hide();
		if($(window).width() > 991){
			$('.nav-menu').on({
			    mouseover: function(){
			    	$('.nav-tab .nav-menu').removeClass('active');
			    	$('.nav-content .group').removeClass('active');		    	
			    	$(this).addClass('active');
			    	var number = $(this)[0].style.getPropertyValue('--i');		    	
			    	$('.nav-content .nav-content-' + number).addClass('active');
			    	if(number == 2){
			    		$('.nav-menu-item').removeClass('active');	
			    		$('.nav-content-item > .item').removeClass('active');	
			    		$('.nav-tab-2 p:first-child').addClass('active');
			    		$('.nav-content .nav-content-item-1').addClass('active');
			    	}
			    },
			});
			$('.nav-menu-item').on({
			    mouseover: function(){
			    	$('.nav-menu-item').removeClass('active');		    		    	
			    	$(this).addClass('active');

			    	$('.nav-content-item > .item').removeClass('active');	
			    	var number = $(this)[0].style.getPropertyValue('--i');
			    	$('.nav-content .nav-content-item-' + number).addClass('active');
			    },
			});
		}	
		if($(window).width() < 992){
			var allPanels = $('.mb-services-tab .panel').hide();
			$('.mb-services-tab .accordion').on("click", function() {
				allPanels.slideUp();
				$('.mb-services-tab .group').removeClass('open');
			    $(this).next().slideDown();
			    $(this).parent().addClass('open');
	    		return false;
			});

			$('.arrow-next').on("click", function() {
				$('.mb-services-tab .panel').hide();	
				$('.mb-services-tab .group').removeClass('open');		
			    $('.mb-services-tab').slideDown();			

			    $('.group-services-1 .panel').slideDown();
			    $('.group-services-1').addClass('open');

			    $('header').addClass('services-tab-open');
	    		return false;
			});

			$('.arrow-back').on("click", function(){
				$('.mb-services-tab').hide();
			    $('header').removeClass('services-tab-open');
			    return false;
			});

			$('.nav_close').on("click", function(){
				$('.mb-services-tab').slideUp();	
				$('header').removeClass('services-tab-open');
			});		

			//scroll mobile
			$(".Horizontal01").click(function() {
			    $('html,body').animate({
			        scrollTop: $(".slide-1").offset().top + 20},
			        'slow');
			});
			$(".Horizontal02").click(function() {
			    $('html,body').animate({
			        scrollTop: $(".slide-2").offset().top + 20},
			        'slow');
			});
			$(".Horizontal03").click(function() {
			    $('html,body').animate({
			        scrollTop: $(".slide-3").offset().top + 20},
			        'slow');
			});
			$(".Horizontal04").click(function() {
			    $('html,body').animate({
			        scrollTop: $(".slide-4").offset().top + 20},
			        'slow');
			});
			$(".Horizontal05").click(function() {
			    $('html,body').animate({
			        scrollTop: $(".slide-5").offset().top + 20},
			        'slow');
			});
		}
		
		var acc = document.getElementsByClassName(".big-group .accordion");
	    var i;

	    for (i = 0; i < acc.length; i++) {
	      acc[i].addEventListener("click", function() {
	        this.classList.toggle("active");
	        var panel = this.nextElementSibling; 
	        if (panel.style.maxHeight) {
	          panel.style.maxHeight = null; 
	        } else {
	          panel.style.maxHeight = panel.scrollHeight + "px";
	        } 
	      });
	    }

		$('#loginform input[type="text"]').attr('placeholder', 'Username/Email');
		$('#loginform input[type="password"]').attr('placeholder', 'Password');

	    $('.login-password label').on("click", function() {
			$(this).toggleClass('open');
			if ( $('.login-password label').hasClass('open') ) {
				document.getElementById('user_pass').type = 'text';
			}
			else{
				document.getElementById('user_pass').type = 'password';
			}
		});

		var version_box = $('.btn-version').hide();
		$('.btn-brochure').on("click",function(){
			$(this).toggleClass('open');
			if($(this).hasClass('open')){
				$('.btn-version').slideDown();
			}
			else{
				$('.btn-version').slideUp();
			}
		});
	});

	$(window).on('load', function() {
    	$(".landing-page").delay(1000).fadeOut("slow");
      	$(".landing-page").delay(1000).fadeOut("slow").remove();
      	$('body').addClass('show-page');
      	$('header').show();

	}) 	

})(jQuery);