<?php
	// Register custom navigation walker
    require_once('wp-bootstrap-navwalker.php');	
	 // Load Theme CSS 
	function theme_styles()  
	{ 	

	 // Load all of the styles that need to appear on all pages
	 wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	 wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	 wp_enqueue_style( 'font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' );
	 wp_enqueue_style( 'whisq', get_template_directory_uri() . '/css/whisq.css' );	

	}
	add_action('wp_enqueue_scripts', 'theme_styles');
	
	
	function add_my_script() {
		wp_enqueue_script('jquery.min', get_template_directory_uri() . '/js/jquery.min.js', array('jquery') );
		wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery') );
		wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery') );
		wp_enqueue_script('bootstrap.bundle', get_template_directory_uri() . '/js/bootstrap.bundle.js', array('jquery') );		
		
	}
	add_action( 'wp_enqueue_scripts', 'add_my_script' );
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	add_theme_support( 'post-thumbnails' );
	
	add_action( 'after_setup_theme', 'wp_whisq' );
    if ( ! function_exists( 'wp_whisq' ) ):
        function wp_whisq() {  
            register_nav_menu( 'primary', __( 'Primary navigation', 'whisq' ) );
        } endif;
?>