<?php 
	get_header(); 
?>
<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/itees/assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/itees/assets/css/owl.theme.default.min.css">

	<div id="highlights-page" class="page-container pt-xl-3 pt-xxl-0">
		<div class="container hl-owl pt-5">
			<div id="highlights-owl" class="owl-carousel owl-theme owl-loaded owl-drag slide pb-md-5 mb-5 pb-3">

				<?php $query = new WP_Query(array(
					'post_type' => 'highlights',
					'post_status' => 'publish',
					'posts_per_page' =>  -1,
					'orderby' => 'date',
					'order'   => 'DESC',
				)); 
				if($query->have_posts()):
			
				while ( $query->have_posts() ) : $query->the_post();
					$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'full' ); 
					?>
					<div class="item">
						<a href="<?php the_permalink(); ?>" class="group d-block">
							<div class="img-item k-bg-default" style="background-image: url(<?php echo $srcImage; ?>); ">
								<img src="<?php echo $srcImage; ?>" alt="" class="fade w-100">
							</div>
							<div class="text k-main-bg white-color mr-auto ml-auto">
								<div class="size-34 k-wei-600 text-center mb-3">
									<?php the_title(); 
									?>
								</div>
								<?php if(!empty(get_field('hero_exceprt'))): ?>
									<div class="text-justify size-18">
										<p class="mb-0"><?php echo get_field('hero_exceprt'); ?></p>
									</div>
								<?php endif; ?>
							</div>
						</a>
					</div>

				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
		<div class="highlights-list pb-4 pb-xl-5">
			<div class="container mb-5 pb-lg-5">
				<h2 class="h2 size-34 k-main-color pb-4 text-center"><strong><?php echo get_the_title(92) ?></strong></h2>
				<div class="append-more-post lists mr-auto ml-auto" style="max-width: 1464px;">

				<?php $query = new WP_Query(array(
					'post_type' => 'highlights',
					'post_status' => 'publish',
					'posts_per_page' =>  6,
					'orderby' => 'date',
					'order'   => 'DESC',
				)); 
				if($query->have_posts()):
			
				while ( $query->have_posts() ) : $query->the_post();
					$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'full' ); 
					?>
					<a href="<?php the_permalink(); ?>" class="group d-block">	 
						<div class="row align-center">
							<div class="col-lg-5">
								<div class="k-bg-default mb-3 mb-lg-0" style="background-image: url(<?php echo $srcImage; ?>); ">
									<img src="<?php echo $srcImage; ?>" alt="" class="w-100 fade">
								</div>								
							</div>
							<div class="col-lg-7">
								<div class="title text-center mb-2 pb-1 pt-1 pt-lg-0">
									<strong><?php the_title(); ?></strong>
								</div>												
								<p><?php echo get_field('hero_exceprt'); ?></p>
							</div>
						</div>
					</a>
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>

				<?php 
				if (  $query->max_num_pages > 1 ): ?>
					<div class="pt-0 pt-md-2">
						<div class="highlights_loadmore k-btn-default k-btn-white m-auto">Load More</div>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>	

<?php get_footer('content'); ?>
<script src="<?php echo site_url(); ?>/wp-content/themes/itees/assets/js/owl.carousel.min.js"></script>
<script>
	jQuery('#highlights-owl').owlCarousel({
	    items:1,
	    margin:10,
	    autoHeight:true,
	    arrows: false,
	    loop: true,
	});
</script>