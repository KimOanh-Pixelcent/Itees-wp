<?php 
	get_header(); 
?>
	<div id="about-page" class="page-container pb-sm-4">
		<div class="height-tam" style="height: 219px; "></div>
		<div class="banner pb-5 mb-xl-5">
			<div class="container d-flex align-center">
				<div class="group group-text">
					<h2 class="h2 size-55 k-main-color">
						<strong>404 NOT FOUND</strong>
					</h2>
					<div class="text k-main-bg k-relative pb-3">

						<div class="text-justify size-18" style="max-width: 672px; ">
							<p>Page not available. Click <a href="<?php echo site_url(); ?>">Home</a> to back.</p>
						</div>	
					</div>
				</div>		
				<div class="group group-img">
					<img src="<?php echo site_url(); ?>/wp-content/uploads/2021/10/Home-nav.jpg" alt="" class="w-100">
				</div>
			</div>
		</div>
	</div>	

<?php get_footer('content'); ?>