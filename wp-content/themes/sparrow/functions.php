<?php

add_action('wp_head', 'style_theme');
add_action('wp_footer', 'scripts_theme');
add_action('init', 'register_post_types');
add_action('after_setup_theme', 'theme_register_nav_menu');
add_action( 'widgets_init', 'register_my_widgets');
add_action( 'after_setup_theme', 'some_functions');




function style_theme() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default.css');
    wp_enqueue_style( 'layout', get_template_directory_uri() . '/assets/css/layout.css');
    wp_enqueue_style( 'media-queries', get_template_directory_uri() . '/assets/css/media-queries.css');
}

function scripts_theme() {

	wp_deregister_script('jquery-core');
	wp_deregister_script('jquery');
	wp_register_script( 'jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, null, true );
	wp_register_script( 'jquery', false, array('jquery-core'), null, true );
	wp_enqueue_script( 'jquery' );
	
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', ['jquery'], null, true);
    wp_enqueue_script('doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js', ['jquery'], null, true);
    wp_enqueue_script('init', get_template_directory_uri() . '/assets/js/init.js', ['jquery'], null, true);
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array(), null, false);
}

function theme_register_nav_menu() {
    register_nav_menus( [
		'header_menu' => 'Меню в шапке',
		'footer_menu' => 'Меню в подвале'
	]);
}

function register_my_widgets(){
    register_sidebar( array(
        'name'          => 'sidebar',
        'id'            => "sidebar",
        'description'   => 'desription',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => "</h5>\n"
    ));
}

function some_functions() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails', array('post', 'portfolio') );
    add_theme_support( 'post-formats', array('video', 'aside'));
    add_image_size('post_thumb', 1300, 500, true);
    add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
}

function my_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}


function register_post_types(){
	register_post_type('portfolio', array(
		'labels'             => array(
			'name'               => 'Portfolio', // Основное название типа записи
			'singular_name'      => 'Portfolio-work', // отдельное название записи типа Book
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new portfolio-work',
			'edit_item'          => 'Edit work',
			'new_item'           => 'New work',
			'view_item'          => 'View work',
			'search_items'       => 'Search work',
			'not_found'          => 'Work not found',
			'not_found_in_trash' => 'not_found_in_trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Portfolio',
			'exclude_from_search' => false

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'menu_icon'			 => 'dashicons-format-gallery',
		'supports'           => array('title','editor','thumbnail','excerpt'),
		'taxonomies'		 => array('skills'),
		'exclude_from_search' => false
	) );
}

function new_excerpt_length($length) {
	if (get_post_type() == 'portfolio') {
		return 40;
	} else {
		return 55;
	}

}
add_filter('excerpt_length', 'new_excerpt_length');

add_filter('excerpt_more', function($more) {
	return '...';
});


// register_taxonomy
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'skills', [ 'portfolio' ], [ 
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Skills',
			'singular_name'     => 'Skill',
			'search_items'      => 'Search Skill',
			'all_items'         => 'All Skill',
			'view_item '        => 'View Skill',
			'parent_item'       => 'Parent Skill',
			'parent_item_colon' => 'Parent Skill:',
			'edit_item'         => 'Edit Skill',
			'update_item'       => 'Update Skill',
			'add_new_item'      => 'Add New Skill',
			'new_item_name'     => 'New Genre Skill',
			'menu_name'         => 'Skills',
		],
		'description'           => 'skills that were used at work', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => false,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}
