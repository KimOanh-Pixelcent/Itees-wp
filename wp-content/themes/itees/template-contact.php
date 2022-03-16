<?php 
	/*
	** Template name: Template - Contact Us 
	*/
	get_header(); 
?>
	<div class="contact-container">
		<div id="contact-page" class="page-container contact-section h-xl-100">
			<div class="item k-relative h-xl-100">
				<div class="container k-relative h-xl-100">
					<div class="row align-items-center h-xl-100">
						<div class="col-xl-4 h-xl-100">
							<div class="form-group">
								<p class="mb-xx-1 pb-xl-5"></p>

								<?php if( have_rows('contact_section') ):
									while( have_rows('contact_section') ): the_row();  ?>
									<div class="title k-main-color size-34 mb-1"><strong><?php the_sub_field('title'); ?></strong></div>
									<div class="text-justify pb-3 k-wei-600" style="color: #565656;">
										<p><?php the_sub_field('description'); ?></p>
									</div>
								<?php endwhile; endif; wp_reset_postdata(); ?>

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
						<div class="col-xl-8 h-xl-100 k-relative">
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
				</div>			
			</div>
		</div>	
		<?php get_footer('item'); ?>
	</div>

<?php get_footer(); ?>
