<?php 
	/*
	** Template name: Template - Front 
	*/
	get_header(); 
?>
	<style>
		@media only screen and (min-width: 992px){
		    html,body, .body-container, .site-content{ 
		    	width:100%; height:100%; margin:0;
		    }
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
		.open-menu{z-index:999;}
	</style>
 
<script src="<?php echo site_url();?>/wp-content/themes/itees/assets-gobal/dangpx_files/wp-emoji-release.min.js" type="text/javascript" defer=""></script>
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
<link rel="stylesheet" id="genericons-css" href="<?php echo site_url();?>/wp-content/themes/itees/assets-gobal/dangpx_files/genericons.css" type="text/css" media="all">
<script type="text/javascript" src="<?php echo site_url();?>/wp-content/themes/itees/assets-gobal/dangpx_files/jquery.js"></script>
<script type="text/javascript" src="<?php echo site_url();?>/wp-content/themes/itees/assets-gobal/dangpx_files/jquery-migrate.min.js"></script>

	
<link rel="stylesheet" href="<?php echo site_url();?>/wp-content/themes/itees/assets-gobal/dangpx_files/colorbox.css">
<link rel="stylesheet" href="<?php echo site_url();?>/wp-content/themes/itees/assets-gobal/dangpx_files/earthviewer_styles_unique.min.css">
<script src="<?php echo site_url();?>/wp-content/themes/itees/assets-gobal/dangpx_files/jquery.min.js"></script>
<script src="<?php echo site_url();?>/wp-content/themes/itees/assets-gobal/dangpx_files/globe.min.js"></script>
<style>
.global-icon{
	width:42vw;
}
@media only screen and (max-width: 991px){
	.global-icon{
		width:100vw;
		text-align: unset;
		max-width:450px;
		margin: 0 auto;
	}
	.global-icon canvas{
		right:0!important;
	}
}
 

</style>	
	<div id="landing-page" class="landing-page k-relative">
		<div class="k-bg" style="background-image: url(<?php echo site_url(); ?>/wp-content/uploads/2021/09/Landing-banner.jpg); background-position: top; "></div>
		<div class="container">
			<div class="k-logo mb-xl-4 mb-3">
				<?php if( get_field('logo', 'option')['url'] ): ?>
					<a href="<?php echo site_url(); ?>">
						<img src="<?php echo get_field('logo', 'option')['url']; ?>" alt="">
					</a>
				<?php endif; ?>	
			</div>
			<div class="info text-center" style="color: #C12F37; ">

				<?php if( get_field('landing_page', 'option')): 
						while( have_rows('landing_page', 'option') ): the_row();
					echo '<p class="title text-uppercase size-75 mb-2 mb-sm-1 pb-2 pb-sm-0">'.get_sub_field('title', 'option').'</p>';
					echo '<span class="size-40">'.get_sub_field('sub_title', 'option').'</span>';
				endwhile; endif; ?>				
				
			</div>
			<p class="mb-3 pb-3"></p>
			<div class="loadding text-center">
				<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/09/Globe_white-and-grey.png" alt="">
				<p class="mb-0 text-left pl-3">
					<span class="size-21 percent">10%</span><br> 
					<span>Loading</span>
				</p>
			</div>
		</div>
	</div>	
	<div id="scroll-home" class="scroll-home" style="display: none; ">
		<div id="ScrollPane">
			<div class="scr prt horiz">
				<div class="spane">
					<div class="pane an visible-d slide-1 banner slide" data-id="Horizontal01">
						<div class="ct">
							<div class="main-item k-h-100" style="overflow-y: scroll;">
								<div class="item k-relative">
								<!--GLobal Begin-->
									<div class="global-icon" style="">
										<div id="globeGl_" class="globeGl"> </div>
										<?php $all_country = get_terms( array('taxonomy' => 'country','orderby' => 'name','order' => 'ASC','hide_empty' => true) ); ?>
										<?php if(!empty($all_country)){ ?>
											<?php foreach($all_country as $row){ ?>
											<?php $term = 'term_'.$row->term_id;  ?>
												<?php $postlist = get_posts(array('post_type' => 'projects','orderby' => 'ID','order' => 'ASC','tax_query' => array(array('taxonomy' => 'country','field' => 'term_id','posts_per_page' => 1,'terms' => $row->term_id)))); ?>								
												<div class="hotspot h5g_hidden" data-lat="<?php echo get_field('lat', $term); ?>" data-long="<?php echo get_field('long', $term); ?>" data-url="<?php echo get_the_permalink($postlist[0]->ID);?>?iframe"><?php echo $row->name;?></div>  
											<?php } ?>
										<?php } ?>
  									</div>
								<!--GLobal - End-->
								<?php if (get_field('tab1_title')): ?>
									<div class="item-title pb-3">
										<div class="container">
											<h2 class="h2 size-55 k-main-color mb-0 pb-1"><strong><?php echo get_field('tab1_title'); ?></strong></h2>
										</div>
									</div>	
								<?php endif; ?>

									<div class="white-color pt-3">
										<div class="container">
										<?php if (get_field('tab1_sub-title_1')): ?>
											<div class="size-40">
												<p><strong><?php echo get_field('tab1_sub-title_1'); ?></strong></p>
											</div>
											<p class="mb-0 pb-sm-3 mb-x-0 pb-x-3 mb-xxl-5 pb-xxl-2"></p>
										<?php endif; 
										if (get_field('tab1_sub-title_2')): ?>
											<div class="size-26 k-wei-600">
												<p><?php echo get_field('tab1_sub-title_2'); ?></p>
											</div>											
											<p class="pb-2 mb-2"></p>
										<?php endif; ?>
											<ul class="list-unstyled mb-0">
											<?php if( have_rows('tab_1_button_1') ):
												while( have_rows('tab_1_button_1') ): the_row(); ?>

												<li class="inline-block-item pr-3"><a href="<?php the_sub_field('link'); ?>" class="k-btn-default fancybox-youtube"><?php the_sub_field('title'); ?></a></li>

											<?php endwhile; endif; wp_reset_postdata();
											if( have_rows('tab_1_button_2') ):
												while( have_rows('tab_1_button_2') ): the_row(); ?>

												<li class="inline-block-item"><a href="<?php the_sub_field('link'); ?>" class="k-btn-default"><?php the_sub_field('title'); ?></a></li>

											<?php endwhile; endif; wp_reset_postdata(); ?>
											</ul>
										</div>									
									</div>									
								</div>		
								<div class="scroll-down text-center">
									<figure>
										<img src="<?php echo site_url(); ?>/wp-content/themes/itees/assets/img/Mouse-ico.svg" alt="">
									</figure>	
									<strong>Scroll down</strong>
								</div>						
							</div>
						</div>
					</div>
					<div class="pane an visible-d slide slide-2" data-id="Horizontal02">
						<div class="ct">
							<div class="main-item k-h-100" style="overflow-y: scroll;">		
							<?php if( have_rows('tab_2_banner') ): ?>
								<div class="item-slide k-relative text-center k-h-100">

								<?php while( have_rows('tab_2_banner') ): the_row(); 

									while( have_rows('background_image') ): the_row(); 
										$tab2_img_desk = get_sub_field('desktop_image')['url'];
										$tab2_img_mb = get_sub_field('mobile_image')['url'];
									endwhile;
									
									?>
									<?php if ( wp_is_mobile() ): ?>
									    <div class="k-bg" style="background-image: url(<?php if(!empty($tab2_img_mb)){echo $tab2_img_mb;} else{echo $tab2_img_desk;}  ?>); "></div>
									<?php else: ?>
										<div class="k-bg att-xxl-fixed" style="background-image: url(<?php echo $tab2_img_desk; ?>); "></div>
									<?php endif; ?>	

						      		<div class="container">
						      			<div class="">
							      			<h2 class="h2 size-55 k-main-color pb-1"><strong>
							      				<?php the_sub_field('title'); ?>
							      			</strong></h2>
							      			<p class="size-34 k-wei-600 k-main-color mb-4 pb-2"><?php the_sub_field('sub_title'); ?></p>
							      		</div>
							      		<div class="row m-auto">

							      		<?php while( have_rows('boxs') ): the_row();  ?>
							      			<div class="col-lg-4 col-md-6 mb-3">
							      				<div class="box k-main-bg">
							      					<figure>
							      						<img src="<?php echo get_sub_field('icon')['url']; ?>" alt="" class="m-auto">
							      					</figure>
							      					<?php the_sub_field('title'); ?>
							      				</div>
							      			</div>
							      		<?php endwhile; ?>

							      		</div>
					      			</div>
					      		<?php endwhile; ?>

					      		</div>
					      	<?php endif; wp_reset_postdata();
					      	if( have_rows('tab_2_testimonial') ): ?>
					      		<div id="testimonial" class="testimonial k-relative white-color" style="background-color: #565656; white-space: normal; ">
					      			<div class="container">	
			      						<div id="testimonial-slider" class="carousel slide" data-ride="carousel">
				      						<div class="section">
				      							<div class="title">
						      						<h3><strong class="size-30">Testimonial</strong></h3>
						      					</div>
						      					<div class="carousel-inner">

						      				<?php
						      					$i = 1; 
						      					while( have_rows('tab_2_testimonial') ): the_row();  ?>
												    <div class="carousel-item <?php if($i==1){echo 'active'; } ?>">
												      	<div class="group">
							      							<div class="des text-justify pb-3">
							      								<p><?php the_sub_field('description'); ?></p>
							      							</div>				      							
							      							<p class="text-right pb-md-0 pb-5">
							      								<i><?php the_sub_field('name'); ?></i>
							      							</p>
							      						</div>	
												    </div>
											<?php $i++; endwhile; ?>
												</div>
				      						</div>
				      						<ol class="carousel-indicators ml-0">
				      						<?php for ($j=0; $j < $i-1; $j++){ ?>

				      							<li data-target="#testimonial-slider" data-slide-to="<?php echo $j; ?>" class="<?php if($j==0){echo 'active'; } ?>"></li>

				      						<?php } ?>	
											</ol>
										</div>	
					      			</div>
					      		</div>
					      	<?php endif; wp_reset_postdata(); 

					      	if( have_rows('tab2_section_3') ): ?>
					      		<div class="item text-center pt-xx-5 pb-xx-5">
					      			<p class="py-x-4"></p>
					      			<div class="container py-5 black-color">
					      				<div class="group mr-auto ml-auto" style="max-width: 1169px;">
					      				<?php while( have_rows('tab2_section_3') ): the_row();  ?>
					      					<h2 class="h2 size-55 k-main-color"><strong><?php the_sub_field('title'); ?></strong></h2>
						      				<p class="pb-2"></p>
						      				<p><?php the_sub_field('description'); ?></p>
						      			<?php endwhile; ?>
					      				</div>
					      				
					      			</div>
					      			<p class="py-x-4"></p>
					      		</div>
					      	<?php endif; wp_reset_postdata(); 
					      	if( have_rows('tab_2_services') ):  ?>
					      		<div class="item item-our-s">

					      	<?php 
					      		while( have_rows('tab_2_services') ): the_row();
					      			while( have_rows('image') ): the_row(); 
										$services_img_desk = get_sub_field('desktop_image')['url'];
										$services_img_mb = get_sub_field('mobile_image')['url'];
									endwhile; ?>
					      			<?php if ( wp_is_mobile() ): ?>
										  	<div class="item-img">
							      				<img src="<?php echo $services_img_mb; ?>" alt="" class="w-100">
						      				</div>  
									<?php else: ?>
										<div class="item-img">
							      			<img src="<?php echo $services_img_desk; ?>" alt="" class="w-100">
						      			</div>
									<?php endif; ?>
							<?php endwhile; ?>
					      			<div class="container py-5">
					      				<div class="row align-center pb-5">
					      					<div class="col-xl-6 col-lg-5 mb-5 mb-lg-0">

					      				<?php while( have_rows('tab_2_services') ): the_row(); ?>
					      						<h3><strong class="size-30"><?php the_sub_field('title'); ?></strong></h3>
					      						<div class="des" style="max-width: 539px;">
					      							<?php the_sub_field('description'); ?>
					      						</div>
					      						<p class="pb-2 mb-sm-2 mb-1"></p>
					      						<ul class="list-unstyled">
					      						<?php while( have_rows('button') ): the_row(); ?>
													<li class="inline-block-item pr-3">
														<a href="<?php the_sub_field('link'); ?>" class="k-btn-default k-btn-white"><?php the_sub_field('title'); ?></a>
													</li>
												<?php endwhile; ?>
												</ul>
										<?php endwhile; ?>
					      					</div>					      					
					      					<div class="col-xl-6 col-lg-7">
					      						<div class="ours-boxs">

					      					<?php $query = new WP_Query(array(
													'post_type' => 'our-services',
													'post_status' => 'publish',
													'posts_per_page' =>  -1,
													'orderby' => 'date',
													'order'   => 'DESC',
												)); 
					      					if($query->have_posts()):	
					      					$i=1;		
											while ( $query->have_posts() ) : $query->the_post();
					      					?>

				      							<a href="<?php the_permalink(); ?>" class="box">	
				      								<figure>
				      									<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/our-services-logo.png" alt="" class="desk">
				      									<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/our-services-logo-white.png" alt="" class="mb">
				      								</figure>	
				      								<h4><strong><?php the_title(); ?></strong></h4>
				      								<div class="readmore text-right">
				      									<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/ArrowRight.svg" alt="">
				      								</div>	
				      							</a>
				      							<?php if($i==3): 
				      								echo '<div class="break"></div>';
				      								$i=0;
				      							 endif; ?>
					      					<?php $i++; endwhile; endif; wp_reset_postdata(); ?>
					      						</div>
					      					</div>
					      				</div>
					      			</div>
					      		</div>
					      	<?php endif; wp_reset_postdata(); ?>
							</div>	
			      		</div>
					</div>
					<div class="pane an visible-d slide slide-3" data-id="Horizontal03">
						<div class="ct">
							<div class="main-item k-h-100" style="overflow-y: scroll;">
							<?php if( have_rows('tab_3_expertise') ): ?>
								<div class="item k-h-100">
									<div class="row k-h-100">
										<div class="col-xl-3 pr-0">
											<figure class="mb-0 k-h-100 k-relative">

											<?php while( have_rows('tab_3_expertise') ): the_row(); 
												$title = get_sub_field('title'); ?>
												<div class="bg" style="background-image: url(<?php echo get_sub_field('image')['url']; ?>); background-position: center; background-size: cover; "></div>
												<img src="<?php echo get_sub_field('mobile_image')['url']; ?>" alt="" class='w-100'>
											<?php endwhile; ?>

											</figure>
										</div>
										<div class="col-xl-9 pl-0">
											<div class="big-group k-h-100">
												<div class="group white-color" style="background-color: #565656; ">
													<div class="title size-34 mb-md-4"><strong><?php echo $title; ?></strong></div>														
													<nav>
													    <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">

												<?php $t = 1;
												while( have_rows('tab_3_expertise') ): the_row();
													    while( have_rows('area') ): the_row(); ?>

														<a class="nav-link border-0 <?php if($t == 1){echo 'active'; } ?> " <?php echo 'id="nav-'.$t.'-tab"' ?> data-toggle="tab" <?php echo 'href="#nav-'.$t.'" role="tab" aria-controls="nav-'.$t.'"'; ?> aria-selected="true"><?php the_sub_field('title'); ?></a>

														<?php $t++; endwhile; endwhile; ?>
													    </div>
													</nav>												
												</div>
												<div class="group white-color k-main-bg">
													<div class="tab-content" id="nav-tabContent">
												<?php $t = 1;
												while( have_rows('tab_3_expertise') ): the_row();
													    while( have_rows('area') ): the_row(); ?>

													    <div class="tab-pane fade <?php if($t == 1){echo 'show active'; } ?>" <?php echo 'id="nav-'.$t.'"' ?> role="tabpanel" <?php echo 'aria-labelledby="nav-'.$t.'-tab"' ?> aria-labelledby="nav-engineering-tab">
													    	<div class="group-1">
																<div class="head pb-2 pb-x-4">
																	<p class="mb-1 pb-1"><strong><?php the_sub_field('title'); ?></strong></p>
																	<div class="des text-justify" style="max-width: 743px;">
																	<?php the_sub_field('description'); ?>
																	</div>			
																</div>
																<div class="des">
																	<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																	<div class="list-ul">
																		<?php the_sub_field('programmes'); ?>
																	</div>				
																</div>
															</div>
													    </div>

												<?php $t++; endwhile; endwhile; ?>

													</div>												
												</div>
											</div>	
											<div id="accordion" class="big-group big-group-mb white-color" style="background-color: #565656; ">
												<div class="title size-34 mb-md-4">
													<strong><?php echo $title; ?></strong></div>	
											<?php 
												$j = 1;
												while( have_rows('tab_3_expertise') ): the_row();
													while( have_rows('area') ): the_row(); ?>

											    <div class="nav-tabs border-bottom-0">
											    	<div class="accordion">	
											    		<a class="" data-toggle="collapse" href="<?php echo '#item'.$j; ?>">
													          <?php the_sub_field('title'); ?>
													    </a>
											    	</div>
											    	<div id="<?php echo 'item'.$j; ?>" class="collapse panel white-color k-main-bg <?php if($j==1){echo 'show';} ?>" data-parent="#accordion">
											    		<div class="group-1">
															<div class="head pb-2 pb-x-4">
																<div class="des text-justify" style="max-width: 743px;">
																	<?php the_sub_field('description'); ?>
																</div>			
															</div>
															<div class="des">
																<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																<div class="list-ul">
																	<?php the_sub_field('programmes'); ?>
																</div>				
															</div>
														</div>
											    	</div>
											    </div>

											<?php $j++; endwhile; endwhile; ?>
											</div>	
											<!-- <div id="">
											    <div class="">
											      	<div class="">
												        <a class="" data-toggle="collapse" href="#collapseOne">
												          Collapsible Group Item #1
												        </a>
												    </div>
											      <div id="collapseOne" class="collapse show" data-parent="#accordion">
											        <div class="card-body">
											          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											        </div>
											      </div>
											    </div>
											    <div class="">
											      	<div class="">
												        <a class="collapsed" data-toggle="collapse" href="#collapseTwo">
												        Collapsible Group Item #2
												      </a>
											      	</div>
											      	<div id="collapseTwo" class="collapse" data-parent="#accordion">
											        	<div class="card-body">
											          		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											        	</div>
											     	</div>
											    </div>
											</div>	 -->						
										</div>
									</div>
								</div>
							<?php endif; wp_reset_postdata(); ?>
							</div>
						</div>
					</div>
					<div class="pane an visible-d slide slide-4" data-id="Horizontal04">
						<div class="ct">
							<div class="main-item k-h-100" style="overflow-y: scroll;">
								<div class="item highlights k-h-100">
									<div class="container pb-lg-5">
									<?php if( get_field('tab_4_title') ): ?>
										<h2 class="h2 size-55 k-main-color pb-3 text-center"><strong><?php echo get_field('tab_4_title'); ?></strong></h2>
									<?php endif; ?>
										<div class="lists mr-auto ml-auto mb-3 pb-lg-5" style="max-width: 1252px;">
										<?php $query = new WP_Query(array(
											'post_type' => 'highlights',
											'post_status' => 'publish',
											'posts_per_page' =>  3,
											'orderby' => 'date',
											'order'   => 'DESC',
										)); 
										if($query->have_posts()):
									
										while ( $query->have_posts() ) : $query->the_post();
											$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
											<a href="<?php the_permalink(); ?>" class="group d-block">
												<div class="img-item k-bg-default mb-3" style="background-image: url(<?php echo $srcImage; ?>); ">
													<img src="<?php echo $srcImage; ?>" alt="" class="fade w-100">
												</div>											
												<div class="title text-center">
													<p><strong><?php the_title(); ?></strong></p>
												</div>												
												<p><?php echo get_field('hero_exceprt'); ?></p>
											</a>

										<?php endwhile; endif; wp_reset_postdata(); ?>

											<div class="pt-4">
												<a href="<?php echo site_url(); ?>/highlights" class="k-btn-default k-btn-white m-auto">View All</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="pane an visible-d slide slide-5 contact-section" data-id="Horizontal05">
						<div class="ct">
							<div class="main-item k-h-100" style="overflow-y: scroll;">
								<div class="item k-h-100 k-relative">
									<div class="container k-h-100 k-relative">
										<div class="row k-h-100 k-relative">
											<div class="col-xl-4 k-h-100">
												<div class="form-group">
													<p class="mb-xx-1 pb-xx-5"></p>

												<?php if( have_rows('contact_section') ):
													while( have_rows('contact_section') ): the_row(); ?>

													<div class="title k-main-color size-34 mb-1"><strong><?php the_sub_field('title'); ?></strong></div>
													<div class="text-justify pb-3 k-wei-600" style="color: #565656;">
														<p><?php the_sub_field('description'); ?></p>
													</div>
												<?php endwhile; endif; wp_reset_postdata(); ?>

													<div class="form-contact">
														<form action="/" class="size-18">
															<input type="text" name="name" value="" placeholder="Name" class="input">
															<input type="email" name="email" value="" placeholder="Email" class="input">
															<textarea name="remarks" id="" rows="4" placeholder="Remarks" class="input"></textarea>
															<input type="submit" id="submit-contact" value="Submit">
														</form>
													</div>
												</div>
											</div>
											<div class="col-xl-8 k-h-100">
												<div class="foot">
												<?php if( have_rows('contact_location') ):
													while( have_rows('contact_location') ): the_row();  ?>
													<div>
														<div class="title k-main-color size-34 mb-1"><strong><?php the_sub_field('title'); ?></strong></div>
														<?php the_sub_field('description'); ?>
														<p class="pb-1 mb-2"></p>
														<div class="map">
															<?php the_sub_field('map'); ?>
														</div>
													</div>
													<div>
														<p class="mb-2 pt-4"></p>
													<?php while( have_rows('location_1') ): the_row();  ?>
														<div class="title mb-2"><strong><?php the_sub_field('title'); ?></strong></div>
														<div class="group-dou">

														<?php while( have_rows('item') ): the_row();  ?>
															<p><?php the_sub_field('text'); ?> <br>
																<?php the_sub_field('position'); ?> <br>
																Tel <a href="tel:<?php the_sub_field('tel'); ?>"><?php the_sub_field('tel'); ?></a> <br>
																Mobile <a href="tel:<?php the_sub_field('mobile'); ?>"><?php the_sub_field('mobile'); ?></a> <br>
																Email <br><a href="mailto:<?php the_sub_field('email'); ?>"><span><?php the_sub_field('email'); ?></span></a></p>	
														<?php endwhile; ?>

														</div>
													<?php endwhile; ?>
													<?php while( have_rows('location_2') ): the_row();  ?>

														<div class="title mb-2"><strong><?php the_sub_field('title'); ?></strong></div>
														<div class="group-dou">
														<?php while( have_rows('item') ): the_row();  ?>

															<p><?php the_sub_field('text'); ?> <br>
															<?php the_sub_field('position'); ?> <br>
															Tel <a href="tel:<?php the_sub_field('tel'); ?>"><?php the_sub_field('tel'); ?></a> <br>
															Mobile <a href="tel:<?php the_sub_field('mobile'); ?>"><?php the_sub_field('mobile'); ?></a> <br>
															Email <br><a href="mailto:<?php the_sub_field('email'); ?>"><span><?php the_sub_field('email'); ?></span></a></p>

														<?php endwhile; ?>
														</div>	
													<?php endwhile; ?>
														<div class="title mb-2"><strong>General Enquiries</strong></div>
														<div class="group-dou">
															<?php while( have_rows('general_enquiries') ): the_row();  ?>
																<p>Tel <a href="tel:<?php the_sub_field('tel'); ?>"><?php the_sub_field('tel'); ?></a> <br>
																Fax <?php the_sub_field('fax'); ?> <br>
																Email <a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a> <br>
																Website <?php the_sub_field('website'); ?></p>
															<?php endwhile; ?>
														</div>
													</div>
												<?php endwhile; endif; wp_reset_postdata(); ?>
												</div>
											</div>											
										</div>
										<div class="foot-bar foot-bar-size">
											<div class="foot-menu">
												<ul class="list-unstyled mb-0">
												<?php $menuLocations = get_nav_menu_locations();
												$foot_nav = wp_get_nav_menu_items($menuLocations['footer-menu']);  
												if(!empty($foot_nav)):
													foreach ( $foot_nav as $navItem ):
														if($navItem->menu_item_parent == 0):
												?>
													<li><a href="<?php echo $navItem->url; ?>"><?php echo $navItem->title; ?></a></li>
												<?php endif; endforeach; endif; ?>
												</ul>
											</div>
											<div class="text-right white-color">
												<ul class="list-unstyled">
													<?php if( get_field('social', 'option')): 
														while( have_rows('social', 'option') ): the_row(); ?>
															<?php if(!empty(get_sub_field('facebook', 'option'))): ?>
																<li><a href="<?php the_sub_field('facebook', 'option'); ?>"><img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/Facebook-ico.png" alt=""></a></li>
															<?php endif;
															if(!empty(get_sub_field('message', 'option'))): ?>
																<li><a href="<?php the_sub_field('message', 'option'); ?>"><img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/Chat-ico.png" alt=""></a></li>
															<?php endif; ?>

													<?php endwhile; endif; ?>
												</ul>
												<?php if( get_field('footer_bar', 'option')): 
													echo '<span>'.get_field('footer_bar', 'option').'</span>';
												endif; ?>
											</div>
										</div>										
									</div>
									
								</div>
							</div>							
						</div>
					</div>
				</div>
				<div class="dots-list">
					<ul class="pl-0 mb-0">
						<li class="dots Horizontal01 active"></li>
						<li class="dots Horizontal02"></li>
						<li class="dots Horizontal03"></li>
						<li class="dots Horizontal04"></li>
						<li class="dots Horizontal05"></li>
					</ul>
				</div>
			</div>
		</div>
	</div>	

<script src='<?php echo site_url(); ?>/wp-content/themes/itees/assets/js/jquery.mousewheel.min.js'></script>
<script src='<?php echo site_url(); ?>/wp-content/themes/itees/assets/js/TweenMax.min.js'></script>
<script src='<?php echo site_url(); ?>/wp-content/themes/itees/assets/js/ScrollToPlugin.min.js'></script>
<script src='<?php echo site_url(); ?>/wp-content/themes/itees/assets/js/scrollpane.js'></script>

 <script>
	var g = $("div#globeGl_").globe({
		globeRadius:{val:180},
		globeShine:{val:3},
		globeTexture:{val:"<?php echo site_url();?>/wp-content/themes/itees/assets-gobal/img/Earthe2-big.jpg"},
		globeBump:{val:"<?php echo site_url();?>/wp-content/themes/itees/assets-gobal/img/earthbump1k.jpg"},
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
		hotSpotIcon:{val:"<?php echo site_url();?>/wp-content/themes/itees/assets-gobal/dangpx_files/images/marker.png"},
		backPlateTexture:{val:"<?php echo site_url();?>/wp-content/themes/itees/assets-gobal/img/backPlate_glow.png"},
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
		clickExternal:{val:false},
		assetPath:{val:""},
		zoomWheelDirection:{val:"downOut"},
		onlyOrbitOnGlobe:{val:true},
		allowUserZoom:{val:false},
	});
	

	$("#globeGl_").on('mouseenter touchstart', function() {
		$("#globeGl_").globe('stopAutoRotate');
	}) 
	$("#globeGl_").on('mouseleave touchend', function() {
		$("#globeGl_").globe('startAutoRotate');
	})
	
</script>
 
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/themes/itees/assets-gobal/dangpx_files/imagesloaded.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/themes/itees/assets-gobal/dangpx_files/masonry.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/themes/itees/assets-gobal/dangpx_files/jquery.masonry.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/themes/itees/assets-gobal/dangpx_files/functions.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/themes/itees/assets-gobal/dangpx_files/wp-embed.min.js"></script>

<?php get_footer(); ?>

<script>
	$(document).ready(function() {
		$(function(){
	        $(document).scroll(function(){

	            if( ($(this).scrollTop() >= $('.slide-1').offset().top) && ($(this).scrollTop() <= $('.slide-2').offset().top)) {
	                $('.dots').removeClass('active');
	                $('.Horizontal01').addClass('active');
	            }
	            else if( ($(this).scrollTop() >= $('.slide-2').offset().top) && ($(this).scrollTop() <= $('.slide-3').offset().top)) {
	                $('.dots').removeClass('active');
	                $('.Horizontal02').addClass('active');
	            } 
	            else if( ($(this).scrollTop() >= $('.slide-3').offset().top) && ($(this).scrollTop() <= $('.slide-4').offset().top)) {
	                $('.dots').removeClass('active');
	                $('.Horizontal03').addClass('active');
	            } 
	            else if( ($(this).scrollTop() >= $('.slide-4').offset().top) && ($(this).scrollTop() <= $('.slide-5').offset().top)) {
	                $('.dots').removeClass('active');
	                $('.Horizontal04').addClass('active');
	            } 
	            else if( ($(this).scrollTop() >= $('.slide-5').offset().top)) {
	                $('.dots').removeClass('active');
	                $('.Horizontal05').addClass('active');
	            } 
	        });
	    });
 
	});
</script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>