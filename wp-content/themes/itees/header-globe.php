<?php 

	if ( ! defined( 'ABSPATH' ) ) {

		exit; // Exit if accessed directly.

	}

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" href="" sizes="180x180">
<link rel="icon" href="" sizes="32x32" type="image/png">
<link rel="icon" href="" sizes="16x16" type="image/png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script type="text/javascript">
	window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/html5globe.fjordsite.dk\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.4.7"}};
	/*! This file is auto-generated */
	!function(e,a,t){var n,r,o,i=a.createElement("canvas"),p=i.getContext&&i.getContext("2d");function s(e,t){var a=String.fromCharCode;p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,e),0,0);e=i.toDataURL();return p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,t),0,0),e===i.toDataURL()}function c(e){var t=a.createElement("script");t.src=e,t.defer=t.type="text/javascript",a.getElementsByTagName("head")[0].appendChild(t)}for(o=Array("flag","emoji"),t.supports={everything:!0,everythingExceptFlag:!0},r=0;r<o.length;r++)t.supports[o[r]]=function(e){if(!p||!p.fillText)return!1;switch(p.textBaseline="top",p.font="600 32px Arial",e){case"flag":return s([127987,65039,8205,9895,65039],[127987,65039,8203,9895,65039])?!1:!s([55356,56826,55356,56819],[55356,56826,8203,55356,56819])&&!s([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]);case"emoji":return!s([55357,56424,55356,57342,8205,55358,56605,8205,55357,56424,55356,57340],[55357,56424,55356,57342,8203,55358,56605,8203,55357,56424,55356,57340])}return!1}(o[r]),t.supports.everything=t.supports.everything&&t.supports[o[r]],"flag"!==o[r]&&(t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&t.supports[o[r]]);t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&!t.supports.flag,t.DOMReady=!1,t.readyCallback=function(){t.DOMReady=!0},t.supports.everything||(n=function(){t.readyCallback()},a.addEventListener?(a.addEventListener("DOMContentLoaded",n,!1),e.addEventListener("load",n,!1)):(e.attachEvent("onload",n),a.attachEvent("onreadystatechange",function(){"complete"===a.readyState&&t.readyCallback()})),(n=t.source||{}).concatemoji?c(n.concatemoji):n.wpemoji&&n.twemoji&&(c(n.twemoji),c(n.wpemoji)))}(window,document,window._wpemojiSettings);
</script>
<script src="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/wp-emoji-release.min.js" type="text/javascript" defer=""></script>
<style type="text/css">
	img.wp-smiley,
	img.emoji {
		display: inline !important;
		border: none !important;
		box-shadow: none !important;
		height: 1em !important;
		width: 1em !important;
		margin: 0 .07em !important;
		vertical-align: -0.1em !important;
		background: none !important;
		padding: 0 !important;
	}
</style>
<link rel="stylesheet" id="genericons-css" href="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/genericons.css" type="text/css" media="all">
<script type="text/javascript" src="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/jquery.js"></script>
<script type="text/javascript" src="http://itees.vinova.sg/wp-content/themes/itees/assets-gobal/dangpx_files/jquery-migrate.min.js"></script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="body-container">
		<div id="content" class="site-content">
			<header>
				<div class="container k-relative" style="z-index: 999;">
					<div class="row align-center">
						<div class="col-md-3 col-5">

							<div class="k-logo">

								<?php if( get_field('logo', 'option')['url'] ): ?>
									<a href="<?php echo site_url(); ?>">
										<img src="<?php echo get_field('logo', 'option')['url']; ?>" alt="">
									</a>
								<?php endif; ?>		
							</div>

						</div>
						<div class="col-md-9 col-7 text-right">

							<div class="k-nav flex-align-center">

								<div>

									<a href="<?php echo site_url(); ?>/contact-us/" class="k-btn-default k-btn-main">Contact Us</a>

								</div>

								<div class="pl-3">

									<a href="<?php echo site_url(); ?>/login/" class="k-btn-default k-btn-white">Login</a>

								</div>

								<div id="nav-bar" class="nav-bar icon-bar ml-3">

									<img src="<?php echo site_url(); ?>/wp-content/themes/itees/assets/img/DotsNine.svg" alt="" class="nav_show">

									<div class="nav_close">

										<span></span>

										<span></span>

									</div>

								</div>

							</div>

						</div>
					</div>	
				</div>
				<div class="nav-sidebar">
					<?php 
						$menuLocations = get_nav_menu_locations();
						$primaryNav = wp_get_nav_menu_items($menuLocations['primary-menu']);  ?>
					<div class="nav-content-bar">
						<div class="nav-tab-content">
							<div class="nav-tab">
					<?php 						
						if(!empty($primaryNav)):
							$i = 1;
							foreach ( $primaryNav as $navItem ):
								if($navItem->menu_item_parent == 0): ?>

								<p <?php if($navItem->object_id == 6){echo 'id="nav-home"'; } ?> class="nav-menu <?php if($i==1){echo 'active';} ?>" style="--i:<?php echo $i; ?>;">
									<a href="<?php echo $navItem->url; ?>"><?php echo $navItem->title; ?></a>
									<?php if($navItem->object_id == 29){ ?>
										<span class="arrow-next">
											<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/ArrowRight.svg" alt="">
										</span>
									<?php } ?>
								</p>
							<?php endif; $i++; endforeach; endif; ?>
							</div>
							<div class="btn-mb">
								<a href="<?php echo site_url(); ?>/contact-us/" class="k-btn-default k-btn-main">Contact Us</a>
								<a href="<?php echo site_url(); ?>/login/" class="k-btn-default k-btn-white">Login</a>
							</div>
						</div>
						<div class="nav-content">
						<?php if(!empty($primaryNav)): 
							$j = 1;
							foreach ( $primaryNav as $navItem ):
								if($navItem->menu_item_parent == 0): ?>

									<div class="group nav-content-<? echo $j; ?> <?php if($j==1){echo 'active'; } ?>">
										
										<?php if($navItem->object_id != 29): ?>

											<div class="item">
												<p><?php echo get_post_meta( $navItem->object_id, 'hero_exceprt', true ); ?></p>
											</div>
											<div class="item k-relative">
												<div class="bg" style="background-image: url(<?php echo get_the_post_thumbnail_url( $navItem->object_id, 'full' ) ?>); background-size: cover;"></div>

												<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/Bg-659x569-1.png" alt="" class="fade w-100">
											</div>
											
										<?php else: ?>			

											<?php $query = new WP_Query(array(
												'post_type' => 'our_services',
												'post_status' => 'publish',
												'posts_per_page' =>  -1,
												'orderby' => 'date',
												'order'   => 'DESC',
											)); ?>
											<div class="item">
												<div class="nav-tab-2">
										<?php if($query->have_posts()):		
											$e=1;	
											while ( $query->have_posts() ) : $query->the_post(); ?>

												<p class="nav-menu-item <?php if($e==1){echo 'active';} ?>" <?php echo 'style="--i:'.$e.'"' ?>>
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</p>

										<?php $e++; endwhile; endif; wp_reset_postdata(); ?>
												</div>
											</div>
											<div class="nav-content-item">

										<?php if($query->have_posts()):	
											$t=1;	
											while ( $query->have_posts() ) : $query->the_post(); ?>

											<div class="item nav-content-item-<?php echo $t; ?>
												<?php if($t==1){echo 'active';} ?>">
												<div class="k-relative">

											<?php if( have_rows('menu_image') ):
											while( have_rows('menu_image') ): the_row();  ?>

												<div class="bg" style="background-image: url(<?php echo get_sub_field('desktop_image'); ?>); background-size: cover;"></div>

											<?php endwhile; endif; ?>

												<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/Bg-659x373-1.png" alt="" class="fade w-100">
												</div>
												<div class="des">
													 <p><?php echo get_post_meta( get_the_ID(), 'hero_exceprt', true ); ?></p>
												</div>
											</div>
										<?php $t++; endwhile; endif; wp_reset_postdata(); ?>
											</div>	
										<?php endif; ?>
									</div>	
						<?php endif; $j++; endforeach; endif; ?>
						</div>	
					</div>
					<div class="mb-services-tab">
						<div class="k-relative arrow-ico">
							<div class="arrow-back">
								<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/ArrowRight.svg" alt="">
							</div>
							<div class="nav-bar nav_close" style="display: block; ">
								<span></span>
								<span></span>
							</div>
						</div>

				<?php if($query->have_posts()):	
					$q=1;	
					while ( $query->have_posts() ) : $query->the_post(); ?>

						<div class="group group-services-<?php echo $q; ?>">
							<div class="accordion"><?php the_title(); ?></div>
							<div class="panel">
							<?php if( have_rows('menu_image') ):
								while( have_rows('menu_image') ): the_row();  ?>

									<img src="<?php echo get_sub_field('mobile_image'); ?>" alt="" class='mt-2 mb-2'>

								<?php endwhile; endif; ?>

							    <p><?php echo get_post_meta( get_the_ID(), 'hero_exceprt', true ); ?></p>
							    <p class="mb-3"></p>
							    <a href="<?php the_permalink(); ?>" class="k-btn-default k-btn-white">View Detail</a>
							</div>
						</div>

				<?php $q++; endwhile; endif; wp_reset_postdata(); ?>
						
					</div>
				</div>
			</header>