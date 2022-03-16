/**
*TODO - fix the way the generator handles true / false (should be a bool instead of string)
maybe use checkboxes
V -Why wont multiple demo work without stretching - fixed css
V -Why wont multiple demo zoom only selected globe - fixed -> mee.camera
-Should adapt padding-top to match width - so width:80% would yield padding-top:80%
V -Would like to add pre tags around code in generator wp output
Fedt eksempel på popup - https://www.claytonindustries.com/clayton-sales-and-service-locations/

Version2
Changelog
- much better support for responsiveness
- refactored a lot of code
- added globeTexture.anisotropy=8 for better texturequality
- added support for htmltags directly inside generator content area

 * A jQuery plugin boilerplate.
 * Author: Jonathan Nicol @f6design
 */
;(function($) {  
    // Change this to your plugin name. 
    var pluginName = 'globe';
  
    /**
     * Plugin object constructor.
     * Implements the Revealing Module Pattern.
     */
    function Plugin(element, options) {
      // References to DOM and jQuery versions of element.
      // window.el = element
      var mee = this
      mee.destroyed = false;
  
      var elem = element;
      var $elem = $(element);
      mee.elem = element;
      mee.$elem = $(element);
      mee.camDolly = 1500 //cameradistance
  
      // Extend default options with those supplied by user.
      options = $.extend(true, {}, $.fn[pluginName].options, options);
   
  
      /**
       * Initialize plugin.
       */
      function init(){
        console.warn = function(){}
        // alert("Hello! I am an alert box!");
  
        //find out if the browser supports webgl
        if( ! Detector.webgl ){
          // var g = new( globeObj );
          var contentDiv = mee.$elem
          //show message if no webGl
          var degradeMsg = $.get('noWebGl.html', function(data) {
            contentDiv.html(data);
            return false;
          })
  
        }
  
        //clean up
        mee.$elem.empty()
  
        //create hotspot placeholders
        mee.hotspotTemplate = $('<div/>', {
            class: 'hotspot_marker',
        }).appendTo(mee.$elem);
  
        mee.overlay = $('<div/>', {
            class: 'h5g_overlay',
        }).appendTo(mee.$elem);      
  
  
        mee.hotspotDetails = $('<div/>', {
            id: 'hotspot_details',
        }).hide().appendTo(mee.overlay);
  
        mee.hotspotDetails_content = $('<div/>', {
            id: 'details_content',
        }).appendTo(mee.hotspotDetails);
  
  
        //setting up initial vars
        mee.targetRotation_x = 0
        mee.targetRotation_y = 0
  
        mee.hotspotsArr = [];
        mee.overlaysArr = [];
        hotspotDivsArr = [];

        // options = $.extend( {}, $.fn.doGlobe.options, options );
  
        windowDimensionX = mee.$elem.innerWidth();
        windowDimensionY = mee.$elem.innerHeight();
        
        //handle potential empty string in assetpath
        
        if (options.assetPath.val=="unset") {
          options.assetPath.val =""
        };
  
        // setup colorbox

  
        //isScaling is used to determine pinch gesture
        mee.isScaling = false
  
        //initialPinchDist is used to calculate pinchdirection
        mee.initialPinchDist = 0
  
        //handlersPaused used to diasble hotspotevents
        mee.handlersPaused = false;
  
        //registers if user has been touchMove ing
        doingOrbit = false
  
        deleteOldAnimationHandler()
        refreshGlobe();
        animate();
        // me.animate(this);
        // me.targetRotation_x = 0;
  
        // Extends functionality of ".css()"
        // used to detect changes in css
      }
  
  
      function onWindowResize() {
  
        // console.log('window resized')
  
  
        //var c = '#'+(Math.random()*0xFFFFFF<<0).toString(16);
        // $('.globeGl').css('background', c);
  
        // windowDimensionX = mee.$elem.innerWidth();
        // windowDimensionY = mee.$elem.innerHeight();
        // mee.renderer.setSize( windowDimensionX, windowDimensionY );
        // console.log(windowDimensionY)
        // //setup3D()
  
        
        // // camera.left = windowDimensionX / - 2
        // // camera.right = windowDimensionX / 2
        // // camera.top = windowDimensionY / 2
        // // camera.bottom = windowDimensionY / - 2
  
        // camera.updateProjectionMatrix();
        // render();
      }
      
      function refreshGlobe () {
        // var me = this
        setup3D();
        generateContent()
        setupListeners()
  
        //used for testingpurposes
        if(options.debugMode.val===true){
          // console.log('settingUpDebug')
          setupDebug()
        }
      }
  
      function doZoomCam (wheelDelta) {
        
        var zoomMultiplier = -1
  
        if (options.zoomWheelDirection.val == "downIn") {
          zoomMultiplier = -1
        };
        if (options.zoomWheelDirection.val == "downOut") {
          zoomMultiplier = 1
        };
  
        wheelDelta*=zoomMultiplier
  
        var zoomValue = mee.camera.zoom + mee.camera.zoom * wheelDelta / 3
        zoomObj = {zoomValue:zoomValue, zoomTime:500, restricted:true}
  
        zoomGlobe(zoomObj)
      }
  
  
      function doPinchZoom (dist) {
  
    
        if(Math.abs(mee.initialPinchDist - dist) < 15){
          return
        }
  
        var wheelDelta = dist - mee.initialPinchDist
        var currScale = camera.zoom
  
        if(wheelDelta > 0){
          wheelDelta = 1.2
        }else{
          wheelDelta = 0.8
        }
        var targetScale = wheelDelta * currScale;
  
        mee.initialPinchDist = dist    
  
        zoomObj = {zoomValue:targetScale, zoomTime:500, restricted:true}
  
        zoomGlobe(zoomObj)
      }
  
      function zoomGlobe(zoomInfo){// {zoomValue:level, zoomTime:time, restricted:false}
        var currZoom = {value:mee.camera.zoom}
        var endZoom = {value:zoomInfo.zoomValue}
  
  
        if (zoomInfo.restricted) {
          if(endZoom.value <= options.globeMinScale.val)endZoom.value = options.globeMinScale.val
          if(endZoom.value >= options.globeMaxScale.val)endZoom.value = options.globeMaxScale.val
        };
  
  
  
        
        new TWEEN.Tween(currZoom)
          .to(endZoom, zoomInfo.zoomTime)
          .easing(TWEEN.Easing.Quartic.EaseOut)
          .onUpdate(function() {
            mee.camera.zoom = currZoom.value
            mee.camera.updateProjectionMatrix()
          })
          .start();  
      
          /*
          new TWEEN.Tween(mee.scaleContainer.scale)
          .to({x: 2,y: 2,z: 2}, 500)
          .easing(TWEEN.Easing.Quartic.EaseOut)
          .start();
          */
      }
  
  
      function deleteOldAnimationHandler () {
        try{cancelAnimationFrame(mee.animationHandler)}catch(err){}
      }
  
      function setup3D () {
        // var me = this
        //create and populate containers
        // projector = new THREE.Projector()
        mee.globeContainer = new THREE.Object3D();
        mee.globeContainer.name = "globeContainer"
        mee.globeContainerParent = new THREE.Object3D();
        mee.globeContainerParent.name ='globeContainerParent'
        backPlateContainer = new THREE.Object3D();
        backPlateContainer.name ='backPlateContainer'
        mee.scaleContainer = new THREE.Object3D();
        mee.scaleContainer.name ='mee.scaleContainer'
  
        //array to hold the globe, for hittesting
        mee.globeArr = []
        
        //scene
        mee.scene = new THREE.Scene();
        window.s = mee.scene
  
        //camera
        // var aspect = windowDimensionX / windowDimensionY
        //camera = new THREE.OrthographicCamera( windowDimensionX / - 2, windowDimensionX / 2, windowDimensionY / 2, windowDimensionY / - 2, 0.1, 2000 );
        mee.camera = new THREE.OrthographicCamera( 0,0,0,0, 0.1, 2000 );
    
        mee.camera.position.x = mee.camDolly//options.camX.val;
        mee.camera.position.y = 0//options.camY.val;
        mee.camera.position.z = 0//options.camZ.val;
        mee.camera.lookAt(new THREE.Vector3(options.cameraTargetX.val,options.cameraTargetY.val,options.cameraTargetZ.val))
        
        mee.camera.left = -200 //(windowDimensionX / - 2 )// * (aspect / 1)
        mee.camera.right = 200 //(windowDimensionX / 2) //* (aspect / 1)
        mee.camera.top = 200 //(windowDimensionY / 2) //* (aspect / 1) 
        mee.camera.bottom = -200 //(windowDimensionY / - 2) //* (aspect / 1) 
          // 
        mee.camera.updateProjectionMatrix();
  
        // window.cam = mee.camera
  
        mee.scene.add( mee.camera );
  
        //lighting
        ambient = new THREE.PointLight(options.ambientColor.val, options.ambientIntensity.val);
        ambient.position.set(options.ambientPosX.val, options.ambientPosY.val, options.ambientPosZ.val)
        ambient.castShadow = false;
        mee.scaleContainer.add(ambient);
  
            
        headLamp = new THREE.PointLight(options.headLampColor.val, options.headLampIntensity.val, 3000);
        headLamp.position.set(options.headLampPosX.val, options.headLampPosY.val, options.headLampPosZ.val)
        headLamp.lookAt(mee.globeContainer.position)
        headLamp.castShadow = false;
        mee.scaleContainer.add(headLamp)
  
        var light = new THREE.AmbientLight( 0x999999 ); // soft white light
        mee.scaleContainer.add(light)
  
        //materials
        backPlateTexture = THREE.ImageUtils.loadTexture( options.assetPath.val + options.backPlateTexture.val)
        globeTexture = THREE.ImageUtils.loadTexture( options.assetPath.val + options.globeTexture.val)
  
        //backPlateTexture.minFilter = THREE.LinearFilter;
        //backPlateTexture.magFilter = THREE.LinearFilter;
        backPlateTexture.anisotropy = 8;
  
        // globeTexture.minFilter = THREE.LinearFilter;
        // globeTexture.magFilter = THREE.LinearFilter;
        globeTexture.anisotropy = 8;
        
        var globeMaterial
  
        if (options.globeBump.val != "") {
          //do bump
          globeBump = THREE.ImageUtils.loadTexture(options.assetPath.val + options.globeBump.val)
          // globeBump.minFilter = THREE.NearestFilter
          globeBump.minFilter = THREE.LinearFilter
          globeBump.magFilter = THREE.LinearFilter
          // globeBump.anisotropy = 16;
          globeMaterial = new THREE.MeshPhongMaterial( { bumpScale:25, bumpMap: globeBump, map: globeTexture, ambient: 0x555555, color: 0xffffff, specular: 0x555555, shininess: options.globeShine.val} )
        }else{
          //dont do bump
          globeMaterial = new THREE.MeshPhongMaterial( { map: globeTexture, ambient: 0x555555, color: 0xffffff, specular: 0x555555, shininess: options.globeShine.val} )
        }
  
        backPlateMaterial = new THREE.MeshBasicMaterial( { map: backPlateTexture, color: 0xffffff, alphaTest:0, transparent:true, side:THREE.FrontSide } )
  
        //globeGeometry
        mee.globeGeo = new THREE.Mesh( new THREE.SphereGeometry( options.globeRadius.val, options.globeSegments.val, options.globeSegments.val ), globeMaterial );
  
        mee.globeGeo.position.x = 0;
        mee.globeGeo.position.y = 0;
        mee.globeGeo.position.z = 0;
        // mee.globeGeo.rotation.y = -90 * (Math.PI / 180);
        mee.globeGeo.name ="theGlobe"
        mee.globeContainer.add(mee.globeGeo);
  
        mee.globeArr.push(mee.globeGeo)
  
        //backPlate
        var backPlateSize = 2*options.globeRadius.val+options.backPlateMargin.val*1
        backPlate = new THREE.Mesh(new THREE.PlaneBufferGeometry(backPlateSize, backPlateSize ), backPlateMaterial )
        backPlate.rotation.y = 0.5 * Math.PI
        backPlateContainer.add(backPlate)
        // console.log(backPlateSize)
  
        //setup renderer
        if(!mee.renderer) mee.renderer = new THREE.WebGLRenderer({antialias:true, alpha:true});
        mee.renderer.clear()
        
        // mee.renderer.setSize( windowDimensionX, windowDimensionY, false );
        mee.renderer.autoClear = true;
  
        // Set renderers canvas to 100% width and height
        $(mee.renderer.domElement).css({ 'height': 100 + "%", 'width': 100 + "%", 'top': 0,'bottom': 0,'position': "absolute" });
  
        mee.$elem.append( mee.renderer.domElement );
        
        //add created containers to scene
        mee.scene.add(mee.scaleContainer)
        mee.scaleContainer.add(backPlateContainer);
        mee.scaleContainer.add(mee.globeContainerParent);
        mee.globeContainerParent.add(mee.globeContainer);
      }
  
      function generateContent () {
        // var me = this;
        hotspotDivsArr = $(options.contentClass.val).clone()
        //loop through all divs with class options.contentClass.val
        for (var i = 0; i < hotspotDivsArr.length; i++) {
  
          //calculate 3d coords based on lat, long and radius
          var _long = $(hotspotDivsArr[i]).data('long')
          var _lat = $(hotspotDivsArr[i]).data('lat')
          
          //transfer data from original div to the hotspot
          var hotspotData = $(hotspotDivsArr[i]).data();
          
          //the add extra info to hotspotData
          hotspotData.pos = translateGeoCoords(_lat, _long, options.globeRadius.val);
          //console.log(hotspotData.pos)
          hotspotData.html = $(hotspotDivsArr[i]).html() 
          
          var hotspot = addHotspot(hotspotData);
  
          mee.hotspotsArr.push(hotspot)
        };
  
      }
  
      function setupListeners () {
        // console.log("setupListeners3")
        mee.handlersPaused = false
        mee.$elem.on('mousedown', this, onDocumentMouseDown)
        mee.$elem.on('touchstart', this, onDocumentTouchStart)

        // console.log(mee.$elem) 
      }
  
      function removeListeners () {
        mee.handlersPaused = true
        mee.$elem.off('mousedown')
        mee.$elem.off('touchstart')

      }
  
      function onDocumentMouseWheel(event, delta, deltaX, deltaY){
  
        if (options.allowUserZoom.val == false) {return};
        // var me = event.data.me
        event.preventDefault()
  
        hideMouseOverDetails()
        //test for firefox / chrome delta
        //var z = (Math.abs(deltaY)>Math.abs(delta))?deltaY:delta
        doZoomCam(delta)
      }
  
      function onDocumentTouchStart( event ) {
        // console.log("onDocumentTouchStart")        
  
        var e = event.originalEvent
        
        mouseDown = true
  
        mouseY = e.touches[0].pageY - mee.$elem.offset().top
        mouseX = e.touches[0].pageX - mee.$elem.offset().left
        
  
        var doOrbit = testForOrbit(mouseX, mouseY)
  
        if (doOrbit == true) {
          mee.$elem.off( 'touchmove', onDocumentTouchMove );
  
          mee.$elem.on( 'touchmove', this,  onDocumentTouchMove );
          $(document).on( 'touchend', this, onDocumentTouchEnd );
          // mee.$elem.on( 'mouseout', me, onDocumentMouseOut );
    
          mouseXOnMouseDown = e.touches[0].clientX - windowDimensionX;
          targetRotationOnMouseDown_x = mee.targetRotation_x;
    
          mouseYOnMouseDown = e.touches[0].clientY - windowDimensionY;
          targetRotationOnMouseDown_y =   mee.targetRotation_y;
    
          //stop autorotation
          options.autoRotate.val = false
    
          //detect pinch
          if (options.allowUserZoom.val == true) {
            if(e.touches.length == 2) {
              doingOrbit = true;
              mee.isScaling = true;
              mee.initialPinchDist = pytho(e)
            }
          }
        }
      }
  
  
  
  
      function onDocumentMouseDown ( event ) {
        // console.log("onDocumentMouseDown")        
  
        mouseDown = true
  
        mouseY = event.pageY - mee.$elem.offset().top
        mouseX = event.pageX - mee.$elem.offset().left
  
        var doOrbit = testForOrbit(mouseX, mouseY)
  
        if (doOrbit == true) {
  
            event.preventDefault();
            
            mee.$elem.on( 'mousemove', this,  onDocumentMouseMove );
            $(document).on( 'mouseup', this, onDocumentMouseUp );
            // mee.$elem.on( 'mouseout', me, onDocumentMouseOut );
      
            mouseXOnMouseDown = event.clientX - windowDimensionX;
            targetRotationOnMouseDown_x = mee.targetRotation_x;
      
            mouseYOnMouseDown = event.clientY - windowDimensionY;
            targetRotationOnMouseDown_y =   mee.targetRotation_y;
      
            //stop autorotation
            options.autoRotate.val = false
        };
    
      }
  
  
      function onDocumentTouchMove (event) {
        // console.log("onDocumentTouchMove")        
        event.preventDefault()
        hideMouseOverDetails()   //hide the menu
        var e=event.originalEvent
        if(mee.isScaling){
          doPinchZoom(pytho(e))
          doingOrbit = true
        }else{
  
          mouseX = e.touches[0].clientX - windowDimensionX;
          mee.targetRotation_x = targetRotationOnMouseDown_x + ( mouseX - mouseXOnMouseDown ) * 0.01;
  
          mouseY = e.touches[0].clientY - windowDimensionY;
          mee.targetRotation_y = targetRotationOnMouseDown_y + ( mouseY - mouseYOnMouseDown ) * 0.01;
  
          
          var movedist = Math.abs(mouseX - mouseXOnMouseDown) + Math.abs(mouseY - mouseYOnMouseDown)
  
          if (movedist > 5) {
            //if movedist > 5 orbit the globe instead of registering a icon click
            doingOrbit = true
          };
        }
      }
  
  
  
      function onDocumentMouseMove (event) {
        // console.log("onDocumentMouseMove")        
        // var me = event.data
  
        hideMouseOverDetails()   //hide the menu
  
        mouseX = event.clientX - windowDimensionX;
        mee.targetRotation_x = targetRotationOnMouseDown_x + ( mouseX - mouseXOnMouseDown ) * 0.01;
  
        mouseY = event.clientY - windowDimensionY;
        mee.targetRotation_y = targetRotationOnMouseDown_y + ( mouseY - mouseYOnMouseDown ) * 0.01;
  
      }
  
      function onDocumentTouchEnd (event) {
        // var me = event.data;
        // console.log("onDocumentTouchEnd")        
        mouseDown = false;
        mee.$elem.off( 'touchmove', onDocumentTouchMove );
        $(document).off( 'touchend', onDocumentTouchEnd );
        mee.isScaling = false
        render()
      }
  
      function onDocumentMouseUp (event) {
        // console.log("onDocumentMouseUp")        
        // var me = event.data;
        mouseDown = false;
        mee.$elem.off( 'mousemove', onDocumentMouseMove );
        $(document).off( 'mouseup', onDocumentMouseUp );
        render()
      }
  
  
      function getMouseIntersection(mouseX, mouseY, testGeo){
        //returns intersection object based on mousex, mousey and testgeo (mee.globeArr for globe)
        var mouse2DX = (mouseX/windowDimensionX)*2-1
        var mouse2DY = -(mouseY/windowDimensionY)*2+1
  
        var raycaster = new THREE.Raycaster();
        var mouse = new THREE.Vector2(mouse2DX, mouse2DY)
        var INTERSECTED;
        raycaster.setFromCamera( mouse, mee.camera );
        var intersects = raycaster.intersectObjects( testGeo, true );
  
        return intersects
  
      }
  
  
      function testForOrbit(mouseX, mouseY){
        //determine if we should orbit - if user hits the globe and options
        var doOrbit = false
  
        if (options.onlyOrbitOnGlobe.val == true) {
          //test to see if mousex and y intersects the globe
          var intersects = getMouseIntersection(mouseX, mouseY, mee.globeArr)
      
          if (intersects.length > 0) {
            doOrbit = true
          }
  
        } else {
          doOrbit = true
        }
        return doOrbit
      }
  
  
      function pytho(e){
        var dist =Math.sqrt(((e.touches[0].pageX-e.touches[1].pageX) * (e.touches[0].pageX-e.touches[1].pageX) +
          (e.touches[0].pageY-e.touches[1].pageY) * (e.touches[0].pageY-e.touches[1].pageY)));
  
          return dist;
      }
  
      function hideMouseOverDetails () {
        // var me=this;
        mee.hotspotDetails.css({
          'display':'none',
          'transform': 'perspective(400px) rotateX(90deg)',
          '-webkit-transform': 'perspective(400px) rotateX(90deg)'
        })
      }
  
      function showMouseOverDetails (top,left,content) {
        // var me=this;
        mee.hotspotDetails.css({
          'display':'inline', 
          'top':top, 
          'left':left,
          'transform': 'perspective(400px) rotateX(0deg)',
          '-webkit-transform': 'perspective(400px) rotateX(0deg)'
  
        })
        mee.hotspotDetails_content.html(content) 
  
      }
  
  
      function setupDebug () {
        // var me = this;
        //me.setupGui()
        setUpStats()
      }
  
      function setUpStats () {
        // var me = this;
        stats = new Stats();
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.top = '0px';
        mee.$elem.append( stats.domElement );
  
      }
  
  
  
      function animate () {
          if (mee.destroyed)
            return;
        mee.animationHandler = requestAnimationFrame( animate.bind(mee) );
        // var me = this;
        // console.log(me.targetRotation_y)
        if (  mee.targetRotation_y < -1.4) {  mee.targetRotation_y = -1.4};
        if (  mee.targetRotation_y > 1.4) { mee.targetRotation_y = 1.4};
  
        //autorotation check
        if (options.autoRotate.val != false && options.autoRotate.val != false ) {
          mee.targetRotation_x = mee.targetRotation_x + options.autoRotateSpeed.val*1
        };
  
        mee.globeContainer.rotation.y += ( mee.targetRotation_x - mee.globeContainer.rotation.y ) * options.momentum.val;
        mee.globeContainerParent.rotation.z += ( -1 * mee.targetRotation_y - mee.globeContainerParent.rotation.z ) * options.momentum.val;
  
  
        // mee.globeContainerParent.rotation.x += (  mee.targetRotation_y - mee.globeContainerParent.rotation.x ) * options.momentum.val;
  
        TWEEN.update();
        render();
  
      }
  
  
      function resizeRendererToDisplaySize(renderer) {
        var canvas = renderer.domElement;
        var width = canvas.clientWidth;
        var height = canvas.clientHeight;
        var needResize = canvas.width !== width || canvas.height !== height;
        
        return needResize;
      }
  
  
      function render () {
  
        if (resizeRendererToDisplaySize(mee.renderer)) {
  
          var canvas = mee.renderer.domElement;
  
          windowDimensionX = canvas.clientWidth
          windowDimensionY = canvas.clientHeight
  
          mee.renderer.setSize(windowDimensionX, windowDimensionY, false);
        
        }
  
        mee.renderer.render( mee.scene, mee.camera );
  
        if(options.debugMode.val===true){
          stats.update();      
        }
      
        //update hotspots
        for (var i = 0; i < mee.hotspotsArr.length; i++) {
          
          //get hotspot initial, non translated, position
          var hotspotLocalPos = mee.hotspotsArr[i].getPosition()
          
          //convert to vec3
          hotspotLocalPos = new THREE.Vector3( hotspotLocalPos.x, hotspotLocalPos.y, hotspotLocalPos.z )
  
          //transform local position to worldposition
          var coord = mee.globeContainer.localToWorld( hotspotLocalPos )
  
          //convert worldposition to 2D screencoords
          var screenPos = screenXY( coord );
  
          //Adjust position for alignment TL, TM, TR, ML, MM, MR, BL, BM, BR
          //get alignmentoption
          var alignOption = mee.hotspotsArr[i].data.hotspotalign;
  
          //get the divs width and height
          var dim = mee.hotspotsArr[i].data.dim;
  
          //update values based on alignOption
          switch (alignOption){
            case 'LT':
              break;
            case 'MT':
              screenPos.x = screenPos.x - (dim.width / 2);
              break;
            case 'RT':
              screenPos.x = screenPos.x - (dim.width);
              break;
            case 'LM':
              screenPos.y = screenPos.y - (dim.height / 2);
              break;
            case 'MM':
              screenPos.x = screenPos.x - (dim.width / 2);
              screenPos.y = screenPos.y - (dim.height / 2);
              break;
            case 'RM':
              screenPos.x = screenPos.x - (dim.width);
              screenPos.y = screenPos.y - (dim.height / 2);
              break;
            case 'LB':
              screenPos.y = screenPos.y - (dim.height);
              break;
            case 'MB':
              screenPos.x = screenPos.x - (dim.width / 2);
              screenPos.y = screenPos.y - (dim.height);
              break;
            case 'RB':
              screenPos.x = screenPos.x - (dim.width);
              screenPos.y = screenPos.y - (dim.height);
              break;
            default:
              break;
          }
  
  
          //Update the divs position (top, left, z-index)
          mee.hotspotsArr[i].setPosition(screenPos.x, screenPos.y, hotspotLocalPos.z)
  
          // console.log(hotspotLocalPos)
  
  
          //LOD
          mee.hotspotsArr[i].setVisible(hotspotLocalPos.z < 0.5)
          
          //Experiment with opacity to simulate distancefog
           mee.hotspotsArr[i].setOpacity(hotspotLocalPos.z)
  
        };

        for (var i = 0; i < mee.overlaysArr.length; i++) {
          
            //get hotspot initial, non translated, position
            var overlayLocalPos = mee.overlaysArr[i].getPosition()

            //convert to vec3
            overlayLocalPos = new THREE.Vector3( overlayLocalPos.x, overlayLocalPos.y, overlayLocalPos.z )

            //transform local position to worldposition
            var coord = mee.globeContainer.localToWorld( overlayLocalPos )

            //convert worldposition to 2D screencoords
            var screenPos = screenXY( coord );

            //Adjust position for alignment TL, TM, TR, ML, MM, MR, BL, BM, BR
            //get alignmentoption
            var alignOption = mee.overlaysArr[i].data.hotspotalign;

            //get the divs width and height
            var dim = mee.overlaysArr[i].data.dim;

            screenPos.x = screenPos.x - (dim.width / 2);
            screenPos.y = screenPos.y - (dim.height / 2);

            //Update the divs position (top, left, z-index)
            mee.overlaysArr[i].setPosition(screenPos.x, screenPos.y, overlayLocalPos.z)

            // console.log(overlayLocalPos)


            //LOD
            mee.overlaysArr[i].setVisible(overlayLocalPos.z < 0.5)

            //Experiment with opacity to simulate distancefog
            mee.overlaysArr[i].setOpacity(overlayLocalPos.z)

        };
  
      }
  
      function screenXY (vec3) {
        // var me = this;
        var result = new Object();
        vec3.project( mee.camera );
  
        result.x = /*Math.round*/( vec3.x * (windowDimensionX/2) ) + windowDimensionX/2;
        result.y = /*Math.round*/( (0-vec3.y) * (windowDimensionY/2) ) + windowDimensionY/2;
        return result;
  
      }
  
      // function screenXY (vec3) {
        // var projector = new THREE.Projector();
        // var vector = projector.projectVector( vec3.clone(), camera );
        // var result = new Object();
        // result.x = Math.round( vector.x * (windowDimensionX/2) ) + windowDimensionX/2;
        // result.y = Math.round( (0-vector.y) * (windowDimensionY/2) ) + windowDimensionY/2;
        // return result;
  // 
      // }
      
      function addOverlay(overlayData) {
         // console.log(hotspotData)
  
         var jqOverlay = $(overlayData.inner).clone().appendTo(mee.overlay)
         var overlay = jqOverlay.get(0)
   
         // store data locally
         overlay.data = overlayData;
   
         //handle z-indexing
         overlay.data.zMod = 0;

         jqOverlay.addClass('earth-ov');
  
         overlay.setPosition = function(x,y,z){ //sets the divs top and left css attributes
        //    this.style.transform = 'translate(' + x + 'px,' + y + 'px)';

        //    this.style.zIndex = Math.round(500+z+this.data.zMod);
            gsap.set(this, {
                x: x,
                y: y,
                zIndex: Math.round(500+z+this.data.zMod),
                force3D: true
            })
         }
   
         overlay.setVisible = function( vis ){
           if( ! vis )
             this.style.display = 'none';
             // this.style.zIndex = 1;
           else{
             // this.style.zIndex = 10;
             this.style.display = 'inline';
           }
         }
   
         overlay.setOpacity = function( zPos ){
           var opa = 20 * ((1 - zPos) - 0.5)
           this.style.opacity = opa;
         }
   
         overlay.getPosition = function(){
           return translateGeoCoords(this.data.lat, this.data.long, options.globeRadius.val);    //return the overlays initial position, its later translated to correspond to the globes rotation and scale
         }
  
         //calculate width and height
         overlay.data.dim = {
             width: jqOverlay.width(),
             height: jqOverlay.height()
         };
         
         mee.overlaysArr.push(overlay);
         return overlay
      }

      function addHotspot (hotspotData ) {
        // console.log(hotspotData)
  
        var jqHotspot = mee.hotspotTemplate.clone().appendTo(mee.overlay)
        var hotspot = jqHotspot.get(0)
  
        //set data- attribs to enable links back to original content
        for (var key in hotspotData) {
          $(hotspot).attr('data-'+key,hotspotData[key])
        }
  
        //add hotspotCssOverride class
        jqHotspot.addClass(options.hotspotCssOverride.val)
  
        // store data locally
        hotspot.data = hotspotData;
  
        //add local class overrides
        jqHotspot.addClass(hotspot.data.hotspotclass)
  
        //handle z-indexing
        hotspot.data.zMod = 0
  
        //attach icons to hotspots
        if(hotspot.data.hotspoticon==undefined || hotspot.data.hotspoticon==""){
          //update hotspots dataobject to include default icon
          hotspot.data.hotspoticon = options.hotSpotIcon.val
        }
  
        jqHotspot.html(`
            <svg data-name="${hotspot.data.name}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.2" baseProfile="tiny" id="Layer_1" x="0px" y="0px" width="18.5px" height="18.5px" viewBox="0 0 18.5 18.5" overflow="visible" xml:space="preserve">
            <g>
                <g>
                    <path fill="${hotspot.data.color}" d="M9.3,3.6c-3.1,0-5.7,2.6-5.7,5.7s2.5,5.6,5.7,5.6c3.1,0,5.7-2.5,5.7-5.7C14.9,6.1,12.4,3.6,9.3,3.6z"/>
                </g>
            </g>
            </svg>
            
        `)
      
        hotspot.selected = false;
        hotspot.hover = false;
 
        hotspot.setPosition = function(x,y,z){ //sets the divs top and left css attributes
            
            gsap.set(this, {
                x: x,
                y: y,
                zIndex: Math.round(500+z+this.data.zMod),
                force3D: true
            })
        //   this.style.transform = 'translate(' + x + 'px,' + y + 'px)';
          // this.style.top = y + 'px';  
          // this.style.left = x + 'px';
          // this.style.top = y + 'px';  
        //   this.style.zIndex = Math.round(500+z+this.data.zMod);
        }
  
        hotspot.setVisible = function( vis ){
          if( ! vis )
            this.style.display = 'none';
            // this.style.zIndex = 1;
          else{
            // this.style.zIndex = 10;
            this.style.display = 'inline';
          }
        }
  
        hotspot.setOpacity = function( zPos ){
          // console.log("opa")
          // if( zPos >= 0.5 && zPos <= 0.75 )
          var opa = 20 * ((1 - zPos) - 0.5)
          gsap.set(this, {opacity: opa})
        //   this.style.opacity = opa;
          // else{
           // this.style.opacity = 1;
          // }
        }
  
        hotspot.getPosition = function(){
          return this.data.pos    //return the hotspots initial position, its later translated to correspond to the globes rotation and scale
        }
  
        hotspot.getDim = function(){    //we need to know the width and height of each hotspot, to account for custom alignment LT, RT ...
          var dim = {}
          var img = new Image();      //img is a temporary placeholder used to measure the hotspot graphics
          img.onload = function(e){
            dim.width = this.width;
            dim.height = this.height;
            document.body.removeChild(img);
          }
          img.src = options.assetPath.val + hotspot.data.hotspoticon;
          img.style.position = "absolute";
          img.style.left = -9999; 
          img.style.visibility = "hidden";    
          document.body.appendChild(img);
          return dim
        }
        //calculate width and height
        hotspot.data.dim = hotspot.getDim()
  
        return hotspot
      }
 
      function translateGeoCoords (lat, lng, r) {
        lng = -1 * lng
        var x = r * Math.cos(lat * Math.PI/180) * Math.cos(lng * Math.PI/180);
        var y = r * Math.sin(lat * Math.PI/180);
        var z = r * Math.cos(lat * Math.PI/180) * Math.sin(lng * Math.PI/180);
        
        return { x: x, y: y, z: z }
  
      }
  
      /**
       * Public Methods
       */
      function getRotation(){
        //returns the globes rotation
        var lat = mee.globeContainerParent.rotation.z
  
        //tweak it into place and remove whole revs
        var lng = (mee.globeContainer.rotation.y) % (2*Math.PI);
        //mee.globeContainer.rotation.y = lng
        // var lng = (mee.globeContainer.rotation.y + Math.PI/2) % (2*Math.PI);
  
        //reverse direction
        lng *= -1
  
        //convert to 2*+/-0,5 revs
        if(lng > Math.PI) lng = lng - (2 * Math.PI);
  
        //create output in degrees
        var r = {}
        r._z = (lat * 180 / Math.PI) * -1;
        r._y = lng * 180 / Math.PI;
  
        r.lat = r._z;
        r.lng = r._y;
  
        return r;
  
      }
  
      function getZoom(){
        // returns the globes zoom
        return mee.camera.zoom
      }
  
      function getCoords() {
  
        //consider using getMouseIntersection
  
        //returns the mouse coords in lat, long
        //get normalized mousecoords -1 -> 1
  
        var vector = new THREE.Vector3();
        var raycaster = new THREE.Raycaster();
        var dir = new THREE.Vector3();
  
        var mouse2DX = (mouseX/windowDimensionX)*2-1 // changed from localmousex
        var mouse2DY = -(mouseY/windowDimensionY)*2+1
  
        vector.set( mouse2DX, mouse2DY, - 1 ); // z = - 1 important! 
        vector.unproject( mee.camera );
        dir.set( 0, 0, - 1 ).transformDirection( mee.camera.matrixWorld );
        raycaster.set( vector, dir );
  
        var intersects = raycaster.intersectObjects( mee.globeArr, true );
  
        if (intersects.length > 0) {
  
          var p = intersects[0].point
          var local = mee.globeContainer.worldToLocal(p)
  
          var lat = 90 - (Math.acos(p.y / options.globeRadius.val)) * 180 / Math.PI;
          lat = lat.toFixed(3)
  
          var lng = ((-270 + (Math.atan2(p.x , p.z)) * 180 / Math.PI) % 360) +180;
          lng = lng.toFixed(3)
  
          var o = {}
          o.lat = lat
          o.lon = lng
          return o;
        };
  
      }
  
      //rebuilds the hotspots
      function refresh () {
        // console.log("refresh")
        //empty iconsarr
        mee.hotspotsArr = []
        //delete icons
        mee.overlay.empty()
  
        //generate new icons
        $("._hotspot").addClass('hotspot')
  
        //repopulate iconsarr
        generateContent();
      }
  
      function zoom(level, time){
  
        zoomGlobe({zoomValue:level, zoomTime:time, restricted:false})
  
      }
  
      // removes navigation
      function pauseNav () {
        removeListeners()
      }
  
      // restores navigation
      function startNav(){
        setupListeners()
      }
  
      function rotate(lat, lng) {
        //lat - height
        //lng - width
        //ie - y,x notation
        if (lng != undefined) {
  
          //input subtracted whole revs
          lng = lng % (360)
          
          //store current rotation in rads and degrees
          var currentAngle_rad = mee.globeContainer.rotation.y
          var currentAngle_deg = mee.globeContainer.rotation.y * (180/Math.PI)
          
          //subtract whole revs from current rotation
          mee.globeContainer.rotation.y = currentAngle_rad % (2*Math.PI)
         
          //new angle converted to rads
          var newAngle = (-lng * (Math.PI / 180))
          
          // make it hit 0 when user inputs 0 - because the camera is looking at a 90 angle
          // var correction_rad = (Math.PI/2)*-1
          // var newAngle = a_rad
  
          mee.targetRotation_x = newAngle
        
        };
  
        if (lat != undefined) {
          mee.targetRotation_y = ((lat) * (Math.PI / 180)) % (Math.PI)
          // console.log(mee.targetRotation_y)
        };
  
  
  
      }
      
      /**
       * Get/set a plugin option.
       * Get usage: $('#el').demoplugin('option', 'key');
       * Set usage: $('#el').demoplugin('option', 'key', value);
       */
      function option (key, val) {
        if (val) {
          options[key] = val;
        } else {
          return options[key];
        }
        // console.log(options)
      }
  
      //returns optionsobject
      function getOptions(){
        return options;
      }
      
      function stopAutoRotate () {
        options.autoRotate.val = false
      }

      //Starts autorotate feature
      function startAutoRotate () {
        options.autoRotate.val = true
      }
   
      //reinitializes the globe, used when generator adds/changes options/hotspots
      function reInit(infoObj){//{_z: -0, _y: -0, lat: -0, lng: -0, zoomLevel: 1}
        // console.log("reinitsGlobe")
        init()
        rotate(infoObj._z, infoObj._y)
  
        if (infoObj.zoomLevel) {
          zoom(infoObj.zoomLevel, 500)
        };
      }

      function destroy() {
          mee.destroyed = true;
      }
   
    //   /**
    //    * Destroy plugin.
    //    * Usage: $('#el').demoplugin('destroy');
    //    */
    //   function destroy() {
    //     // Iterate over each matching element.
    //     $el.each(function() {
    //       var el = this;
    //       var $el = $(this);
   
    //       // Add code to restore the element to its original state...
   
    //       hook('onDestroy');
    //       // Remove Plugin instance from the element.
    //       $el.removeData('plugin_' + pluginName);
    //     });
    //   }
   
      /**
       * Callback hooks.
       * Usage: In the defaults object specify a callback function:
       * hookName: function() {}
       * Then somewhere in the plugin trigger the callback:
       * hook('hookName');
       */
      function hook(hookName) {
        if (options[hookName] !== undefined) {
          // Call the user defined function.
          // Scope is set to the jQuery element we are operating on.
          options[hookName].call(el);
        }
      }
   
      // Initialize the plugin instance.
      init();
   
      // Expose methods of Plugin we wish to be public.
      return {
        option: option, // set option (key, val)
        destroy: destroy,
        rotate: rotate, //(lat, lng)
        refresh: refresh,
        getOptions: getOptions,
        reInit: reInit,
        getCoords:getCoords, //(returns the lat lon of the last mouseclick position)
        getRotation:getRotation, //(returns the globes rotation - often used with reInit)
        zoom:zoom, //(level, time)
        getZoom:getZoom,
        startNav:startNav,
        pauseNav:pauseNav,
        startAutoRotate:startAutoRotate,
        stopAutoRotate: stopAutoRotate,
        addOverlay: addOverlay,
      };
    }
   
    /**
     * Plugin definition.
     */
    $.fn[pluginName] = function(options) {
      // If the first parameter is a string, treat this as a call to
      // a public method.
      if (typeof arguments[0] === 'string') {
        var methodName = arguments[0];
        var args = Array.prototype.slice.call(arguments, 1);
        var returnVal;
        this.each(function() {
          // Check that the element has a plugin instance, and that
          // the requested public method exists.
          if ($.data(this, 'plugin_' + pluginName) && typeof $.data(this, 'plugin_' + pluginName)[methodName] === 'function') {
            // Call the method of the Plugin instance, and Pass it
            // the supplied arguments.
            returnVal = $.data(this, 'plugin_' + pluginName)[methodName].apply(this, args);
          } else {
            throw new Error('Method ' +  methodName + ' does not exist on jQuery.' + pluginName);
          }
        });
        if (returnVal !== undefined){
          // If the method returned a value, return the value.
          return returnVal;
        } else {
          // Otherwise, returning 'this' preserves chainability.
          return this;
        }
  
      // If the first parameter is an object (options), or was omitted,
      // instantiate a new instance of the plugin.
      } else if (typeof options === "object" || !options) {
        return this.each(function() {
          // Only allow the plugin to be instantiated once.
          if (!$.data(this, 'plugin_' + pluginName)) {
            // Pass options to Plugin constructor, and store Plugin
            // instance in the elements jQuery data object.
            _me = $.data(this, 'plugin_' + pluginName, new Plugin(this, options));
  
            // console.log($.data(this, 'plugin_' + pluginName))
          }
        });
      }
    };
   
    // Default plugin options.
    // Options can be overwritten when initializing plugin, by
    // passing an object literal, or after initialization:
    // $('#el').demoplugin('option', 'key', value);
    $.fn[pluginName].options = {
      globeRadius:{val: 200, desc:"defines the size of the globe"},
      globeShine:{val: 10, desc:"defines the shininess of the globes material"},
       globeTexture:{val: "http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/img/earthmap10k_comp.jpg"/*"textures/terra_equi.jpg"*/, desc:"defines wich texture to use for the globe"},
      globeBump:{val: "http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/img/earthbump1k.jpg"/*"textures/terra_equi.jpg"*/, desc:"defines wich texture to use for the globe"},
      globeMinScale:{val: 0.3, desc:"sets minimum zoomlevel"},
      globeMaxScale:{val: 2.5, desc:"sets maximum zoomlevel"},
      globeSegments:{val: 50, desc:"defines the globes coarsness - high value (50) gives smooth and round globe, lower values might increase performance on slow systems"},
      momentum:{val: 0.07, desc:"defines the globes rotation-momentum, low values produce more momentum (the globe appears heavier)"},
      ambientIntensity:{val:"2.5", desc:"defines the intensity for the ambient light"},
      ambientColor:{val:"#555584", desc:"defines the color for the ambient light"},
      ambientPosX:{val:"-5000", desc:"defines the x-position for the ambient light"},
      ambientPosY:{val:"-15000", desc:"defines the y-position for the ambient light"},
      ambientPosZ:{val:"-15000", desc:"defines the z-position for the ambient light"},
      headLampIntensity:{val: 1.2, desc:"defines intensity for the main light"},
      headLampColor:{val: "#ffffff", desc:"defines color for the main light"},
      headLampPosX:{val: 500, desc:"defines x position for the main light"},
      headLampPosY:{val: 1000, desc:"defines y position for the main light"},
      headLampPosZ:{val: 0, desc:"defines z position for the main light"},
      hotSpotIcon:{val: "http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/img/nano_LT.png",  desc:"default texture for the hotspots - hotspots are alignet left-top by default"},
      backPlateTexture:{val: "http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/img/backPlate_glow.png", desc:"texture for the globes halo"},
      backPlateMargin:{val: 50, desc:"defines how far the halo extends from the globe"},
      debugMode:{val: false, desc:"used for testing"},
      popWidth:{val: "80%",  desc:"default maxwidth for colorbox popup"},
      popHeight:{val: "80%",  desc:"default maxheight for colorbox popup"},
      // camX:{val: 1500,  desc:"default camera x position"},
      // camY:{val: 0,  desc:"default camera y position"},
      // camZ:{val: 0, desc:"default camera z position"},
      contentClass:{val: ".hotspot", desc:"wich class to use for hotspotgeneration"},
      hotspotCssOverride:{val: "hotspot_override", desc:"Use this to override graphic properties on hotspots"},
      cameraTargetX:{val:0 , desc:"cameras target x position"},
      cameraTargetY:{val:0 , desc:"cameras target y position"},
      cameraTargetZ:{val:0 , desc:"cameras target z position"},
      autoRotateSpeed:{val: .02, desc:"sets the speed on autorotate"},
      autoRotate:{val: true, desc:"makes the globe autorotate on startup"},
      clickExternal:{val: false, desc:"name of custom function to call on hotspotclick - overrides the default lightbox popup"},
      assetPath:{val: "", desc:"Use this to prepend all assets with a path"},
      zoomWheelDirection:{val: 'downIn', desc:"Use this to control the direction of zoomwheel zooms - options are 'downIn' or 'downOut'"},
      onlyOrbitOnGlobe:{val: true, desc:"If true the globe only reacts if mouse is hitting it directly - if false the globe reacts on all inputs on its containing div"},
      allowUserZoom:{val: true, desc:"If false zooming is disabled"},
  
      // distanceBlend:{val:false, desc:"Used to fade hotspots out when they reach the globes rim"} //permanemt on
  
    };
  
   
  })(jQuery);