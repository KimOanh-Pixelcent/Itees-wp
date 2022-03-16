class PlanningPageHandler {
	constructor(myId) {
		this.myId = myId;
		this.lastSection = 'section.suppliers3';

		this.latlngs = [];

		this.selectedPorts = [
			// 'Buenos Aires',
			// 'San Antonio',
			'Valparaiso',
			'Santos',
			// 'Fortaleza',
			'Port of Spain',
			'Callao',
			'Balboa',
			'Houston',
			'Los Angeles',
			'New York',
			'Las Palmas',
			'Gibraltar',
			'Cape Town',
			'Malta',
			'Port Suez',
			'Rotterdam',
			// 'Riga',
			'St. Petersburg',
			'Novorossiysk',
			'Fujairah',
			'Mumbai',
			'Colombo',
			'Singapore',
			// 'Kaohsiung',
			// 'Hong Kong',
			'Shanghai',
			// 'Busan',
			'Vladivostok',
			'Sydney',
		];

		this.colors = [
			bcopt['color-nine'].hex,
			'#ff5000',
			bcopt['color-nine'].hex,
			bcopt['color-nine'].hex,
			'#4ab765',
			'#ffffff',
			'#59d2de',
			'#ff0000',
			'#61c6e0'
		]

	}

	upLargeAnimations() {
		var speeds = [-500, -600, -400];
		var initial = [-150, -150, -150];
		var degrees = [120, 120, 120];
		jQuery('section.mobile .mobile-row').each((index, elem) => {
			var moveX = speeds[index];
			var mobileMovement = gsap.timeline({
				scrollTrigger: {
					trigger: this.lastSection,
					start: 'bottom bottom',
					end: 'bottom bottom',
					endTrigger: 'footer',
					scrub: true,
					scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
					invalidateOnRefresh: true,
				}
			})
			.fromTo(elem, 
				{x: initial[index], y: () => Math.tan(degrees[index]) * initial[index], ease: 'linear', force3D: true},
				{x: moveX, y: () => Math.tan(degrees[index]) * moveX, ease: 'linear', force3D: true})
		})
	}

	downMediumAnimations() {
		var speeds = [-500, -600, -400];
		var initial = [-150, -150, -150];
		var degrees = [120, 120, 120];
		jQuery('section.mobile .mobile-row').each((index, elem) => {
			var moveX = speeds[index];
			var mobileMovement = gsap.timeline({
				scrollTrigger: {
					trigger: this.lastSection,
					start: 'bottom bottom',
					end: 'bottom bottom',
					endTrigger: 'footer',
					scrub: true,
					scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
					invalidateOnRefresh: true,
				}
			})
			.fromTo(elem, 
				{x: initial[index], y: () => Math.tan(degrees[index]) * initial[index], ease: 'linear', force3D: true},
				{x: moveX, y: () => Math.tan(degrees[index]) * moveX, ease: 'linear', force3D: true})
		})

		

		this.downMediumSectionClipping();

	}

	onlyMediumLargeAnimations() {
		var speeds = [
			() => -0.3*window.innerWidth, 
			() => -0.4*window.innerWidth, 
			() => -0.2*window.innerWidth];
		var initial = [-30, -30, -30];
		var degrees = [120, 120, 120];
		jQuery('section.mobile .mobile-row').each((index, elem) => {
			var moveX = speeds[index];
			var mobileMovement = gsap.timeline({
				scrollTrigger: {
					trigger: this.lastSection,
					start: 'bottom bottom',
					end: 'bottom bottom',
					endTrigger: 'footer',
					scrub: true,
					scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
					invalidateOnRefresh: true,
				}
			})
			.fromTo(elem, 
				{x: initial[index], y: () => Math.tan(degrees[index]) * initial[index], ease: 'linear', force3D: true},
				{x: () => speeds[index](), y: () => Math.tan(degrees[index]) * speeds[index](), ease: 'linear', force3D: true})
		})	

		this.supplierImagePinning();
	}

	onlyMediumAnimations() {
		var speeds = [
			() => -0.3*window.innerWidth, 
			() => -0.4*window.innerWidth, 
			() => -0.2*window.innerWidth];
		var initial = [-30, -30, -30];
		var degrees = [120, 120, 120];
		jQuery('section.mobile .mobile-row').each((index, elem) => {
			var moveX = speeds[index];
			var mobileMovement = gsap.timeline({
				scrollTrigger: {
					trigger: this.lastSection,
					start: 'bottom bottom',
					end: 'bottom bottom',
					endTrigger: 'footer',
					scrub: true,
					scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
					invalidateOnRefresh: true,
				}
			})
			.fromTo(elem, 
				{x: initial[index], y: () => Math.tan(degrees[index]) * initial[index], ease: 'linear', force3D: true},
				{x: () => speeds[index](), y: () => Math.tan(degrees[index]) * speeds[index](), ease: 'linear', force3D: true})
		})	

		this.onlyMediumSectionClipping();
		// this.supplierImagePinning();
	}

	upMediumLargeAnimations() {
		// 5%, -98% -> -100%, -60%
		this.earthToLeft({
			start: 'top bottom', 
			trigger: 'section.space.four', 
			end: 'bottom bottom', 
			endTrigger: 'section.space.four'
		});

		// 50%, 0% -> 0%, -98%
		this.earthReleasePinning({
			start: 'top bottom', 
			trigger: 'section.suppliers2', 
			end: 'bottom bottom', 
			endTrigger: () => `${(globalHandler.mainScrollbar) ? '.scroll-content' : '#page'}`
		});
	}

	downMediumLargeAnimations() {
		
	}

	downLargeAnimations() {
		
	}

	
	matchMediaAnimations() {
		
		var matchMedia = {};

		matchMedia[globalHandler.bpup('large')] = () => {
			this.upLargeAnimations();
		}

		matchMedia[globalHandler.bpdown('medium')] = () => {
			this.downMediumAnimations();
		}

		matchMedia[globalHandler.bponly('mediumlarge')] = () => {
			this.onlyMediumLargeAnimations();
		}

		matchMedia[globalHandler.bponly('medium')] = () => {
			this.onlyMediumAnimations();
		}

		matchMedia[globalHandler.bpup('mediumlarge')] = () => {
			this.upMediumLargeAnimations();
		}

		// matchMedia[globalHandler.bpdown('large')] = () => {
		// 	this.downLargeAnimations();
		// }

		matchMedia[globalHandler.bpdown('mediumlarge')] = () => {
			this.downMediumLargeAnimations();
		}

		return matchMedia;
	}

    onlyMediumSectionClipping() {
       
    }

    downMediumSectionClipping() {
        
    }

	getInitialDims() {
		var screenImageHeight = (window.innerWidth * 0.7064)
		var originalResHeight = 1766;
		var fixedBorder = 46;
		var fixedBottom = 331;
		var initialScale = 1;

		
		var gap = (window.innerHeight - screenImageHeight);
		var scaleOne = window.innerHeight / screenImageHeight;

		
		if (gap > 0) {
			var realBottom = (331 * window.innerHeight) / originalResHeight;
			var realBezel = (48 * window.innerHeight) / originalResHeight;
			initialScale *= scaleOne;
			initialScale *= window.innerHeight / (window.innerHeight - (realBottom + 3*realBezel));
		}
		else {
			var realBottom = (331 * screenImageHeight) / originalResHeight;
			var realBezel = (48 * screenImageHeight) / originalResHeight;

			if (realBottom + gap > 0) {
				initialScale *= window.innerHeight / (window.innerHeight - (realBottom + gap + 2*realBezel ));
			}
				
			else
			{
				initialScale *= window.innerHeight / (window.innerHeight - (2*realBezel));
			}
				
			return {scale: initialScale, top: -(realBezel) * initialScale};		
		}


		return {scale: initialScale, top: -(realBezel*initialScale)};
	}

	supplierImagePinning() {

		if (jQuery('section.suppliers2 .suppliers-image img').hasClass('cover'))
		{
			this.firstSupSectionImagePinning({
				id: 'firstSupSectionImagePinning',
				start: 'bottom bottom',
				trigger: 'section.suppliers2 .suppliers-image',
				end: () => {
					return `bottom bottom`;
				},
				endTrigger: 'section.suppliers2'
			})
		}
		else {
			this.firstSupSectionImagePinning({
				id: 'firstSupSectionImagePinning',
				start: '50% 50%',
				trigger: 'section.suppliers2 .suppliers-image',
				end: () => {
					return `bottom ${window.innerHeight - (0.5*window.innerHeight + 20 -(jQuery('section.suppliers2 .suppliers-image').height()/2) )}`;
				},
				endTrigger: 'section.suppliers2 .column-one .text:last-child'
			})
		}
		

		this.secondSupSectionImagePinning({
			id: 'secondSupSectionImagePinning',
			start: '50% 50%',
			trigger: 'section.suppliers3 .suppliers-image',
			end: () => {
				return `bottom ${window.innerHeight - (0.5*window.innerHeight + 20 - (jQuery('section.suppliers2 .suppliers-image').height()/2) )}`;
			},
			endTrigger: 'section.suppliers3 .column-two .text:last-child'
		})
		
	}


	earthToLeft({ start, trigger, end, endTrigger }) {
		var _this = this;
		gsap.timeline({
			scrollTrigger: {
				id: 'earthToLeft',
				start: start,
				trigger: trigger,
				scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
				scrub: true,
				end: end,
				endTrigger: endTrigger,
				invalidateOnRefresh: true,
			}
		})
		.to('#earth-copy.planning', 0.5,
			// {xPercent: 0},
			{
				xPercent: -100,
				force3D: true,
				ease: Power2.easeInOut,
				// width: "80vw",
				// height: "80vw"
			}, 
		)
		.to('section.intro .section-in', {
			x: () => {
				var height = jQuery('#earth-copy.planning').width();
				return -height;
			},
			ease: Power2.easeInOut
		}, "-=0.5")
		.fromTo('section.fixtures .section-in', 0.5, {
			x: () => {
				var height = jQuery('#earth-copy.planning').width();
				return height;
			},
			autoAlpha: 0
			
		}, {x: 0,  autoAlpha: 1, ease: Power2.easeInOut}, "-=0.5")
		// .to('#earth-copy.planning', 0.1,
		// 	{
		// 		y: -0.15*window.innerWidth,
		// 		ease: Power2.easeInOut,
		// 	}, 
		// )
	}

	earthReleasePinning({ start, trigger, end, endTrigger }) {
		gsap.timeline({
			scrollTrigger: {
				trigger: trigger,
				start: start,
				scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
				end: end,
				endTrigger: endTrigger,
				onUpdate: (self) => {
					var height = window.innerHeight;
					var offset = jQuery('section.suppliers2').offset().top;

					if (height - offset > 0) {
						gsap.set('section.intro, section.fixtures', {y: -(height - offset), force3D: true});
						 
						gsap.set('#earth-copy.planning', {y: - (height - offset), force3D: true});
					}
					else if (!globalHandler.mainScrollbar) {
						var noSmoothOffset = (jQuery(window).scrollTop() - jQuery('.suppliers2').offset().top) + window.innerHeight;
						if (noSmoothOffset > 0)
							gsap.set('#earth-copy.planning, section.intro, section.fixtures', {y: -(noSmoothOffset), force3D: true});
					}
				},
				onLeaveBack: () => {
					gsap.set('#earth-copy.planning, section.intro, section.fixtures', {y: 0, force3D: true});
				}
			}
		})
	}


	firstSectionScrolling({ start, trigger, end, endTrigger }) {
		var headerHeight = jQuery('section.intro .section-in').outerHeight();
		var diffBrowser = headerHeight - window.innerHeight;

		gsap.timeline({
			scrollTrigger: {
				start: start,
				id: 'firstSectionScrolling',
				trigger: trigger,
				scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
				scrub: true,
				end: end,
				endTrigger: endTrigger,
				invalidateOnRefresh: true,
			}
		})
		.fromTo('section.intro .section-in', 0.5,
			{
				y: () => jQuery('section.intro .section-in').outerHeight() - window.innerHeight + parseFloat(jQuery('section.intro .section-in h4').css('marginTop'))	
			},
			{
				y: () => -(jQuery('section.intro .section-in').outerHeight() - window.innerHeight),
				ease: 'linear'
			}, 
		)
	}

	secondSectionScrolling({ start, trigger, end, endTrigger }) {
		var headerHeight = jQuery('section.fixtures .section-in').outerHeight();
		var diffBrowser = headerHeight - window.innerHeight;

		gsap.timeline({
			scrollTrigger: {
				start: start,
				id: 'secondSectionScrolling',
				trigger: trigger,
				scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
				scrub: true,
				end: end,
				endTrigger: endTrigger,
				invalidateOnRefresh: true,
			}
		})
		.fromTo('section.fixtures .section-in', 0.5,
			{
				y: () => jQuery('section.fixtures .section-in').outerHeight() - window.innerHeight - parseFloat(jQuery('section.fixtures .section-in').css('paddingTop'))
			},
			{
				y: () => -(jQuery('section.fixtures .section-in').outerHeight() - window.innerHeight),
				ease: 'linear'
			}, 
		)
	}

	firstSupSectionImagePinning({ start, trigger, end, endTrigger }) {
		ScrollTrigger.create({
			trigger: trigger,
			start: start,
			end: end,
			endTrigger: endTrigger,
			scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
			pin: '.suppliers2 .suppliers-image',
			pinSpacing: true,
		})
	}

	secondSupSectionImagePinning({ start, trigger, end, endTrigger }) {
		ScrollTrigger.create({
			trigger: trigger,
			start: start,
			end: end,
			endTrigger: endTrigger,
			pin: '.suppliers3 .suppliers-image',
			pinSpacing: true,
			scroller: `${(globalHandler.mainScrollbar) ? '.scroller' : ''}`,
		})
	}

	earthLoaded(earthAlreadyLoaded = false) {
		

		var _this = this;
		globalHandler.disableScrolling();

		if (globalHandler.matchup('mediumlarge'))
		{
			
			globalHandler.enableMenu();
			var tl = gsap.timeline({ paused: true, reversed: true });
			tl
			
			.to('section.intro .section-header-container, section.fixtures .section-in', 0.8, {autoAlpha: 1}, 0);

			if (!earthAlreadyLoaded)
				tl.fromTo('#earth-copy.planning', 1, {scale: 1.1, autoAlpha: 0}, {autoAlpha: 1, scale: 1, ease: Power3.easeOut}, "+=0.5");

			tl.add(() => {
				globalHandler.enableScrolling();
			})
			tl.play();
			
		}
		else {

			globalHandler.enableScrolling();	

		}
	}

	appendMissingElements() {
		var earth = `
			<div id="earth-copy" class="planning"></div>
		`

		if (!jQuery('#earth-copy').length)
			jQuery('#page').append(earth);
	}

	fixFirstSectionHeight() {

		if (globalHandler.matchdown('medium'))
		{
			gsap.set('.mob-intro .section-in', {minHeight: () => {
				return window.innerHeight - parseFloat(jQuery('.mob-intro .section-in').css('paddingTop'));
			}})
		}
	}

	getJSONData() {
		var _this = this;

		jQuery.ajax({
			type: "GET",
			url: "http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/polygon2.csv",
			dataType: "text",
			success: function(data) {
				var record_num = 5;  // or however many elements there are in each row
				window.allTextLines = data.split(/\r\n|\n/);
				window.entries = window.allTextLines[0].split(',');
				window.lines = [];

				var headings = window.entries.splice(0,record_num);
				for (var i = 1; i < window.allTextLines.length; i++) {
					var splitted = window.allTextLines[i].split(',');
					var obj = {};
					for (var j = 0; j < record_num; j++) {
						obj[headings[j]] = splitted[j];
					}
					window.lines.push(obj);
					
				}

				window.startPoints = window.lines.filter((elem) => elem.PointOrder == 1);
				
				window.routes = [];

				for (var i = 0; i < 8; i++) {
					var route = window.lines.filter((elem) => elem.AlteryxKey == i+1);
					window.routes[i] = route;

					var replace1 = planningPageHandler.latlngs.filter((elem) => elem.lat == window.routes[i][0].Latitude && elem.lng == window.routes[i][0].Longitude);
					var replace2 = planningPageHandler.latlngs.filter((elem) => elem.lat == window.routes[i][window.routes[i].length - 1].Latitude && elem.lng == window.routes[i][window.routes[i].length - 1].Longitude);

					var markers = [];

					if (!replace1.length)
					{

						var marker1 = jQuery(`
							<div class="hotspot h5g_hidden" 
							data-lat="${window.routes[i][window.routes[i].length - 1].Latitude}" 
							data-long="${window.routes[i][window.routes[i].length - 1].Longitude}" 
							data-url="" 
							data-name="${window.routes[i][window.routes[i].length - 1].Port}"
							data-color="${_this.colors[i]}"
							data-urltarget="_blank" 
							data-hotspotclass="hotspotoverride" 
							data-hotspoticon="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/img/newpin.svg" 
							data-hotspotalign="MM"></div>
							`);

						if (!jQuery(`.hotspot[data-name="${window.routes[i][window.routes[i].length - 1].Port}"]`).length) {
							jQuery('#page').append(marker1);
							markers.push(marker1);
						}
							
					}
					
					if (!replace2.length) {

						var marker2 = jQuery(`
							<div class="hotspot h5g_hidden" 
							data-lat="${window.routes[i][0].Latitude}" 
							data-long="${window.routes[i][0].Longitude}" 
							data-url="" 
							data-name="${window.routes[i][0].Port}"
							data-color="${_this.colors[i]}"
							data-urltarget="_blank" 
							data-hotspotclass="hotspotoverride" 
							data-hotspoticon="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/img/newpin.svg" 
							data-hotspotalign="MM"></div>
							`);

						if (!jQuery(`.hotspot[data-name="${window.routes[i][0].Port}"]`).length) {
							jQuery('#page').append(marker2);
							markers.push(marker2);
						}
							
					}
				}
	
				jQuery.ajax({
					url: 'https://feeds.engine.online/api/Brochure/DelayedPriceFeed',
					method: 'GET',
					success: (data) => {
						
						window.ports = data.ports;
						window.timeStamp = data["timeStampUTC"]
						var utc = moment.utc(window.timeStamp).format('HH:mm');
						var delay = moment().diff(moment.utc(window.timeStamp), 'hours');
						jQuery('.last-updated .up-last').html(`VLSFO Prices delayed ${delay} hours`);
						jQuery('.last-updated .down-last').html(`Updated: ${utc} UTC`);
						ports.forEach((elem) => { 
							if (_this.selectedPorts.indexOf(elem.port) != -1) {
								_this.latlngs.push({name: elem.port, lat: elem.lat, lng: elem.long});
							}
						})
		
						window.pushedMarkers = [];
						window.pushedOverlays = [];

						for (var i=0; i < _this.latlngs.length; i++ ) {
							var marker = jQuery(`
							<div class="hotspot h5g_hidden" data-lat="${_this.latlngs[i].lat}" data-long="${_this.latlngs[i].lng}" 
							data-url="" 
							data-name="${_this.latlngs[i].name}"
							data-color="#FFFFFF"
							data-urltarget="_blank" 
							data-hotspotclass="hotspotoverride" 
							data-hotspoticon="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/img/newpin.svg" 
							data-hotspotalign="MM"></div>
							`);
	
							// Changes colors of white markers if they belong to a route
							if (window.lines) {
								var myIndex = window.lines.filter((line) => line.Port === _this.latlngs[i].name);
								if (myIndex.length)
									myIndex = myIndex[0].AlteryxKey - 1;
								else
									myIndex = -1;
									
								var myColor = myIndex == -1 ? "#ffffff" : _this.colors[myIndex];
								marker = jQuery(`
								<div class="hotspot h5g_hidden" data-lat="${_this.latlngs[i].lat}" data-long="${_this.latlngs[i].lng}" 
								data-url="" 
								data-name="${_this.latlngs[i].name}"
								data-color="${myColor}"
								data-urltarget="_blank" 
								data-hotspotclass="hotspotoverride" 
								data-hotspoticon="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/img/newpin.svg" 
								data-hotspotalign="MM"></div>
								`);
							}
							
							
							

							if (!jQuery(`.hotspot[data-name="${_this.latlngs[i].name}"]`).length) {
								jQuery('#page').append(marker);
								window.pushedMarkers.push(marker);
							}

							else {

							}

							var filter = planningPageHandler.latlngs.filter(elem => (elem.lat == _this.latlngs[i].lat) && (elem.lng == _this.latlngs[i].lng))[0];
							var port = window.ports.filter(elem => elem.port === filter.name)[0];
							var fuels = port.fuels;
		
							var newContent = jQuery(`
								<div class="earth-ov" data-name="${filter.name}"><div class="port-ov"><div class="port">${filter.name}</div>
								<div class="fuels">
								</div></div></div>
							`);

							var vlsfo = fuels.filter((fuel) => fuel.fuel === "VLSFO")[0];
							if (vlsfo) {								
								var fuelchange = (vlsfo.price/vlsfo.previousClosePrice - 1) * 100;
								fuelchange = fuelchange.toFixed(2);

								if (vlsfo.price >= vlsfo.previousClosePrice) {
									newContent.find('.fuels').append(`<div class="uparrow"><span>$${vlsfo.price}</span> (${fuelchange}% <i class="fas fa-caret-up"></i>)</div>`)
								}
								else {
									newContent.find('.fuels').append(`<div class="downarrow"><span>$${vlsfo.price}</span> (${fuelchange}% <i class="fas fa-caret-down"></i>)</div>`)
								}
							}
							else {
								newContent.find('.fuels').append(`<div class="uparrow"><span>(no data)</span>)</div>`)
							}
							
							var new_earth_overlay = {
								inner: newContent[0].outerHTML,
								lat: _this.latlngs[i].lat,
								long: _this.latlngs[i].lng,
								name: filter.name
							};	
	
							
							window.pushedOverlays.push(new_earth_overlay);
						}
	
						_this.myearth.globe('refresh');
						for (i = 0; i < window.pushedOverlays.length; i++) {
							_this.myearth.globe('addOverlay', window.pushedOverlays[i]);
						}
					}
				})
			
			}

		 });
	}

	initEarth() {
		if (jQuery("#earth-copy.home").length) {
			jQuery('#earth-copy.home').removeClass('home').addClass('planning')
			return;
		}


		var g = this.myearth.globe({
			globeRadius:{val:180},
			globeShine:{val:3},
			globeTexture:{val:"http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/img/Earthe2-big.jpg"},
			globeBump:{val:"http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/img/earthbump1k.jpg"},
			globeMinScale:{val:0.5},
			globeMaxScale:{val:0.5},
			globeSegments:{val:50},
			momentum:{val:0.2},
			ambientIntensity:{val:1.5},
			ambientColor:{val:"#555584"},
			ambientPosX:{val:-5000},
			ambientPosY:{val:-15000},
			ambientPosZ:{val:-15000},
			headLampIntensity:{val:0.8},
			headLampColor:{val:"#ffffff"},
			headLampPosX:{val:500},
			headLampPosY:{val:1000},
			headLampPosZ:{val:0},
			hotSpotIcon:{val:"http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/img/newpin.svg"},
			backPlateTexture:{val:"http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/img/backPlate_glow.png"},
			backPlateMargin:{val:30},
			debugMode:{val:false},
			popWidth:{val:"80%"},
			popHeight:{val:"80%"},
			contentClass:{val:".hotspot"},
			hotspotCssOverride:{val:"hotspot_override"},
			cameraTargetX:{val:0},
			cameraTargetY:{val:0},
			cameraTargetZ:{val:0},
			autoRotateSpeed:{val:0.002},
			autoRotate:{val:false},
			clickExternal:{val:false},
			assetPath:{val:""},
			// zoomWheelDirection:{val:},
			onlyOrbitOnGlobe:{val:true},
			allowUserZoom:{val:false},
		});

		var _this = this;
		this.myearth.on('mouseenter touchstart', function() {
			_this.myearth.globe('stopAutoRotate');
		})
		this.myearth.on('mouseleave touchend', function() {
			_this.myearth.globe('startAutoRotate');
		})
		this.getJSONData();
	}

	init(earthAlreadyLoaded = false) {
		this.appendMissingElements();
		this.fixFirstSectionHeight();
		globalHandler.darkMode();

		if (globalHandler.matchup('mediumlarge'))
			this.myearth = jQuery("div#earth-copy.planning");
		else
			this.myearth = jQuery("div#earth-mob.planning");
		this.initEarth();
		this.events();
		var _this = this;
		function registerFirstSecScrolling(x) {
			var headerHeight = jQuery('section.intro .section-in').outerHeight();
			var diffBrowser = headerHeight - window.innerHeight;
			
			if (ScrollTrigger.getById('firstSectionScrolling'))
				ScrollTrigger.getById('firstSectionScrolling').kill();
			if (diffBrowser > 0)
			{
				gsap.set('section.scrolling.one', {display: 'block', height: diffBrowser + 80});
				_this.firstSectionScrolling({
					start: 'top bottom',
					trigger: 'section.scrolling.one',
					endTrigger: 'section.scrolling.one',
					end: 'bottom bottom',
				})
			}
			else {
				gsap.set('section.scrolling.one', {display: 'none', height: 0});
			}
		}

		function registerSecondSecScrolling(x) {
			var secondHeaderHeight = jQuery('section.fixtures .section-in').outerHeight();
			var diffBrowserSecond = secondHeaderHeight - window.innerHeight;

			if (ScrollTrigger.getById('secondSectionScrolling'))
				ScrollTrigger.getById('secondSectionScrolling').kill();

			if (diffBrowserSecond > 0)
			{


				// gsap.set('section.little.five', {display: 'none'});
				gsap.set('section.scrolling.two', {display: 'block', height: diffBrowserSecond + 80});
				_this.secondSectionScrolling({
					start: 'top bottom',
					trigger: 'section.scrolling.two',
					endTrigger: 'section.scrolling.two',
					end: 'bottom bottom',
				})
			}
			else {
				gsap.set('section.scrolling.two', {display: 'none', height: 0});
			}
		}
		
		registerFirstSecScrolling();
		registerSecondSecScrolling();
		window.matchMedia(globalHandler.bpdown(jQuery('section.intro .section-in').outerHeight(), 'height')).addListener(registerFirstSecScrolling);
		window.matchMedia(globalHandler.bpdown(jQuery('section.fixtures .section-in').outerHeight(), 'height')).addListener(registerSecondSecScrolling);

		
		ScrollTrigger.matchMedia(this.matchMediaAnimations());

		
		this.earthLoaded(earthAlreadyLoaded);
		globalHandler.initDarkModeAnimations();
	}

	destroy() {
		this.myearth.globe('destroy');
		this.myearth.off('mouseleave mouseenter touchstart touchend');
		jQuery('.hotspot_marker ').remove();
		jQuery('.hotspot ').remove();
		jQuery('.earth-ov').remove();
		jQuery('#earth-copy.planning').remove();
		jQuery('body').off('.planning');
	}

	events() {

	}
}

(function($) {
	$(function() {
		if (!$('main.planning').length)
			return;
		
		// window.dataPageHandler.earthLoaded();
		window.planningPageHandler.init();
		
	})
})(jQuery)