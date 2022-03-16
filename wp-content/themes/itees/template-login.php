<?php 
	/*
	** Template name: Template - Login
	*/
	get_header(); 
?>
	<div id="login-page" class="page-container pb-sm-4">
		<div class="height-tam" style="height: 219px; "></div>
		<div class="login-group d-flex align-center pb-5 mb-xl-5">
			<div class="group group-form order-md-2">
				<h2 class="h2 size-55 k-main-color">
					<strong><?php the_title(); ?></strong>
				</h2>
				<div class="login-frm">
				<?php 
					$my_login_args = apply_filters( 'my_login_page_args', array(
		            'echo'           => true, 
		            'form_id'        => 'loginform',
			        'label_username' => __( '' ),
			        'label_password' => __( '' ),
			        'label_remember' => __( '' ),
			        'label_log_in'   => __( 'Log in' ),
			        'id_username'    => 'user_login',
			        'id_password'    => 'user_pass',
			        'id_remember'    => 'rememberme',
			        'id_submit'      => 'wp-submit',
			        'remember'       => false,
			        'value_username' => '',
			        'value_remember' => false,
		        ) );
				 ?>						 	
					<?php wp_login_form($my_login_args); ?>
					<div class="forget-pass size-18 white-color pt-xxl-5 pt-4">
						Forget your password? <a href="<?php echo esc_url( wp_lostpassword_url( get_home_url() ) ); ?>" alt="<?php esc_attr_e( 'Click here', 'textdomain' ); ?>">
						   	<?php esc_html_e( 'Click here', 'textdomain' ); ?>
						</a>
					</div>					
				</div>
			</div>
			<div class="group group-img k-bg-default" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>); ">
				<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" alt="" class="w-100 fade">
			</div>
		</div>
	</div>	

<?php get_footer('content'); ?>