<?php 	/*	** Template name: Our services template	*/	get_header(); 	$id = 29;	?>	<div class="services-content k-relative pt-5">		<?php while( have_rows('background_image', $id) ): the_row();				$desktop_bg = get_sub_field('desktop_bg' , $id)['url'];				$mobile_bg = get_sub_field('mobile_bg' , $id)['url'];			endwhile;		if ( wp_is_mobile() ): ?>				<div class="k-bg" style="background-image: url(<?php if(!empty($mobile_bg)){echo $mobile_bg; } else{echo $desktop_bg; } ?>); background-position: top; "></div>		<?php else: ?>			<div class="k-bg" style="background-image: url(<?php echo $desktop_bg ?>); background-position: top; "></div>		<?php endif; ?>				<div class="container">			<div class="mx-auto" style="max-width: 1402px; ">				<div class="info pb-4">					<h2 class="h2 size-55 k-main-color text-center pb-3 pb-md-2"><strong>						<?php echo get_the_title($id); ?></strong></h2>					<?php if(!empty(get_field('description_services', $id))): ?>						<div class="des text-justify">							<?php echo get_field('description_services', $id); ?>						</div>					<?php endif; ?>				</div>				<div class="row">					<div class="col-lg-5 pb-lg-0 pb-5">						<div class="k-relative h-100">						<?php if( have_rows('image', $id) ): 							while( have_rows('image', $id) ): the_row();								$desktop_image = get_sub_field('desktop_image' , $id)['url'];								$mobile_image = get_sub_field('mobile_image' , $id)['url'];							endwhile; 														if ( wp_is_mobile() ): ?>									<img src="<?php if(!empty($mobile_image)){echo $mobile_image; } else{echo $desktop_image; } ?>" alt="" class="w-lg-100 h-lg-100 fade">															<div class="bg" style="background-image: url(<?php if(!empty($mobile_image)){echo $mobile_image; } else{echo $desktop_image; } ?>); background-position: center; background-size: cover; "></div>							<?php else: ?>								<img src="<?php echo $desktop_image ?>" alt="" class="w-lg-100 h-lg-100 fade">								<div class="bg" style="background-image: url(<?php echo $desktop_image ?>); background-position: center; "></div>							<?php endif; 						endif; ?>														</div>											</div>				    <div class="col-lg-7">						<div class="ours-boxs">							<?php $query = new WP_Query(array(								'post_type' => 'our-services',								'post_status' => 'publish',								'posts_per_page' =>  -1,								'orderby' => 'date',								'order'   => 'DESC',							));							$count = $query->found_posts;							if($query->have_posts()):		      					$i=1;		      					$j=1;								while ( $query->have_posts() ) : $query->the_post(); ?>								<a href="<?php the_permalink(); ?>" class="box">		  								<figure>	  									<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/our-services-logo.png" alt="" class="desk">	  									<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/our-services-logo-white.png" alt="" class="mb">	  								</figure>		  								<h4><strong><?php the_title(); ?></strong></h4>	  								<div class="readmore text-right">	  									<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/ArrowRight.svg" alt="">	  								</div>		  							</a>  							<?php if($i==3 && $j < $count):   								echo '<div class="break"></div>';  								$i=0;  							 endif; ?>  							<?php $i++; $j++; endwhile; endif; wp_reset_postdata(); ?>						</div>					</div>				</div>			</div>		</div>	</div>	<?php get_footer('content'); ?>