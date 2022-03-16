<?php 
	/*
	** Template name: Template - About us
	*/
	get_header(); 

?>

	<div id="about-page" class="page-container pb-sm-4 pt-xl-3">
		<div class="banner pb-sm-5 mb-xl-5 pt-5">
			<div class="container d-flex align-center">
				<div class="group group-text">
					<h2 class="h2 size-55 k-main-color">
						<strong><?php the_title(); ?></strong>
					</h2>
					<div class="text k-main-bg k-relative" style="z-index: 1">
					<?php if( have_rows('about_banner') ): 
						while( have_rows('about_banner') ): the_row(); ?>

						<div class="text-justify size-18 pb-sm-2 pb-4" style="max-width: 672px; ">
							<?php the_sub_field('description'); ?>
						</div>		
						<div class="d-flex" style="flex-wrap: wrap; ">		
							<div class="btn-brochure k-btn-default k-btn-main mr-3 mb-lg-0 mb-3">
								<a href="<?php echo get_sub_field('download_ite_brochure'); ?>" download class="w-100">Download ITE Brochure</a>
							</div>	
							<div class="btn-down k-relative mb-lg-0 mb-sm-3">							
								<div id="btn-brochure" class="btn-brochure k-btn-default k-btn-main ml-sm-0 mr-sm-0 ml-auto mr-auto h-100">
									Download ITEES Borchure <span class="arrow-ico"></span>
								</div>
								<div class="btn-version">
									<?php while( have_rows('download_brochure') ): the_row();

										echo '<a href="'.get_sub_field('brochure').'" download>'.get_sub_field('title').'</a>'; 

									endwhile; ?>
								</div>
							</div>
						</div>		
					<?php endwhile; endif; wp_reset_postdata(); ?>

					</div>
				</div>		
				<div class="group group-img" style="z-index: 2;">
					<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" alt="" class="w-100">
				</div>
			</div>
		</div>		
		<p class="pt-md-5 mb-0"></p>
		<div class="wavemakers k-relative white-child-color pt-sm-4 pb-sm-4">
			<div class="bg bg-default" style="background-image: url(<?php echo site_url(); ?>/wp-content/themes/itees/assets/img/Wave-About-bg.svg); z-index: -1; "></div>
			<div class="container pt-sm-5 pb-sm-5">

				<div class="group-title pb-sm-4 pt-sm-0">
				<?php if( have_rows('wavemakers_plan') ):
					while( have_rows('wavemakers_plan') ): the_row(); ?>

					<div class="title ml-auto mr-auto k-main-color text-center mb-2 pt-sm-0 pt-3" style="max-width: 620px; ">
						<h2 class="h2 size-55 mb-md-3 mb-2"><strong><?php the_sub_field('title'); ?></strong></h2>
						<span class="size-34 k-wei-600"><?php the_sub_field('time'); ?></span>					
					</div>
					<div class="des-content mx-auto text-justify" style="max-width: 1510px; line-height: 1.3;">
						<?php the_sub_field('description'); ?>				
					</div>
				</div>
				<?php endwhile; endif; wp_reset_postdata(); ?>
				<div class="group pb-sm-0 pb-4">
					<?php if( have_rows('about_section_2') ): ?>
						<div class="icons-list">
							<div class="container">
								<div class="row">	

								<?php while( have_rows('about_section_2') ): the_row();  ?>

									<div class="col-lg-4 col-md-6 mb-lg-0 mb-md-4 py-md-4 py-5">
										<div class="item text-center py-3">
										    <h3 class="size-40 pt-xl-4"><strong><?php the_sub_field('title'); ?></strong></h3>
										    <div class="des ml-auto mr-auto k-wei-600">
											  	<?php the_sub_field('description'); ?>
										    </div>
										</div>					
									</div>

								<?php endwhile; ?>

								</div>
							</div>
						</div>	
					<?php endif; wp_reset_postdata(); 
					if( have_rows('wavemakers_plan') ):
						while( have_rows('wavemakers_plan') ): the_row(); ?>
							<div>
								<a href="<?php echo get_sub_field('download_brochure'); ?>" download class="k-btn-default k-btn-white mx-auto" style="color: #442E2E; border-color: transparent;">Download Brochure</a>
							</div>
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
		
		<?php if( have_rows('message_ceo') ): ?>
		<div class="k-relative ceo slide-2">

			<?php while( have_rows('message_ceo') ): the_row(); 

				while( have_rows('background_image') ): the_row();
					$desk_img = get_sub_field('desktop_image')['url'];
					$mb_img = get_sub_field('mobile_image')['url'];
				endwhile; ?>

				<?php if ( wp_is_mobile() ): ?>
				    <div class="k-bg" style="background-image: url(<?php if(empty($mb_img)){echo $desk_img;} else{echo $mb_img;} ?>) "></div>
				<?php else: ?>
					<div class="k-bg" style="background-image: url(<?php echo $desk_img ?>)"></div>
				<?php endif; ?>	

				<div class="info-ceo ml-auto mr-auto">			
					<div class="container">
						<div class="h2 size-55 pb-3 pt-2 d-lg-none d-block text-center">
							<strong><?php the_sub_field('title'); ?></strong>
						</div>
						<div class="row">
							<div class="col-lg-4">
								<img src="<?php echo get_sub_field('image')['url']; ?>" alt="" class="w-100">								
							</div>
							<div class="col-lg-8">
								<h2 class="h2 size-55 pb-3 pt-2 d-lg-block d-none">
									<strong><?php the_sub_field('title'); ?></strong>
								</h2>
								<div class="des text-justify pb-4">
									<?php the_sub_field('excerpt'); ?>
								</div>
								<a href="#" class="k-btn-default" style="border: 1px solid; " data-toggle="modal" data-target="#ceo_info">View More</a>

								<div class="modal fade" id="ceo_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
									<div class="modal-dialog mx-auto" role="document">
									    <div class="modal-content">
									      	<div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										    </div>
									      	<div class="modal-body">
									        	<div class="title size-55 text-center mb-4 pb-2">
									        		<strong><?php the_sub_field('title'); ?></strong>
									        	</div>
									        	<div class="content">
									        		<div class="row">
									        			<div class="col-lg-4 mb-4">
									        				<img src="<?php echo get_sub_field('image')['url']; ?>" alt="" class="w-100 mb-2 pb-1">
									        				<div class="info">
																<span class="size-21 text-center d-block"><strong><?php the_sub_field('ceo_name'); ?></strong></span>
																<span class="size-21 text-center d-block"><strong><?php the_sub_field('ceo_designation'); ?></strong></span>
															</div>
									        			</div>
									        			<div class="col-lg-8">
									        				<div class="des text-justify">
																<?php the_sub_field('description'); ?>
															</div>
									        			</div>
									        		</div>
									        	</div>
									      	</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			<?php endwhile; ?>
		</div>
		<p class="pb-3"></p>
		<?php endif; wp_reset_postdata(); ?>

		<div class="directors pt-5 pb-4">
			<div class="container pt-sm-5 pt-4">

				<?php if (get_field('title_directors')): ?>
					<h2 class="h2 text-center size-55 k-main-color mb-sm-5 mb-3 pb-sm-2 pb-3">
						<strong><?php echo get_field('title_directors'); ?></strong>
					</h2>
				<?php endif; ?>

				<div class="row justify-content-sm-center">
					<?php if( have_rows('directors') ): 
						while( have_rows('directors') ): the_row(); ?>

						<div class="col-xl-3 col-lg-4 col-sm-6 mb-5">
							<div class="item k-main-bg">
								<div class="img">
									<img src="<?php echo get_sub_field('image')['url'];  ?>" alt="<?php the_sub_field('name'); ?>" class="w-100" title="<?php the_sub_field('name'); ?>">
								</div>
								<div class="info text-center">
									<h3 class="size-30 k-wei-600" style="margin-bottom: 12px"><?php the_sub_field('name'); ?></h3>
									<div class="position mb-2" style="line-height: 1.3"><?php the_sub_field('position'); ?></div>
									<div class=""><?php the_sub_field('text'); ?></div>
								</div>
							</div>
						</div>	

					<?php endwhile; endif; wp_reset_postdata(); ?>					
				</div>
			</div>
		</div>		

		<?php if( have_rows('plan') ): ?>
		<div class="plan">
			<div class="container pb-3">
			<?php while( have_rows('plan') ): the_row();  ?>
				<div class="title ml-auto mr-auto k-main-color text-center mb-5" style="max-width: 620px; ">
					<h2 class="h2 size-55"><strong><?php the_sub_field('title'); ?></strong></h2>
				</div>		
				<div class="colleges">
					<div class="row">

						<?php if( have_rows('ite_colleges') ):
							while( have_rows('ite_colleges') ): the_row(); ?>

							<div class="col-sm-6 col-12 mb-md-5 mb-3">
								<div class="item">
									<div class="mb-3 bg-default" style="background-image: url(<?php echo get_sub_field('image'); ?>); ">
										<img src="<?php echo site_url(); ?>/wp-content/uploads/2022/03/colleges-1.png" alt="" class="fade w-100">

									</div>
									<p class="text-center size-30 mb-2"><strong><?php the_sub_field('title'); ?></strong></p>
								</div>							
							</div>							

						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
				</div>

			<?php endwhile; ?>
			</div>
		</div>
		<?php endif; wp_reset_postdata(); ?>
	</div>	

<?php get_footer('content'); ?>