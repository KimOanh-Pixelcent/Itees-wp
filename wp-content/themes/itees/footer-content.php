
<footer class="content-foot" style="background-color: #6D6D6D; ">
	<div class="container">
		<div class="foot-bar-size d-flex align-items-end white-color">
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
		<div class="foot-bar-mb white-color text-center">
			<?php if( get_field('footer_bar', 'option')): 
				echo '<span>'.get_field('footer_bar', 'option').'</span>';
			endif; ?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>