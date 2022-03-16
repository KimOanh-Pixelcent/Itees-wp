<?php 
	/*
	** Template name: Single highlights
	*/
	get_header(); 
?>
<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/itees/assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo site_url(); ?>/wp-content/themes/itees/assets/css/owl.theme.default.min.css">

	<div class="page-container pt-5">
		<div class="container hl-owl">
			<div id="highlights-owl" class="slide pb-x-5 mb-5 pb-sm-3">				
				<div class="item">
					<a href="#" class="group d-block">
						<div class="img-item k-bg-default" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' );  ?>); ">
							<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' );  ?>" alt="" class="fade w-100">
						</div>
						<div class="text k-main-bg white-color mr-auto ml-auto">
							<div class="size-34 k-wei-600 text-center">
								<?php the_title(); ?>
							</div>							
						</div>
					</a>
				</div>
			</div>
		</div>	
		<div class="content-editor pb-5">
			<div class="container pb-x-5">
				<div class="detail-box mr-auto ml-auto text-justify pb-sm-4" style="max-width: 1081px; ">
					<?php the_content(); ?>
					<?php if( have_rows('gallery') ): ?>
						<p class="pb-sm-5 pb-4 mb-0"></p>
						<div class="gallery d-flex">
							<?php while( have_rows('gallery') ): the_row();  ?>
								<div class="item">
									<img src="<?php echo get_sub_field('image')['url']; ?>" alt="" class="w-100" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; wp_reset_postdata(); ?>
				</div>				
			</div>
		</div>	
		<div class="post-other" style="background-color: #DD3E47;">
			<div class="container highlights-list">
				<h3 class="size-34 k-wei-600 text-center white-color mb-sm-5 mb-4 pb-sm-0 pb-2 ex-big ml-auto mr-auto">Other highlights you may want to see</h3>
				<div id="hlsingle-owl" class="lists owl-carousel owl-theme owl-loaded owl-drag slide mr-auto ml-auto" style="max-width: 1464px; ">

				<?php $query = new WP_Query(array(
					'post_type' => 'highlights',
					'post_status' => 'publish',
					'posts_per_page' =>  -1,
					'orderby' => 'date',
					'order'   => 'DESC',
					'post__not_in' 		=> array(get_the_ID()),
				)); 
				if($query->have_posts()):
			
				while ( $query->have_posts() ) : $query->the_post();
					$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'full' ); 
					?>

					<div class="item">
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
					</div>

				<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>	

<?php get_footer('content'); ?>
<script src="<?php echo site_url(); ?>/wp-content/themes/itees/assets/js/owl.carousel.min.js"></script>
<script>
	jQuery('#hlsingle-owl').owlCarousel({
	    items:1,
	    margin:10,
	    autoHeight:true,
	    dots: false,
	    nav: true,
	    loop: true,
	    navText:["<img src='<?php echo site_url(); ?>/wp-content/uploads/2021/10/White-left-arrow.svg' />","<img src='<?php echo site_url(); ?>/wp-content/uploads/2021/10/White-left-arrow.svg' />"],
	});
</script>