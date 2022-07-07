<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}

if ( ! class_exists( 'Custom_installer' ) ) :

class Custom_installer {

	function __construct() {
		add_action( 'init', array( $this, 'realty_init' ) );
	}

	function realty_init() {

		/* ----------------------------------------------------- */
		/* Property Pages */
		/* ----------------------------------------------------- */

		$labels = array(
			'name' =>  esc_html__('Property', 'twentysixteen'),
			'singular_name' => esc_html__('Property', 'twentysixteen'),
			'add_new' => esc_html__('Add New', 'twentysixteen'),
			'add_new_item' =>  esc_html__('Add New Item', 'twentysixteen'),
			'edit_item' =>  esc_html__('Edit Item', 'twentysixteen'),
			'new_item' =>  esc_html__('New Item', 'twentysixteen'),
			'view_item' =>  esc_html__('View Item', 'twentysixteen'),
			'search_items' =>  esc_html__('Search Portfolio', 'twentysixteen'),
			'not_found' =>  esc_html__('No Property found', 'twentysixteen'),
			'not_found_in_trash' =>  esc_html__('No Items found in Trash', 'twentysixteen'),
			'parent_item_colon' =>  esc_html__('Parent Item:', 'twentysixteen'),
			'menu_name' =>  esc_html__('Property', 'twentysixteen')
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'description' => esc_html__('Display your Property by filters', 'twentysixteen'),
			'supports' => array( 'title', 'editor', 'excerpt', 'revisions', 'thumbnail' ),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_icon' => 'dashicons-images-alt2',
			'show_in_nav_menus' => true,
			'show_in_rest' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => array( 'slug' => 'property'),
			'capability_type' => 'post'
		);

		register_post_type( 'property', $args );

		/* ----------------------------------------------------- */
		/* Types Taxonomy */
		/* ----------------------------------------------------- */

		$labels = array(
			'name' =>  esc_html__('Type', 'twentysixteen'),
			'singular_name' =>  esc_html__('Type', 'twentysixteen'),
			'search_items' =>  esc_html__('Search Types', 'twentysixteen'),
			'popular_items' =>  esc_html__('Popular Types', 'twentysixteen'),
			'all_items' =>  esc_html__('All Types', 'twentysixteen'),
			'parent_item' =>  esc_html__('Parent Type', 'twentysixteen'),
			'parent_item_colon' =>  esc_html__('Parent Type:', 'twentysixteen'),
			'edit_item' =>  esc_html__('Edit Type', 'twentysixteen'),
			'update_item' =>  esc_html__('Update Type', 'twentysixteen'),
			'add_new_item' =>  esc_html__('Add New Type', 'twentysixteen'),
			'new_item_name' =>  esc_html__('New Type', 'twentysixteen'),
			'separate_items_with_commas' =>  esc_html__('Separate Type with commas', 'twentysixteen'),
			'add_or_remove_items' =>  esc_html__('Add or remove Type', 'twentysixteen'),
			'choose_from_most_used' =>  esc_html__('Choose from the most used Types', 'twentysixteen'),
			'menu_name' =>  esc_html__('Types', 'twentysixteen')
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true,
			'rewrite' => true,
			'query_var' => true
		);

		register_taxonomy( 'filters', array('property'), $args );

	}
	
}

new Custom_installer();

endif;

/* ----------------------------------------------------- */
/* Theme ACF Options */
/* ----------------------------------------------------- */

// require get_theme_file_uri( '/includes/custom_fields.php' );

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_62c543517bea0',
	'title' => 'Property Info',
	'fields' => array(
		array(
			'key' => 'field_62c54386f135f',
			'label' => 'Area',
			'name' => 'property_area',
			'type' => 'number',
			'instructions' => 'Кв. м.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_62c5445af1360',
			'label' => 'Price',
			'name' => 'property_price',
			'type' => 'number',
			'instructions' => 'Руб.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_62c54476f1361',
			'label' => 'Floor',
			'name' => 'property_floor',
			'type' => 'number',
			'instructions' => 'Номер',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_62c5461184a6b',
			'label' => 'Photos',
			'name' => 'property_photos',
			'type' => 'gallery',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'insert' => 'append',
			'library' => 'all',
			'min' => '',
			'max' => '',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'property',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

acf_add_local_field_group(array(
	'key' => 'group_62c5aaf24dc1a',
	'title' => 'Property Page',
	'fields' => array(
		array(
			'key' => 'field_62c5ab1a2897c',
			'label' => 'Content Position',
			'name' => 'property_content_position',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_62c5ab3f2897d',
					'label' => 'Title',
					'name' => 'section_title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_62c5ab632897e',
					'label' => 'Property Type',
					'name' => 'property_type',
					'type' => 'taxonomy',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'taxonomy' => 'filters',
					'field_type' => 'select',
					'allow_null' => 0,
					'add_term' => 1,
					'save_terms' => 0,
					'load_terms' => 0,
					'return_format' => 'id',
					'multiple' => 0,
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'templates/property-3-rows.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

endif;		

add_filter('acf/settings/show_admin', '__return_false');
add_filter('acf/settings/show_updates', '__return_false');

/* ----------------------------------------------------- */
/* Theme Styles and Scripts */
/* ----------------------------------------------------- */

function custom_scripts() {
    wp_enqueue_script( 'jquery-fancybox', get_theme_file_uri( '/assets/js/fancybox.js' ), array( 'jquery' ), false, true );
    wp_enqueue_script( 'custom_js', get_theme_file_uri( '/assets/js/custom.js' ), array( 'jquery' ), false, true );
    
    wp_enqueue_style( 'css-bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) );
    wp_enqueue_style( 'css-fancybox', get_theme_file_uri( '/assets/css/fancybox.min.css' ) );
}

add_action( 'wp_enqueue_scripts', 'custom_scripts' );

