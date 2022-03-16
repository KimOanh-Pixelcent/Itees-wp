<?php 
	/*
	** Template name: Template - Privacy Policy & Terms and Conditions
	*/
	get_header(); 
?>

	<div id="page-default" class="pt-5">
		<div class="container">
			<div class="content pb-5 text-justify">
				<h2 class="size-55 k-main-color mb-4 text-left"><strong><?php the_title(); ?></strong></h2>
				<?php 
					while ( have_posts() ) : the_post() ;
				        the_content(); 
				    endwhile;
				 ?>				
			</div>
		</div>
	</div>
<?php get_footer('content'); ?>