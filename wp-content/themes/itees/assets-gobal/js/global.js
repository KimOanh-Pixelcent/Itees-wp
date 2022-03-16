class ModalPlugin extends Scrollbar.ScrollbarPlugin {
	transformDelta(delta) {
	  return this.options.open ? { x: 0, y: 0 } : delta;
	}
}
ModalPlugin.pluginName = 'modal';
ModalPlugin.defaultOptions = {
	open: false,
};
class GlobalHandler {
	constructor() {
		this.pageHandlers = [
			{
				name: 'planningPageHandler', className: PlanningPageHandler, id: 'planning'
			},
			/*{
				name: 'suppliersPageHandler', className: SuppliersPageHandler, id: 'suppliers'
			},*/
			/*{
				name: 'fuelPricePageHandler', className: FuelPricePageHandler, id: 'fuel-price'
			},*/
			/*{
				name: 'notFoundPageHandler', className: NotFoundPageHandler, id: '404'
			},
			{
				name: 'privacyPageHandler', className: PlainPageHandler, id: 'privacy-policy'
			},
			{
				name: 'termsPageHandler', className: PlainPageHandler, id: 'terms-and-conditions'
			},
			{
				name: 'accessibilityPageHandler', className: PlainPageHandler, id: 'accessibility'
			},
			{
				name: 'disclaimerPageHandler', className: PlainPageHandler, id: 'disclaimer'
			}*/
		];

		this.mainScrollbar = null;
		
		this.breakpoints = {
			mobile: {
				from: 0,
				to: 240,
				up: "only screen and (min-width:#{lower-bound($small-range)})",
				down: "only screen and (max-width: #{upper-bound($mobile-range)})",
				only: "only screen and (min-width:#{lower-bound($small-range)}) and (max-width:#{upper-bound($small-range)})"
			},
			small: {
				from: 241,
				to: 570
			},
			smallSecond: {
				from: 241,
				to: 480
			},
			custom: {
				from: 571,
				// to: 600
				to: 840
			},
			medium: {
				from: 571,
				to: 768
			},
			mediumlarge: {
				from: 769,
				to: 1024
			},
			large: {
				from: 1025,
				to: 1280
			},
			xlarge: {
				from: 1281,
				to: 1660
			},
			xxlarge: {
				from: 1661,
				to: 1920
			},
			xxxlarge: {
				from: 1921,
				to: 9999
			},
			only: (breakpoint) => `only screen and (min-width:${breakpoint.from}px) and (max-width:${breakpoint.to}px)`,
			down: (breakpoint) => `only screen and (max-width:${breakpoint.from - 1}px)`,
			up: (breakpoint) => `only screen and (min-width:${breakpoint.from}px)`,
		}
		
	}

	pageHandlerFromContainer(container) {
		if (!container)
			return 0;
		
		var ph = this.pageHandlers.filter((handler) => {
			return handler.id === container.id;
		})[0]

		return window[ph.name];
	}

	disableScrolling() {
		if (this.mainScrollbar)
			this.mainScrollbar.updatePluginOptions('modal', { open: true });
	}

	enableScrolling() {
		if (this.mainScrollbar)
			this.mainScrollbar.updatePluginOptions('modal', { open: false });
	}

	destroyCursor() {
		window.cursor = null;
		jQuery('.cursor div').attr('style', '')
		gsap.set('.cursor', {autoAlpha: 0})
	}

	bp() {
		return this.breakpoints;
	}
	
	bponly(breakpoint, what = 'width') { 
		if (!this.breakpoints[breakpoint])
			return "0";

		return `only screen and (min-${what}:${this.breakpoints[breakpoint].from}px) and (max-${what}:${this.breakpoints[breakpoint].to}px)`;		
	}

	bpdown(breakpoint, what = 'width') { 
		if (!this.breakpoints[breakpoint])
			return `only screen and (max-${what}:${breakpoint - 1}px)`;

		return `only screen and (max-${what}:${this.breakpoints[breakpoint].from - 1}px)`;
	}

	bpup(breakpoint, what = 'width') { 
		if (!this.breakpoints[breakpoint])
			return `only screen and (min-${what}:${breakpoint}px)`;
			
		return `only screen and (min-${what}:${this.breakpoints[breakpoint].from}px)`;
	}

	matchonly(breakpoint) { 
		var matches = this.bponly(breakpoint);
		if (matches === "0")
			return false;
		return window.matchMedia(matches).matches;
	}
	matchdown(breakpoint) { 
		var matches = this.bpdown(breakpoint);
		if (matches === "0")
			return false;
		return window.matchMedia(matches).matches;
	}
	matchup(breakpoint) { 
		var matches = this.bpup(breakpoint);
		if (matches === "0")
			return false;
		return window.matchMedia(matches).matches;
	}

	getScrollbar() {
		return this.mainScrollbar;
	}

	darkMode () {
		var elements = [
			document.querySelector('.menu-main-menu-container'),
			document.querySelector('.mob-burger'),
			document.querySelector('.menu-mobile-menu-container')
		]

		elements.forEach(function(item, index) {
			jQuery(item).addClass('dark').removeClass('light');
		})

		document.querySelectorAll('.request-login-btn').forEach(function(item, index) {
			jQuery(item).addClass('dark').removeClass('light');
		})


		gsap.to('.logo-light', 0.3, {autoAlpha: 0});
		gsap.to('.logo-dark', 0.3, {autoAlpha: 1});
		
		window.isDarkmode = 1;
	}

	lightMode () {
		var elements = [
			document.querySelector('.menu-main-menu-container'),
			document.querySelector('.mob-burger'),
			document.querySelector('.menu-mobile-menu-container')
		]

		elements.forEach(function(item, index) {
			jQuery(item).removeClass('dark').addClass('light');
		})

		document.querySelectorAll('.request-login-btn').forEach(function(item, index) {
			jQuery(item).removeClass('dark').addClass('light');
		})


		gsap.to('.logo-dark', 0.3, {autoAlpha: 0});
		gsap.to('.logo-light', 0.3, {autoAlpha: 1});
		
		window.isDarkmode = 0;
	}

	toggleDarkMode () {
		if (isDarkmode) {
			this.lightMode();
		}
		else {
			this.darkMode();
		}
	}

	initDarkModeAnimations() {
		window.isDarkmode = (jQuery('main').attr('data-theme') === "dark");
		var _this = this;
		var cnt = 0;
		gsap.utils.toArray('.change').forEach(section => {
			cnt++;
			var newScroll = ScrollTrigger.create({
				id: 'changeHeader' + cnt,
				trigger: section,
				start: '-20px top',
				end: 'bottom top',
				scroller: `${(_this.mainScrollbar) ? '.scroller' : ''}`,
				// toggleActions: 'play none reverse reset',
				
				onEnter: function() {
					if (window.darkTimeout)
						clearTimeout(window.darkTimeout);

					if (section.classList.contains('mob-fixtures') && globalHandler.matchup('mediumlarge'))
						return;

					if (section.classList.contains('no-mob') && globalHandler.matchdown('mediumlarge'))
						return;

						console.log('in');
					
					_this.toggleDarkMode()

				},
				onLeaveBack: function() {
					if (window.darkTimeout)
						clearTimeout(window.darkTimeout);

					if (section.classList.contains('mob-fixtures') && globalHandler.matchup('mediumlarge'))
						return;

					if (section.classList.contains('no-mob') && globalHandler.matchdown('mediumlarge'))
						return;

						console.log('in');
					
					_this.toggleDarkMode()
					
				}
			});
		});
	}

	initScrollbar() {
		var _this = this;
		
		Scrollbar.use(ModalPlugin);

		this.mainScrollbar = Scrollbar.init(document.querySelector('.scroller'), {
			renderByPixels: true,
			damping:  0.08,
			delegateTo: window,
			continuousScrolling: true
		});
		this.mainScrollbar.track.xAxis.element.remove();
		this.mainScrollbar.addListener((status) => {
			if (status.offset.x > 0) {
				_this.mainScrollbar.setPosition(0, status.offset.y);
		    }
		})
		  
		ScrollTrigger.scrollerProxy(document.querySelector('.scroller'), {
			scrollTop(value) {
				if (arguments.length) {
					_this.mainScrollbar.scrollTop = value; // setter
				}
				return _this.mainScrollbar.scrollTop;    // getter
			},
			getBoundingClientRect() {
				return {top: 0, left: 0, width: window.innerWidth, height: window.innerHeight};
			}
		});
		this.mainScrollbar.addListener(ScrollTrigger.update);
		jQuery("main.home .scroller .scrollbar-track.scrollbar-track-y").appendTo('#page');
	}

	destroyScrollbar() {
		if (this.mainScrollbar) {
			this.mainScrollbar.destroy();
			jQuery('.scrollbar-track').remove();
		}
	}

	disableMenu() {
		jQuery('nav#site-navigation').css('pointer-events', 'none');
	}
	enableMenu() {
		jQuery('nav#site-navigation').css('pointer-events', '');
	}
	
	initPageHandlers() {
		this.pageHandlers.forEach((ph) => {
			window[ph.name] = new (ph.className)(ph.id);
		});
	}

	init() {
  		this.initPageHandlers();
 	}
 
}

(function($) {
	$(function() {
		if (!$('main').length)
			return;
		window.globalHandler = new GlobalHandler();
		globalHandler.init();
	})
})(jQuery)