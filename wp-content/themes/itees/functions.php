<?php 


add_theme_support( 'title-tag' );

add_theme_support( 'post-thumbnails' );

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'post-formats',

	array(

		'video',

		'image',

		'audio',

		'gallery',

	)

);



// Register Menu

register_nav_menu ( 'primary-menu', __('Primary Menu', 'pixelcent') );
register_nav_menu ( 'footer-menu', __('Footer Menu', 'pixelcent') );

// Style and scrips

function add_theme_scripts() {    


	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap-4.6.min.css', array(), time(), 'all');

	wp_enqueue_style( 'main-tyle', get_template_directory_uri() . '/main.css', array(), time(), 'all');

	wp_enqueue_style( 'custom-tyle', get_template_directory_uri() . '/style.css', array(), time(), 'all');

	wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap-4.6.min.js', array('jquery') );

	wp_enqueue_script( 'bootstrap-script' );

	wp_register_script( 'custom-script', get_template_directory_uri() . '/custom-k.js', array('jquery') );

	wp_enqueue_script( 'custom-script' );

}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );



function sidebar_widgets_footer() {

	register_sidebar( array(

		'name'          => __( 'Footer Area 1', 'footer_area_1' ),

		'id'            => 'footer_area_1',

		'description'   => ( 'Add widgets here to appear in your Sidebar.'),

		'before_widget' => '<aside class="widget %2$s">',

		'after_widget'  => '</aside>',

		'before_title'  => '<div class="widget-title">',

		'after_title'   => '</div>',

	) );	

	register_sidebar( array(

		'name'          => __( 'Footer Area 2', 'footer_area_2' ),

		'id'            => 'footer_area_2',

		'description'   => ( 'Add widgets here to appear in your Sidebar.'),

		'before_widget' => '<aside class="widget %2$s">',

		'after_widget'  => '</aside>',

		'before_title'  => '<div class="widget-title">',

		'after_title'   => '</div>',

	) );	

	register_sidebar( array(

		'name'          => __( 'Footer Area 3', 'footer_area_3' ),

		'id'            => 'footer_area_3',

		'description'   => ( 'Add widgets here to appear in your Sidebar.'),

		'before_widget' => '<aside class="widget %2$s">',

		'after_widget'  => '</aside>',

		'before_title'  => '<div class="widget-title">',

		'after_title'   => '</div>',

	) );	

	register_sidebar( array(

		'name'          => __( 'Footer Area 4', 'footer_area_4' ),

		'id'            => 'footer_area_4',

		'description'   => ( 'Add widgets here to appear in your Sidebar.'),

		'before_widget' => '<aside class="widget %2$s">',

		'after_widget'  => '</aside>',

		'before_title'  => '<div class="widget-title">',

		'after_title'   => '</div>',

	) );

	register_sidebar( array(

		'name'          => __( 'Footer Bar 1', 'footer_bar_1' ),

		'id'            => 'footer_bar_1',

		'description'   => ( 'Add widgets here to appear in your Sidebar.'),

		'before_widget' => '<aside class="widget %2$s">',

		'after_widget'  => '</aside>',

		'before_title'  => '<div class="widget-title">',

		'after_title'   => '</div>',

	) );

}

add_action( 'widgets_init', 'sidebar_widgets_footer' );



function login_redirect_page( $redirect_to, $request, $user ) {



	global $user;

	if ( isset( $user->roles ) && is_array( $user->roles ) ) {



		if ( in_array( 'administrator', $user->roles ) ) {

			return get_site_url().'/wp-admin/';

		}

		else {

			return home_url();

		}

	} else {

		return $redirect_to;

	}

}



add_filter( 'login_redirect', 'login_redirect_page', 10, 3 );





// Register Custom Post Type

function custom_highlights() {



	$labels = array(

		'name'                  => _x( 'Highlights', 'Post Type General Name', 'text_domain' ),

		'singular_name'         => _x( 'Highlights', 'Post Type Singular Name', 'text_domain' ),

		'menu_name'             => __( 'Highlights', 'text_domain' ),

		'name_admin_bar'        => __( 'Highlights', 'text_domain' ),

		'archives'              => __( 'Item Archives', 'text_domain' ),

		'attributes'            => __( 'Item Attributes', 'text_domain' ),

		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),

		'all_items'             => __( 'All Items', 'text_domain' ),

		'add_new_item'          => __( 'Add New Item', 'text_domain' ),

		'add_new'               => __( 'Add New', 'text_domain' ),

		'new_item'              => __( 'New Item', 'text_domain' ),

		'edit_item'             => __( 'Edit Item', 'text_domain' ),

		'update_item'           => __( 'Update Item', 'text_domain' ),

		'view_item'             => __( 'View Item', 'text_domain' ),

		'view_items'            => __( 'View Items', 'text_domain' ),

		'search_items'          => __( 'Search Item', 'text_domain' ),

		'not_found'             => __( 'Not found', 'text_domain' ),

		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),

		'featured_image'        => __( 'Featured Image', 'text_domain' ),

		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),

		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),

		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),

		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),

		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),

		'items_list'            => __( 'Items list', 'text_domain' ),

		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),

		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),

	);

	$args = array(

		'label'                 => __( 'Highlights', 'text_domain' ),

		'description'           => __( 'Highlights Description', 'text_domain' ),

		'labels'                => $labels,

		'supports'              => array( 'title', 'editor', 'thumbnail' ),

		'taxonomies'            => array( 'category-highlights', 'post_tag' ),

		'hierarchical'          => false,

		'public'                => true,

		'show_ui'               => true,

		'show_in_menu'          => true,

		'menu_position'         => 5,

		'show_in_admin_bar'     => true,

		'show_in_nav_menus'     => true,

		'can_export'            => true,

		'has_archive'           => true,

		'exclude_from_search'   => false,

		'publicly_queryable'    => true,

		'capability_type'       => 'page',

	);

	register_post_type( 'highlights', $args );



}

add_action( 'init', 'custom_highlights', 0 );


// Our Sevices Post Type (Uy)
function custom_our_services() {

	$labels = array(
		'name'                  => _x( 'Our Services', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Our Services', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Our Services', 'text_domain' ),
		'name_admin_bar'        => __( 'Our Services', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Our Services', 'text_domain' ),
		'description'           => __( 'Our Services Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category-our-services', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'our-services', $args );

}
add_action( 'init', 'custom_our_services', 0 );


/*Dang add - Begin - 12112021*/
/*Register Post Type*/
function custom_array($str,$slug,$icoin='generic'){
    $args = array(
        'labels' => array('name' => $str, 'singular_name' => $str),
        'description' => $str, 
        'supports' => array(  'title', 'editor', 'excerpt',  'author', 'thumbnail', 'comments', 'trackbacks' , 'revisions' , 'custom-fields' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
		'rewrite' => array('slug' => $slug,'with_front' => false),
        'menu_position' => 5,
		"show_in_rest" => true,
        'menu_icon' => 'dashicons-'.$icoin,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post' //
    );
    register_post_type($slug, $args);	
}

function create_post_type()
{
	custom_array('Projects','projects','admin-site');
}
add_action('init', 'create_post_type');
function slugify($text, string $divider = '-')
{
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  $text = preg_replace('~[^-\w]+~', '', $text);
  $text = trim($text, $divider);
  $text = preg_replace('~-+~', $divider, $text);
  $text = strtolower($text);
  if (empty($text)) {
    return 'n-a';
  }
  return $text;
}

function register_taxonomy_it($str='',$str1='',$hierarchical = true) {

	$slug = slugify($str);
	$slug_tx = slugify($str1);
	
	$labels = [ "name" => __($str1, "itees" ), "singular_name" => __($str1, "itees" ), ];
	$args = [
		"label" => __($str1, "itees" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => $hierarchical,
		"show_ui" => true,
		'supports' => array( 'thumbnail' ),
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => $slug_tx, 'with_front' => true,  'hierarchical' => $hierarchical, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => $slug_tx,
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( $slug_tx, [$slug], $args );
}

function register_taxonomy_px() {
	register_taxonomy_it('Projects',"Region",true);
	register_taxonomy_it('Projects',"Country",true);
	register_taxonomy_it('Projects',"Category Project",true);
}
add_action( 'init', 'register_taxonomy_px' );

/*Custom layout project-list admin*/
function mk_edit_projects_columns( $columns ) {
	$custom_columns = array(
		
		'region' => 'Region',
		'country' => 'Country',
		'category' => 'Category',
		'thumbnail' => 'Thumbnail',
	);
	return array_merge( $columns, $custom_columns );
}
add_filter( 'manage_projects_posts_columns', 'mk_edit_projects_columns' );

function mk_manage_projects_columns( $column ) {
	global $post;
	$categories = wp_get_post_categories( $post->ID );
	if ( $post->post_type == 'projects' ) {
		switch ( $column ) {
			case 'category':
				if(!empty(get_the_terms( $post->ID , 'category-project' ))){ echo join(', ', wp_list_pluck(get_the_terms( $post->ID , 'category-project' ), 'name')); };
				break;
			case 'region':
				//echo the_excerpt();
				if(!empty(get_the_terms( $post->ID , 'region' ))){ echo  join(', ', wp_list_pluck(get_the_terms( $post->ID , 'region' ), 'name')); };
				break;
			case 'country':
				//echo the_excerpt();
				if(!empty(get_the_terms( $post->ID , 'country' ))){ echo  join(', ', wp_list_pluck(get_the_terms( $post->ID , 'country' ), 'name')); };
				break;
			case 'thumbnail':
				echo the_post_thumbnail( 'thumbnail' );
				break;
		}
	}
}
add_action( 'manage_posts_custom_column', 'mk_manage_projects_columns', 10, 2 );
 
/*Dang add - End*/

function misha_my_load_more_scripts() {

	global $wp_query; 

	wp_enqueue_script('jquery');

	wp_register_script( 'my_loadmore', get_template_directory_uri() . '/assets/js/myloadmore.js', array('jquery') );

	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(

		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX

		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,

		'max_page' => $wp_query->max_num_pages,

	) );

	wp_enqueue_script( 'my_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );

function misha_loadmore_ajax_handler(){

	$args = json_decode( stripslashes( $_POST['query'] ), true );

	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded

	$args['post_status'] = 'publish';

	$args['posts_per_page'] = 6;

	$args['post_type'] = 'highlights';

	$args['orderby'] = 'date';

	$args['order'] = 'DESC';

	$wp_query = new WP_Query( $args );

	if( $wp_query->have_posts() ) :

		while( $wp_query->have_posts() ): $wp_query->the_post(); 

			$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>

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

			</div>

		<?php endwhile;

	endif; wp_reset_postdata();

	die;
} 

add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler');

add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler');

// 

function projectloadmore_scripts() {

	global $wp_query; 

	wp_enqueue_script('jquery');

	wp_register_script( 'projectloadmore', get_template_directory_uri() . '/assets/js/projectloadmore.js', array('jquery') );

	wp_localize_script( 'projectloadmore', 'project_loadmore_params', array(

		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX

		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,

		'max_page' => $wp_query->max_num_pages,

	) );

	wp_enqueue_script( 'projectloadmore' );
}

add_action( 'wp_enqueue_scripts', 'projectloadmore_scripts' );

function projectloadmore_ajax_handler(){

	$args = json_decode( stripslashes( $_POST['query'] ), true );

	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded

	$args['post_status'] = 'publish';

	$args['posts_per_page'] = 6;

	$args['post_type'] = 'projects';

	$args['orderby'] = 'date';

	$args['order'] = 'DESC';

	$wp_query = new WP_Query( $args );

	if( $wp_query->have_posts() ) :

		while( $wp_query->have_posts() ): $wp_query->the_post(); 

			$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'full' );
			$terms = get_the_terms(get_the_ID(),'category-project' );  ?>

			<div class="col-xl-4 col-lg-4 col-sm-6 mb-sm-5 mb-4">
				<div class="item mb-sm-0 mb-3">
					<a href="<?php the_permalink(); ?>" class="d-block">
						<div class="img k-relative">
							<div class="bg" style="background-image: url(<?php echo $srcImage; ?>); background-size: cover; background-position: center;"></div>
							<img src="<?php echo $srcImage; ?>" alt="" class="w-100 fade" height="170px">
						</div>
						<div class="info">
							<div class="size-18 k-wei-600 mb-2">
								<span><?php echo get_field('location');?></span>
							</div>
							<div class="title mb-4"><strong><?php the_title();?></strong></div>
							<div class="cat size-18 k-wei-600">

								<?php foreach ($terms as $value) {
									echo '<u>'.$value->name.'</u><span> • </span>';
								} ?>
							</div>									
						</div>
					</a>								
				</div>
			</div>

		<?php endwhile;

	endif; wp_reset_postdata();

	die;
} 

add_action('wp_ajax_projectloadmore', 'projectloadmore_ajax_handler');

add_action('wp_ajax_nopriv_projectloadmore', 'projectloadmore_ajax_handler');
// 

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(

		'page_title'    => 'ITEES options',

		'menu_title'    => 'ITEES options',

		'menu_slug'     => 'theme-settings',

		'capability'    => 'edit_posts',

		'redirect'  => false

	));
}

add_action( 'wp_ajax_nopriv_loadmore_project', 'prefix_load_posts' );
add_action( 'wp_ajax_loadmore_project', 'prefix_load_posts' );
function prefix_load_posts () {
	$offset = !empty($_POST['offset']) ? intval( $_POST['offset'] ) : '';
    if ($offset) {
			$the_query = new WP_Query(
				$args = array( 'post_type' => 'projects',
					   's' => '',
						'post_status' => 'publish',
						'posts_per_page' =>  '3',
						'sort_column' => 'menu_order',
						'order' => 'ASC',
						'ignore_sticky_posts' => true,
						'offset' => $offset
					)
			);
        if ( $the_query->have_posts() ) : ?>  
                <?php while ( $the_query->have_posts() ) : $the_query->the_post();
				$srcImage = get_the_post_thumbnail_url( get_the_ID(), 'full' ); 
				$terms = get_the_terms(get_the_ID(),'category-project' );?>					
					<div class="col-xl-4 col-lg-4 col-sm-6 mb-sm-5 mb-4">
						<div class="item mb-sm-0 mb-3">
							<a href="<?php the_permalink(); ?>" class="d-block">
								<div class="img k-relative">
									<div class="bg" style="background-image: url(<?php echo $srcImage; ?>); background-size: cover; "></div>
									<img src="<?php echo $srcImage; ?>" alt="" class="w-100 fade">
								</div>
								<div class="info">
									<div class="size-18 k-wei-600 mb-2">
										<span><?php echo get_field('location');?></span>
									</div>
									<div class="title mb-4"><strong><?php the_title();?></strong></div>
									<div class="cat size-18 k-wei-600">

										<?php foreach ($terms as $value) {
											echo '<u>'.$value->name.'</u><span> • </span>';
										} ?>
									</div>									
								</div>
							</a>								
						</div>
					</div>
                <?php endwhile; ?>	
              <?php
        else:
            echo 'end';
        endif;
        wp_reset_postdata();
    }
    die();
}
