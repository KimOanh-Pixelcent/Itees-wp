<?php 
	/*
	** Template name: Template - Front 2
	*/
	get_header(); 
?>

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
				endwhile; endif; ?>

				<p class="title text-uppercase size-75 mb-2 mb-sm-1 pb-2 pb-sm-0">Your Global Partner of Choice</p>
				<span class="size-40">Transforming Lives through Skills Education and Training</span>
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
									<div class="global-icon">
										<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/09/Globe_white-and-location.png" alt="">
									</div>
									<div class="item-title pb-3">
										<div class="container">
											<h2 class="h2 size-55 k-main-color mb-0 pb-1"><strong>More than 18 years experience</strong></h2>
										</div>
									</div>									
									<div class="white-color pt-3">
										<div class="container">
											<p class="size-40"><strong>of providing turn key consultancy<br> services in establishing world class<br> technical institutions globally</strong></p>
											<p class="mb-0 pb-sm-3 mb-x-0 pb-x-3 mb-xxl-5 pb-xxl-2"></p>
											<p class="size-26 k-wei-600">
												Our mission is to impact Skills Education and <br>Training Internationally Leveraging on the Singapore System.
											</p>
											<p class="pb-2 mb-2"></p>
											<ul class="list-unstyled mb-0">
												<li class="inline-block-item pr-3"><a href="#" class="k-btn-default">Our Video</a></li>
												<li class="inline-block-item"><a href="<?php echo site_url(); ?>/about-us/" class="k-btn-default">About Us</a></li>
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
								<div class="item-slide k-relative text-center k-h-100">

									<?php if ( wp_is_mobile() ): ?>
									    <div class="k-bg" style="background-image: url(<?php echo site_url(); ?>/wp-content/uploads/2021/10/TVET-Expertise-414.jpg); "></div>
									<?php else: ?>
										<div class="k-bg" style="background-image: url(<?php echo site_url(); ?>/wp-content/uploads/2021/10/TVET-Expertise.jpg); "></div>
									<?php endif; ?>	

						      		<div class="container">
						      			<div class="">
							      			<h2 class="h2 size-55 k-main-color pb-1"><strong>Over 50 years of TVET Expertise</strong></h2>
							      			<p class="size-34 k-wei-600 k-main-color mb-4 pb-2">Over 27 Countries Impacted</p>
							      		</div>
							      		<div class="row m-auto">
							      			<div class="col-lg-4 col-md-6 mb-3">
							      				<div class="box k-main-bg">
							      					<figure>
							      						<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/09/Leaders-Trained.png" alt="" class="m-auto">
							      					</figure>
							      					<strong>Over 1,000<br> Leaders Trained</strong>
							      				</div>
							      			</div>
							      			<div class="col-lg-4 col-md-6 mb-3">
							      				<div class="box k-main-bg">
							      					<figure>
							      						<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/09/Centre-Established.png" alt="" class="m-auto">
							      					</figure>
							      					<strong>Over 10 Skills<br> Centre Established</strong>
							      				</div>
							      			</div>
							      			<div class="col-lg-4 col-md-6 mb-3">
							      				<div class="box k-main-bg">
							      					<figure>
							      						<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/09/Trainers-Trained.png" alt="" class="m-auto">
							      					</figure>
							      					<strong>Over 3,000<br> Trainers Trained</strong>
							      				</div>
							      			</div>
							      		</div>
					      			</div>			      		
					      		</div>
					      		<div id="testimonial" class="testimonial k-relative white-color" style="    background-color: #565656; white-space: normal; ">
					      			<div class="container">	
			      						<div id="testimonial-slider" class="carousel slide" data-ride="carousel">
				      						<div class="section">
				      							<div class="title">
						      						<h3><strong class="size-30">Testimonial</strong></h3>
						      					</div>
						      					<div class="carousel-inner">
												    <div class="carousel-item active">
												      	<div class="group">
							      							<div class="des text-justify pb-3">
							      								<p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat”</p>
							      							</div>				      							
							      							<p class="text-right pb-md-0 pb-5">
							      								<i>John Doe (Business Director) - Company ABC XYZ</i>
							      							</p>
							      						</div>	
												    </div>
												    <div class="carousel-item">
												     	<div class="group">
							      							<div class="des text-justify pb-3">
							      								<p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat”</p>
							      							</div>				      							
							      							<p class="text-right">
							      								<i>John Doe (Business Director) - Company ABC XYZ</i>
							      							</p>
							      						</div>	
												    </div>
												    <div class="carousel-item">
												      	<div class="group">
							      							<div class="des text-justify pb-3">
							      								<p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat”</p>
							      							</div>				      							
							      							<p class="text-right">
							      								<i>John Doe (Business Director) - Company ABC XYZ</i>
							      							</p>
							      						</div>	
												    </div>
												</div>
				      						</div>
											<ol class="carousel-indicators ml-0">
											    <li data-target="#testimonial-slider" data-slide-to="0" class="active"></li>
											    <li data-target="#testimonial-slider" data-slide-to="1"></li>
											    <li data-target="#testimonial-slider" data-slide-to="2"></li>
											</ol>
										</div>	
					      			</div>
					      		</div>
					      		<div class="item text-center py-xl-5">
					      			<p class="py-x-4"></p>
					      			<div class="container py-5 black-color">
					      				<div class="group mr-auto ml-auto" style="max-width: 1169px;">
					      					<h2 class="h2 size-55 k-main-color"><strong>How TVET can help your business?</strong></h2>
						      				<p class="pb-2"></p>
						      				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					      				</div>
					      				
					      			</div>
					      			<p class="py-x-4"></p>
					      		</div>
					      		<div class="item item-our-s">

					      			<?php if ( wp_is_mobile() ): ?>
										  	<div class="item-img">
							      				<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/Our-services-banner-414.jpg" alt="" class="w-100">
						      				</div>  
									<?php else: ?>
										<div class="item-img">
							      			<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/Our-services-banner.jpg" alt="" class="w-100">
						      			</div>
									<?php endif; ?>

					      			<div class="container py-5">
					      				<div class="row align-center">
					      					<div class="col-xl-6 col-lg-5 mb-5 mb-lg-0">
					      						<h3><strong class="size-30">Our Services</strong></h3>
					      						<div class="des" style="max-width: 539px;">
					      							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					      						</div>
					      						<p class="pb-2 mb-sm-2 mb-1"></p>
					      						<ul class="list-unstyled">
													<li class="inline-block-item pr-3"><a href="<?php echo site_url(); ?>/our-services" class="k-btn-default k-btn-white">Learn More</a></li>
												</ul>
					      					</div>
					      					<div class="col-xl-6 col-lg-7">
					      						<div class="ours-boxs">
					      							<div class="box">	
					      								<figure>
					      									<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/our-services-logo.png" alt="" class="desk">
					      									<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/our-services-logo-white.png" alt="" class="mb">
					      								</figure>	
					      								<h4><a href="#"><strong>TVET Academic Development</strong></a></h4>
					      								<div class="readmore text-right">
					      									<a href="#"><img src="http://itees.vinova.sg/wp-content/uploads/2021/10/ArrowRight.svg" alt=""></a>
					      								</div>	
					      							</div>
					      							<div class="box">
					      								<figure>
					      									<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/our-services-logo.png" alt="" class="desk">
					      									<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/our-services-logo-white.png" alt="" class="mb">
					      								</figure>
					      								<h4><a href="#"><strong>TVET Infrastructure Development </strong></a></h4>
					      								<div class="readmore text-right">
					      									<a href="#"><img src="http://itees.vinova.sg/wp-content/uploads/2021/10/ArrowRight.svg" alt=""></a>
					      								</div>	
					      							</div>
					      							<div class="box">
					      								<figure>
					      									<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/our-services-logo.png" alt="" class="desk">
					      									<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/our-services-logo-white.png" alt="" class="mb">
					      								</figure>
					      								<h4>
					      									<a href="#"><strong>TVET Leadership Development</strong></a></h4>
					      								<div class="readmore text-right">
					      									<a href="#"><img src="http://itees.vinova.sg/wp-content/uploads/2021/10/ArrowRight.svg" alt=""></a>
					      								</div>	
					      							</div>
					      							<div class="break"></div>
					      							<div class="box">
					      								<figure>
					      									<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/our-services-logo.png" alt="" class="desk">
					      									<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/our-services-logo-white.png" alt="" class="mb">
					      								</figure>
					      								<h4><a href="#"><strong>TVET Staff Capability Development</strong></a></h4>
					      								<div class="readmore text-right">
					      									<a href="#"><img src="http://itees.vinova.sg/wp-content/uploads/2021/10/ArrowRight.svg" alt=""></a>
					      								</div>	
					      							</div>
					      							<div class="box">
					      								<figure>
					      									<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/our-services-logo.png" alt="" class="desk">
					      									<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/our-services-logo-white.png" alt="" class="mb">
					      								</figure>
					      								<h4><a href="#"><strong>TVET Licensing and Certification</strong></a></h4>
					      								<div class="readmore text-right">
					      									<a href="#"><img src="http://itees.vinova.sg/wp-content/uploads/2021/10/ArrowRight.svg" alt=""></a>
					      								</div>	
					      							</div>
					      							<div class="box">
					      								<figure>
					      									<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/our-services-logo.png" alt="" class="desk">
					      									<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/our-services-logo-white.png" alt="" class="mb">
					      								</figure>
					      								<h4><a href="#"><strong>TVET Quality Assurance</strong></a></h4>
					      								<div class="readmore text-right">
					      									<a href="#"><img src="http://itees.vinova.sg/wp-content/uploads/2021/10/ArrowRight.svg" alt=""></a>
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
					<div class="pane an visible-d slide slide-3" data-id="Horizontal03">
						<div class="ct">
							<div class="main-item k-h-100" style="overflow-y: scroll;">
								<div class="item k-h-100">
									<div class="row k-h-100">
										<div class="col-xl-3 pr-0">
											<figure class="mb-0 k-h-100 k-relative">
												<div class="bg" style="background-image: url(<?php echo site_url(); ?>/wp-content/uploads/2021/10/Expertise-banner.jpg); background-position: center; background-size: cover; "></div>
												<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/Expertise-bannerx1200.jpg" alt="" class='w-100'>
											</figure>
										</div>
										<div class="col-xl-9 pl-0">
											<div class="big-group k-h-100">
												<div class="group white-color" style="background-color: #565656; ">
													<div class="title size-34 mb-md-4"><strong>Area of Expertise</strong></div>	
													<nav>
													    <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">
														    <a class="nav-link border-0 active" id="nav-engineering-tab" data-toggle="tab" href="#nav-engineering" role="tab" aria-controls="nav-engineering" aria-selected="true">Engineering</a>
														    <a class="nav-link border-0" id="nav-communi-tab" data-toggle="tab" href="#nav-communi" role="tab" aria-controls="nav-communi" aria-selected="false">Info-Communications Technology</a>

														    <a class="nav-link border-0" id="nav-business-tab" data-toggle="tab" href="#nav-business" role="tab" aria-controls="nav-business" aria-selected="false">Business and Services</a>

														    <a class="nav-link border-0" id="nav-design-tab" data-toggle="tab" href="#nav-design" role="tab" aria-controls="nav-design" aria-selected="false">Design and Media</a>

														    <a class="nav-link border-0" id="nav-health-tab" data-toggle="tab" href="#nav-health" role="tab" aria-controls="nav-health" aria-selected="false">Applied and Health Sciences</a>

														    <a class="nav-link border-0" id="nav-hospitality-tab" data-toggle="tab" href="#nav-hospitality" role="tab" aria-controls="nav-hospitality" aria-selected="false">Hospitality and Tourism</a>

														    <a class="nav-link border-0" id="nav-life-tab" data-toggle="tab" href="#nav-life" role="tab" aria-controls="nav-life" aria-selected="false">Life Skills</a>
													    </div>
													</nav>
												</div>
												<div class="group white-color k-main-bg">
													<div class="tab-content" id="nav-tabContent">
													    <div class="tab-pane fade show active" id="nav-engineering" role="tabpanel" aria-labelledby="nav-engineering-tab">
													    	<div class="group-1">
																<div class="head pb-2 pb-x-4">
																	<p class="mb-1 pb-1"><strong>Engineering</strong></p>
																	<div class="des text-justify" style="max-width: 743px;">
																		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
																	</div>			
																</div>
																<div class="des">
																	<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																	<div class="list-ul">
																		<ul class="list-unstyled mb-0">
																			<li>Aerospace Avionics</li>
																			<li>Automotive Technology</li>
																			<li>Civil and Structural Engineering Design</li>
																			<li>Electrical Technology</li>
																			<li>Electrics Technology</li>
																			<li>Engineering with Business</li>
																			<li>Facility Management</li>
																			<li>Facility Systems Design</li>
																			<li>Facility Technology</li>
																			<li>Lazer and Tooling</li>
																			<li>Marine & Offshore Technology</li>
																			<li>Mechatronics</li>
																			<li>Medical Technologyanufacturing</li>
																			<li>Mechanical Technology</li>
																		</ul>
																		<ul class="list-unstyled mb-0">
																			<li>Offshore & Marine Engineering Design</li>
																			<li>Process Plant Design</li>
																			<li>Repid Transit Technology</li>
																		</ul>
																	</div>				
																</div>
															</div>
													    </div>
													    <div class="tab-pane fade" id="nav-communi" role="tabpanel" aria-labelledby="nav-communi-tab">
													    	<div class="group-1">
																<div class="head pb-2 pb-x-4">
																	<p class="mb-1 pb-1"><strong>Info-Communications Technology</strong></p>
																	<div class="des text-justify" style="max-width: 743px;">
																		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
																	</div>			
																</div>
																<div class="des">
																	<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																	<div class="list-ul">
																		<ul class="list-unstyled mb-0">
																			<li>Aerospace Avionics</li>
																			<li>Automotive Technology</li>
																			<li>Civil and Structural Engineering Design</li>
																			<li>Electrical Technology</li>
																			<li>Electrics Technology</li>
																			<li>Engineering with Business</li>
																			<li>Facility Management</li>
																			<li>Facility Systems Design</li>
																			<li>Facility Technology</li>
																			<li>Lazer and Tooling</li>
																			<li>Marine & Offshore Technology</li>
																			<li>Mechatronics</li>
																			<li>Medical Technologyanufacturing</li>
																			<li>Mechanical Technology</li>
																		</ul>
																		<ul class="list-unstyled mb-0">
																			<li>Offshore & Marine Engineering Design</li>
																			<li>Process Plant Design</li>
																			<li>Repid Transit Technology</li>
																		</ul>
																	</div>				
																</div>
															</div>
													    </div>
													    <div class="tab-pane fade" id="nav-business" role="tabpanel" aria-labelledby="nav-business-tab">
													    	<div class="group-1">
																<div class="head pb-2 pb-x-4">
																	<p class="mb-1 pb-1"><strong>Business and Services</strong></p>
																	<div class="des text-justify" style="max-width: 743px;">
																		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
																	</div>			
																</div>
																<div class="des">
																	<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																	<div class="list-ul">
																		<ul class="list-unstyled mb-0">
																			<li>Aerospace Avionics</li>
																			<li>Automotive Technology</li>
																			<li>Civil and Structural Engineering Design</li>
																			<li>Electrical Technology</li>
																			<li>Electrics Technology</li>
																			<li>Engineering with Business</li>
																			<li>Facility Management</li>
																			<li>Facility Systems Design</li>
																			<li>Facility Technology</li>
																			<li>Lazer and Tooling</li>
																			<li>Marine & Offshore Technology</li>
																			<li>Mechatronics</li>
																			<li>Medical Technologyanufacturing</li>
																			<li>Mechanical Technology</li>
																		</ul>
																		<ul class="list-unstyled mb-0">
																			<li>Offshore & Marine Engineering Design</li>
																			<li>Process Plant Design</li>
																			<li>Repid Transit Technology</li>
																		</ul>
																	</div>				
																</div>
															</div>
													    </div>
													    <div class="tab-pane fade" id="nav-design" role="tabpanel" aria-labelledby="nav-design-tab">
													    	<div class="group-1">
																<div class="head pb-2 pb-x-4">
																	<p class="mb-1 pb-1"><strong>Design and Media</strong></p>
																	<div class="des text-justify" style="max-width: 743px;">
																		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
																	</div>			
																</div>
																<div class="des">
																	<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																	<div class="list-ul">
																		<ul class="list-unstyled mb-0">
																			<li>Aerospace Avionics</li>
																			<li>Automotive Technology</li>
																			<li>Civil and Structural Engineering Design</li>
																			<li>Electrical Technology</li>
																			<li>Electrics Technology</li>
																			<li>Engineering with Business</li>
																			<li>Facility Management</li>
																			<li>Facility Systems Design</li>
																			<li>Facility Technology</li>
																			<li>Lazer and Tooling</li>
																			<li>Marine & Offshore Technology</li>
																			<li>Mechatronics</li>
																			<li>Medical Technologyanufacturing</li>
																			<li>Mechanical Technology</li>
																		</ul>
																		<ul class="list-unstyled mb-0">
																			<li>Offshore & Marine Engineering Design</li>
																			<li>Process Plant Design</li>
																			<li>Repid Transit Technology</li>
																		</ul>
																	</div>				
																</div>
															</div>
													    </div>
													    <div class="tab-pane fade" id="nav-health" role="tabpanel" aria-labelledby="nav-health-tab">
													    	<div class="group-1">
																<div class="head pb-2 pb-x-4">
																	<p class="mb-1 pb-1"><strong>Applied and Health Sciences</strong></p>
																	<div class="des text-justify" style="max-width: 743px;">
																		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
																	</div>			
																</div>
																<div class="des">
																	<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																	<div class="list-ul">
																		<ul class="list-unstyled mb-0">
																			<li>Aerospace Avionics</li>
																			<li>Automotive Technology</li>
																			<li>Civil and Structural Engineering Design</li>
																			<li>Electrical Technology</li>
																			<li>Electrics Technology</li>
																			<li>Engineering with Business</li>
																			<li>Facility Management</li>
																			<li>Facility Systems Design</li>
																			<li>Facility Technology</li>
																			<li>Lazer and Tooling</li>
																			<li>Marine & Offshore Technology</li>
																			<li>Mechatronics</li>
																			<li>Medical Technologyanufacturing</li>
																			<li>Mechanical Technology</li>
																		</ul>
																		<ul class="list-unstyled mb-0">
																			<li>Offshore & Marine Engineering Design</li>
																			<li>Process Plant Design</li>
																			<li>Repid Transit Technology</li>
																		</ul>
																	</div>				
																</div>
															</div>
													    </div>
													    <div class="tab-pane fade" id="nav-hospitality" role="tabpanel" aria-labelledby="nav-hospitality-tab">
													    	<div class="group-1">
																<div class="head pb-2 pb-x-4">
																	<p class="mb-1 pb-1"><strong>Hospitality and Tourism</strong></p>
																	<div class="des text-justify" style="max-width: 743px;">
																		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
																	</div>			
																</div>
																<div class="des">
																	<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																	<div class="list-ul">
																		<ul class="list-unstyled mb-0">
																			<li>Aerospace Avionics</li>
																			<li>Automotive Technology</li>
																			<li>Civil and Structural Engineering Design</li>
																			<li>Electrical Technology</li>
																			<li>Electrics Technology</li>
																			<li>Engineering with Business</li>
																			<li>Facility Management</li>
																			<li>Facility Systems Design</li>
																			<li>Facility Technology</li>
																			<li>Lazer and Tooling</li>
																			<li>Marine & Offshore Technology</li>
																			<li>Mechatronics</li>
																			<li>Medical Technologyanufacturing</li>
																			<li>Mechanical Technology</li>
																		</ul>
																		<ul class="list-unstyled mb-0">
																			<li>Offshore & Marine Engineering Design</li>
																			<li>Process Plant Design</li>
																			<li>Repid Transit Technology</li>
																		</ul>
																	</div>				
																</div>
															</div>
													    </div>
													    <div class="tab-pane fade" id="nav-life" role="tabpanel" aria-labelledby="nav-life-tab">
													    	<div class="group-1">
																<div class="head pb-2 pb-x-4">
																	<p class="mb-1 pb-1"><strong>Life Skills</strong></p>
																	<div class="des text-justify" style="max-width: 743px;">
																		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
																	</div>			
																</div>
																<div class="des">
																	<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																	<div class="list-ul">
																		<ul class="list-unstyled mb-0">
																			<li>Aerospace Avionics</li>
																			<li>Automotive Technology</li>
																			<li>Civil and Structural Engineering Design</li>
																			<li>Electrical Technology</li>
																			<li>Electrics Technology</li>
																			<li>Engineering with Business</li>
																			<li>Facility Management</li>
																			<li>Facility Systems Design</li>
																			<li>Facility Technology</li>
																			<li>Lazer and Tooling</li>
																			<li>Marine & Offshore Technology</li>
																			<li>Mechatronics</li>
																			<li>Medical Technologyanufacturing</li>
																			<li>Mechanical Technology</li>
																		</ul>
																		<ul class="list-unstyled mb-0">
																			<li>Offshore & Marine Engineering Design</li>
																			<li>Process Plant Design</li>
																			<li>Repid Transit Technology</li>
																		</ul>
																	</div>				
																</div>
															</div>
													    </div>
													</div>												
												</div>
											</div>	
											<div class="big-group big-group-mb white-color" style="background-color: #565656; ">
												<div class="title size-34 mb-md-4">
													<strong>Area of Expertise</strong></div>	

											    <div class="nav-tabs border-bottom-0">
											    	<div class="accordion">Engineering</div>
											    	<div class="panel white-color k-main-bg">
											    		<div class="group-1">
															<div class="head pb-2 pb-x-4">
																<div class="des text-justify" style="max-width: 743px;">
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
																</div>			
															</div>
															<div class="des">
																<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																<div class="list-ul">
																	<ul class="list-unstyled mb-0">
																		<li>Aerospace Avionics</li>
																		<li>Automotive Technology</li>
																		<li>Civil and Structural Engineering Design</li>
																		<li>Electrical Technology</li>
																		<li>Electrics Technology</li>
																		<li>Engineering with Business</li>
																		<li>Facility Management</li>
																		<li>Facility Systems Design</li>
																		<li>Facility Technology</li>
																		<li>Lazer and Tooling</li>
																		<li>Marine & Offshore Technology</li>
																		<li>Mechatronics</li>
																		<li>Medical Technologyanufacturing</li>
																		<li>Mechanical Technology</li>
																	</ul>
																	<ul class="list-unstyled mb-0">
																		<li>Offshore & Marine Engineering Design</li>
																		<li>Process Plant Design</li>
																		<li>Repid Transit Technology</li>
																	</ul>
																</div>				
															</div>
														</div>
											    	</div>
											    </div>
											    <div class="nav-tabs border-bottom-0">
											    	<div class="accordion">Info-Communications Technology</div>
											    	<div class="panel white-color k-main-bg">
											    		<div class="group-1">
															<div class="head pb-2 pb-x-4">
																<div class="des text-justify" style="max-width: 743px;">
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
																</div>			
															</div>
															<div class="des">
																<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																<div class="list-ul">
																	<ul class="list-unstyled mb-0">
																		<li>Aerospace Avionics</li>
																		<li>Automotive Technology</li>
																		<li>Civil and Structural Engineering Design</li>
																		<li>Electrical Technology</li>
																		<li>Electrics Technology</li>
																		<li>Engineering with Business</li>
																		<li>Facility Management</li>
																		<li>Facility Systems Design</li>
																		<li>Facility Technology</li>
																		<li>Lazer and Tooling</li>
																		<li>Marine & Offshore Technology</li>
																		<li>Mechatronics</li>
																		<li>Medical Technologyanufacturing</li>
																		<li>Mechanical Technology</li>
																	</ul>
																	<ul class="list-unstyled mb-0">
																		<li>Offshore & Marine Engineering Design</li>
																		<li>Process Plant Design</li>
																		<li>Repid Transit Technology</li>
																	</ul>
																</div>				
															</div>
														</div>
											    	</div>
											    </div>
											    <div class="nav-tabs border-bottom-0">
											    	<div class="accordion">Business and Services</div>
											    	<div class="panel white-color k-main-bg">
											    		<div class="group-1">
															<div class="head pb-2 pb-x-4">
																<div class="des text-justify" style="max-width: 743px;">
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
																</div>			
															</div>
															<div class="des">
																<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																<div class="list-ul">
																	<ul class="list-unstyled mb-0">
																		<li>Aerospace Avionics</li>
																		<li>Automotive Technology</li>
																		<li>Civil and Structural Engineering Design</li>
																		<li>Electrical Technology</li>
																		<li>Electrics Technology</li>
																		<li>Engineering with Business</li>
																		<li>Facility Management</li>
																		<li>Facility Systems Design</li>
																		<li>Facility Technology</li>
																		<li>Lazer and Tooling</li>
																		<li>Marine & Offshore Technology</li>
																		<li>Mechatronics</li>
																		<li>Medical Technologyanufacturing</li>
																		<li>Mechanical Technology</li>
																	</ul>
																	<ul class="list-unstyled mb-0">
																		<li>Offshore & Marine Engineering Design</li>
																		<li>Process Plant Design</li>
																		<li>Repid Transit Technology</li>
																	</ul>
																</div>				
															</div>
														</div>
											    	</div>
											    </div>
											    <div class="nav-tabs border-bottom-0">
											    	<div class="accordion">Design and Media</div>
											    	<div class="panel white-color k-main-bg">
											    		<div class="group-1">
															<div class="head pb-2 pb-x-4">
																<div class="des text-justify" style="max-width: 743px;">
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
																</div>			
															</div>
															<div class="des">
																<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																<div class="list-ul">
																	<ul class="list-unstyled mb-0">
																		<li>Aerospace Avionics</li>
																		<li>Automotive Technology</li>
																		<li>Civil and Structural Engineering Design</li>
																		<li>Electrical Technology</li>
																		<li>Electrics Technology</li>
																		<li>Engineering with Business</li>
																		<li>Facility Management</li>
																		<li>Facility Systems Design</li>
																		<li>Facility Technology</li>
																		<li>Lazer and Tooling</li>
																		<li>Marine & Offshore Technology</li>
																		<li>Mechatronics</li>
																		<li>Medical Technologyanufacturing</li>
																		<li>Mechanical Technology</li>
																	</ul>
																	<ul class="list-unstyled mb-0">
																		<li>Offshore & Marine Engineering Design</li>
																		<li>Process Plant Design</li>
																		<li>Repid Transit Technology</li>
																	</ul>
																</div>				
															</div>
														</div>
											    	</div>
											    </div>
											    <div class="nav-tabs border-bottom-0">
											    	<div class="accordion">Applied and Health Sciences</div>
											    	<div class="panel white-color k-main-bg">
											    		<div class="group-1">
															<div class="head pb-2 pb-x-4">
																<div class="des text-justify" style="max-width: 743px;">
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
																</div>			
															</div>
															<div class="des">
																<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																<div class="list-ul">
																	<ul class="list-unstyled mb-0">
																		<li>Aerospace Avionics</li>
																		<li>Automotive Technology</li>
																		<li>Civil and Structural Engineering Design</li>
																		<li>Electrical Technology</li>
																		<li>Electrics Technology</li>
																		<li>Engineering with Business</li>
																		<li>Facility Management</li>
																		<li>Facility Systems Design</li>
																		<li>Facility Technology</li>
																		<li>Lazer and Tooling</li>
																		<li>Marine & Offshore Technology</li>
																		<li>Mechatronics</li>
																		<li>Medical Technologyanufacturing</li>
																		<li>Mechanical Technology</li>
																	</ul>
																	<ul class="list-unstyled mb-0">
																		<li>Offshore & Marine Engineering Design</li>
																		<li>Process Plant Design</li>
																		<li>Repid Transit Technology</li>
																	</ul>
																</div>				
															</div>
														</div>
											    	</div>
											    </div>
											    <div class="nav-tabs border-bottom-0">
											    	<div class="accordion">Hospitality and Tourism</div>
											    	<div class="panel white-color k-main-bg">
											    		<div class="group-1">
															<div class="head pb-2 pb-x-4">
																<div class="des text-justify" style="max-width: 743px;">
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
																</div>			
															</div>
															<div class="des">
																<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																<div class="list-ul">
																	<ul class="list-unstyled mb-0">
																		<li>Aerospace Avionics</li>
																		<li>Automotive Technology</li>
																		<li>Civil and Structural Engineering Design</li>
																		<li>Electrical Technology</li>
																		<li>Electrics Technology</li>
																		<li>Engineering with Business</li>
																		<li>Facility Management</li>
																		<li>Facility Systems Design</li>
																		<li>Facility Technology</li>
																		<li>Lazer and Tooling</li>
																		<li>Marine & Offshore Technology</li>
																		<li>Mechatronics</li>
																		<li>Medical Technologyanufacturing</li>
																		<li>Mechanical Technology</li>
																	</ul>
																	<ul class="list-unstyled mb-0">
																		<li>Offshore & Marine Engineering Design</li>
																		<li>Process Plant Design</li>
																		<li>Repid Transit Technology</li>
																	</ul>
																</div>				
															</div>
														</div>
											    	</div>
											    </div>
											    <div class="nav-tabs border-bottom-0">
											    	<div class="accordion">Life Skills</div>
											    	<div class="panel white-color k-main-bg">
											    		<div class="group-1">
															<div class="head pb-2 pb-x-4">
																<div class="des text-justify" style="max-width: 743px;">
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
																</div>			
															</div>
															<div class="des">
																<p class="mb-1 pb-1"><strong>Programmes</strong></p>
																<div class="list-ul">
																	<ul class="list-unstyled mb-0">
																		<li>Aerospace Avionics</li>
																		<li>Automotive Technology</li>
																		<li>Civil and Structural Engineering Design</li>
																		<li>Electrical Technology</li>
																		<li>Electrics Technology</li>
																		<li>Engineering with Business</li>
																		<li>Facility Management</li>
																		<li>Facility Systems Design</li>
																		<li>Facility Technology</li>
																		<li>Lazer and Tooling</li>
																		<li>Marine & Offshore Technology</li>
																		<li>Mechatronics</li>
																		<li>Medical Technologyanufacturing</li>
																		<li>Mechanical Technology</li>
																	</ul>
																	<ul class="list-unstyled mb-0">
																		<li>Offshore & Marine Engineering Design</li>
																		<li>Process Plant Design</li>
																		<li>Repid Transit Technology</li>
																	</ul>
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
					<div class="pane an visible-d slide slide-4" data-id="Horizontal04">
						<div class="ct">
							<div class="main-item k-h-100" style="overflow-y: scroll;">
								<div class="item highlights k-h-100">
									<div class="container pb-lg-5">
										<h2 class="h2 size-55 k-main-color pb-3 text-center"><strong>Highlights</strong></h2>
										<div class="lists mr-auto ml-auto mb-3 pb-lg-5" style="max-width: 1252px;">
											<div class="group">
												<?php if ( wp_is_mobile() ): ?>
													<figure class="k-bg-default">
														<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/Highlights-picture-01-414.png" alt="" class="w-100">
													</figure>
												<?php else: ?>
													<figure>
														<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/Highlights-picture-01.jpg" alt="" class="w-100">
													</figure>
												<?php endif; ?>
												
												<div class="title text-center">
													<p><strong>Temasek Foundation - ITE Education Services, (Multi-Discipline) Specialists Programme, Bangladesh</strong></p>
												</div>												
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitasse platea dictumst vestibulum rhoncus est. Sem integer vitae justo eget....</p>
											</div>
											<div class="group">
												<?php if ( wp_is_mobile() ): ?>
													<figure class="k-bg-default">
														<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/Highlights-picture-02-414.png" alt="" class="w-100">
													</figure>
												<?php else: ?>
													<figure>
														<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/Highlights-picture-02.jpg" alt="" class="w-100">
													</figure>
												<?php endif; ?>
												

												<div class="title text-center">
													<p><strong>Temasek Foundation - ITE Education Services, General Leaders / Specialist Programme, Philippines</strong></p>
												</div>												
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitasse platea dictumst vestibulum rhoncus est. Sem integer vitae justo eget....</p>
											</div>
											<div class="group">
												<?php if ( wp_is_mobile() ): ?>
													<figure class="k-bg-default">
														<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/Highlights-picture-03-414.png" alt="" class="w-100">
													</figure>
												<?php else: ?>
													<figure class="k-bg-default">
														<img src="http://itees.vinova.sg/wp-content/uploads/2021/10/Highlights-picture-03.jpg" alt="" class="w-100">
													</figure>
												<?php endif; ?>
												
												<div class="title text-center">
													<p><strong>Ministry of Foreign Affairs, Singapore - ITE Education Services, Leadership Development Programme for Principals and Leaders</strong></p>
												</div>												
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitasse platea dictumst vestibulum rhoncus est. Sem integer vitae justo eget....</p>
											</div>
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
												<div class="form-group k-h-100">
													<p class="mb-xx-1 pb-xx-5"></p>
													<div class="title k-main-color size-34 mb-1"><strong>Contact Us</strong></div>
													<div class="text-justify pb-3 k-wei-600" style="color: #565656;">
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
													</div>
													<div class="form-contact">
														<form action="/" class="size-18">
															<input type="text" name="name" value="" placeholder="Name" class="input">
															<input type="email" name="email" value="" placeholder="Email" class="input">
															<textarea name="remarks" id="" rows="5" placeholder="Remarks" class="input"></textarea>
															<input type="submit" id="submit-contact" value="Submit">
														</form>
													</div>
												</div>
											</div>
											<div class="col-xl-8 k-h-100">
												<div class="foot k-h-100">
													<div>
														<div class="title k-main-color size-34 mb-1"><strong>ITE Education Services</strong></div>
														<p>ITE Headquarters, 2 Ang Mo Kio Drive, Blk A, A2-01 <br>Singapore 567720</p>
														<p class="pb-1 mb-2"></p>
														<div class="map">
															<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7977.329310661646!2d103.856227!3d1.37788!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da16f1fe3a1121%3A0x95e6c6eec032cd60!2s2%20Ang%20Mo%20Kio%20Dr%2C%20Singapore%20567720!5e0!3m2!1sen!2sus!4v1635319870382!5m2!1sen!2sus" width="100%" height="477" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
														</div>
													</div>
													<div>
														<p class="mb-2 pt-4"></p>
														<div class="title mb-2"><strong>ASEAN, Central Asia and East Asia</strong></div>
														<div class="group-dou">
															<p>Chong Choon Leong <br>
															Deputy Director <br>
															Tel <a href="tel:(+65) 6590 2609">(+65) 6590 2609</a> <br>
															Mobile <a href="tel:(+65) 9002 9041">(+65) 9002 9041</a> <br>
															Email <br><a href="mailto:Chong_Choon_Leong@ite.edu.sg"><span>Chong_Choon_Leong<br>@ite.edu.sg</span></a></p>
															<p>Yvonne Lian <br>
															Manager <br>
															Tel <a href="tel:(+65) 6590 2613">(+65) 6590 2613</a> <br>
															Mobile <a href="tel:(+65) 9172 6792">(+65) 9172 6792</a> <br>
															Email <br><a href="mailto:Yvonne_j_lian@ite.edu.sg"><span>Yvonne_J_Lian@ite.<br>edu.sg</span></a></p>
														</div>

														<div class="title mb-2"><strong>South Asia, Middle East, Africa and Latin America</strong></div>
														<div class="group-dou">
															<p>Fabian Cheong <br>
																Deputy Director <br>
																Tel <a href="tel:(+65) 6590 2607">(+65) 6590 2607</a> <br>
																Mobile <a href="tel:(+65) 9799 7010">(+65) 9799 7010</a> <br>
																Email <br><a href="mailto:Fabian_Cheong@ite.edu.sg"><span>Fabian_Cheong@ite.<br>edu.sg</span></a></p>
															<p>Gary Soh <br>
																Manager <br>
																Tel <a href="tel:(+65) 6590 2620">(+65) 6590 2620</a> <br>
																Mobile <a href="tel:(+65) 9786 5582">(+65) 9786 5582</a> <br>
																Email <br><a href="mailto:Gary_H_Soh@ite.edu.sg"><span>Gary_H_Soh@ite.edu<br>.sg</span></a></p>
														</div>	
														<div class="title mb-2"><strong>General Enquiries</strong></div>
														<div class="group-dou">
															<p>Tel <a href="tel:(+65) 6590 2619">(+65) 6590 2619</a> <br>
																Fax (+65) 6590 2610 <br>
																Email <a href="mailto:itees@ite.edu.sg">itees@ite.edu.sg</a> <br>
																Website www.itees.com.sg</p>
														</div>
													</div>
												</div>
											</div>											
										</div>
										<div class="foot-bar foot-bar-size">
											<div class="foot-menu">
												<ul class="list-unstyled mb-0">
													<li><a href="#">Privacy Policy</a></li>
													<li><a href="#">Terms and Conditions</a></li>
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
		<!-- <div id="Helper"></div> -->
	</div>	

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/plugins/ScrollToPlugin.min.js'></script>
<script src='<?php echo site_url(); ?>/wp-content/themes/itees/assets/js/scrollpane.js'></script>
<script src='<?php echo site_url(); ?>/wp-content/themes/itees/assets/js/jquery.onepage-scroll.min.js'></script>

<?php get_footer(); ?>
