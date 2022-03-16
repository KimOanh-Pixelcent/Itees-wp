<?php 
	/*
	** Template name: Template - Iframe 
	*/
	get_header('globe'); 
?>
<?php

$id = 21;
if(!empty($_GET['id'])){
	//$id = $_GET['id'];
}
$id_post = 0;
if(!empty($_GET['id_post'])){
	$id_post = $_GET['id_post'];
}
?>

<style>
	@media only screen and (min-width: 992px){
		html,body, .body-container, .site-content{ width:100%; height:100%; margin:0;}
		.slide .main-item::-webkit-scrollbar, html::-webkit-scrollbar{
			display: none;
		}
		.slide .main-item, html{
		  -ms-overflow-style: none;
		  scrollbar-width: none;
		}    
		.slide .main-item{
			overflow-x: hidden;
		}
	}
header,footer{display:none!important;}
.c-white{color:#ffffff!important;}
.c-dark{color:#442E2E!important;}
#content{
    display: flex;
    justify-content: center;
    align-items: center;
}
.prj-top{padding:unset!important;padding-top:3rem!important;}
</style>
 	<link rel="stylesheet" href="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/colorbox.css">
	<link rel="stylesheet" href="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/earthviewer_styles_unique.min.css">
	<script src="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/jquery.min.js"></script>
	<script src="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/globe.min.js"></script>
<?php 
$_SESSION['id_p'] = array();
$prev_post = get_posts(array('post_type' => 'projects','exclude' => array($id_post),  'tax_query' => array(array('taxonomy' => 'country','field' => 'term_id','posts_per_page' => -1,'terms' => $_GET['id']))));
if(!empty($prev_post)){
	$next_post = get_posts(array('post_type' => 'projects','exclude' => array($id_post,$prev_post[0]->ID),'tax_query' => array(array('taxonomy' => 'country','field' => 'term_id','posts_per_page' => 1,'terms' => $_GET['id'])))); 
}
$next_post = get_next_post(true,505,'country');
var_dump($next_post);
?>
	<div class="container-fluid prj-top">
		<div class="row"> 
			<div class="col-lg-9 col-md-9 col-12">
				<p class="prj-title title-top">Project: <?php echo get_the_title($_GET['id_post']); ?></p>
				<?php $term = get_term_by( 'id',$_GET['id'], 'country' ); ?>
				<p class="prj-location"><a target="_parent" href=""><?php echo $term->name;?></a></p>
				 
				<div class="container-fluid prj-bg-grey" style="background-color:#DD3E47;">
					<?php $terms = get_the_terms( $_GET['id_post'], 'category-project' );?> 
					<?php if(!empty($terms)){ ?>
							<p class="prj-tags" style="color:#ffffff;"><?php if(!empty($terms)){ echo join(' • ',wp_list_pluck($terms, 'name')); }?></p>
					<?php } ?>
					<?php
					$excerpt = substr(get_the_excerpt(), 0, 99);
					$result = substr($excerpt, 0, strrpos($excerpt, ' '));
					?> 
 
					<p class="prj-info" style="color:#ffffff;"><?php echo wp_strip_all_tags( $result, true ); ?></p>
					<p class="prj-info pt-5 pb-3"><a target="_parent" class="c-white" style="border:1px solid #ffffff;padding:10px 20px;font-weight:700;font-size:18px;" href="<?php the_permalink($_GET['id_post']);?>">Learn More</a><a class="c-white pl-4" style="font-weight:700;font-size:18px;" target="_parent" href="<?php the_permalink(80);?>">View All Projects</a></p>
				</div>
		 
				<div class="container-fluid prj-bg-grey" style="background-color:#ffffff;">
					<p class="prj-info pt-4">
					 
						<a class="c-dark" style="font-weight:700;font-size:18px;" href="<?php echo site_url();?>/iframe/?id=<?php echo $_GET['id'];?>&id_post=<?php echo $prev_post[0]->ID;?>">Previous Project</a>
					 
					
					 
						<a class="c-dark pl-4" style="font-weight:700;font-size:18px;"  href="<?php echo site_url();?>/iframe/?id=28&id_post=<?php echo $next_post[0]->ID;?>">Next Project</a></p>
					 
				</div>
		 
				<div class="prj-globe">
					<div id="globeGl_" class="globeGl"> </div>
					<div class="hotspot h5g_hidden" data-hotSpotIcon="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/images/Vector-main.png" data-lat="<?php echo get_field('long',$id_post);  ?>" data-long="<?php echo get_field('long',$id_post);  ?>"><?php echo get_field('location',$id_post);  ?></div> 
					<?php foreach($prev_post as $row){ ?>
						<div class="hotspot h5g_hidden"  data-hotSpotIcon="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/images/Vector.png" data-lat="<?php echo get_field('lat',$row->ID);  ?>" data-long="<?php echo get_field('long',$row->ID);  ?>" ><?php echo get_field('location',$row->ID);  ?></div>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-12">
			</div>
		</div>		
	</div>
 
			
	
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/plugins/ScrollToPlugin.min.js'></script>
<script src='<?php echo site_url(); ?>/wp-content/themes/itees/assets/js/scrollpane.js'></script>
<script src='<?php echo site_url(); ?>/wp-content/themes/itees/assets/js/jquery.onepage-scroll.min.js'></script>
	<script>
		var g = $("div#globeGl_").globe({
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
			hotSpotIcon:{val:"http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/images/marker.png"},
			hotSpotsubIcon:{val:"http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/images/marker.png"},
			backPlateTexture:{val:"http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/img/backPlate_glow.png"},
			backPlateMargin:{val:30},
			debugMode:{val:false},
			popWidth:{val:"100%"},
			popHeight:{val:"100%"},
			contentClass:{val:".hotspot"},
			hotspotCssOverride:{val:"hotspot_override"},
			cameraTargetX:{val:0},
			cameraTargetY:{val:0},
			cameraTargetZ:{val:0},
			autoRotateSpeed:{val:0.002},
			autoRotate:{val:true},
			clickExternal:{val:true},
			assetPath:{val:""},
			zoomWheelDirection:{val:"downOut"},
			onlyOrbitOnGlobe:{val:true},
			allowUserZoom:{val:false},
		});
  		

		$("#globeGl_").on('mouseenter touchstart', function() {
			//$("#globeGl_").globe('stopAutoRotate');
		}) 
		$("#globeGl_").on('mouseleave touchend', function() {
			//$("#globeGl_").globe('startAutoRotate');
		})
		
	</script>
 
  
<script type="text/javascript" src="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/imagesloaded.min.js"></script>
<script type="text/javascript" src="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/masonry.min.js"></script>
<script type="text/javascript" src="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/jquery.masonry.min.js"></script>
<script type="text/javascript" src="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/functions.js"></script>
<script type="text/javascript" src="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/wp-embed.min.js"></script>

 <?php get_footer('content'); ?>