<?php

require get_template_directory() . '/inc/wc-modifications.php';
require get_template_directory() . '/inc/widgets.php';
// <link href="css/bootstrap.min.css" rel="stylesheet">
// <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
// <link href="css/tiny-slider.css" rel="stylesheet">
// <link href="css/style.css" rel="stylesheet">



// <script src="js/bootstrap.bundle.min.js"></script>
// <script src="js/tiny-slider.js"></script>
// <script src="js/custom.js"></script>
function furni_load_scripts(){

    wp_enqueue_style('furni-bootstrap', get_stylesheet_directory_uri() . "/css/bootstrap.min.css", null, 'all');
    wp_enqueue_style('furni-tiny-slider', get_stylesheet_directory_uri() . "/css/tiny-slider.css", null, 'all');
    wp_enqueue_style('furni-style', get_stylesheet_directory_uri() . "/css/style.css", null, 'all');
    wp_enqueue_style('furni-woocommerce', get_stylesheet_directory_uri() . "/css/woocommerce.css", null, 'all');

    wp_enqueue_script("furni-bootstrap-js", get_stylesheet_directory_uri() . "/js/bootstrap.bundle.min.js", ["jquery"], null, true);
    wp_enqueue_script("furni-tiny-slider-js", get_stylesheet_directory_uri() . "/js/tiny-slider.js", ["jquery"], null, true);
    wp_enqueue_script("furni-custom-js", get_stylesheet_directory_uri() . "/js/custom.js", ["jquery"], null, true);
    // wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap', array(), null );
    // wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/js/dropdown.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'furni_load_scripts' );

function furni_config(){

//     $textdomain = 'wp-devs';
//     load_theme_textdomain( $textdomain, get_template_directory() . '/languages/' );
//     register_nav_menus(
//         array(
//             'wp_devs_main_menu' => esc_html__( 'Main Menu', 'wp-devs' ),
//             'wp_devs_footer_menu' => esc_html__( 'Footer Menu', 'wp-devs' )
//         )
//     );

//     $args = array(
//         'height'    => 225,
//         'width'     => 1920
//     );
//     add_theme_support( 'custom-header', $args );
    add_theme_support( 'post-thumbnails' );
//     add_theme_support( 'custom-logo', array(
//         'width' => 200,
//         'height'    => 110,
//         'flex-height'   => true,
//         'flex-width'    => true
//     ) );
//     add_theme_support( 'automatic-feed-links' );
//     add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ));
//     add_theme_support( 'title-tag' );

//     //add_theme_support( 'align-wide' );
//     add_theme_support( 'responsive-embeds' );
//     add_theme_support( 'editor-styles' );
//     add_editor_style( 'style-editor.css' );
//     add_theme_support( 'wp-block-styles' );
//     // add_theme_support( 'editor-color-palette', array(
//     //     array(
//     //         'name'  => __( 'Primary', 'wp-devs' ),
//     //         'slug'  => 'primary',
//     //         'color' => '#001E32'
//     //     ),
//     //     array(
//     //         'name'  => __( 'Secondary', 'wp-devs' ),
//     //         'slug'  => 'secondary',
//     //         'color' => '#CFAF07'
//     //     )
//     // ) );
//     // add_theme_support( 'disable-custom-colors' );
}
add_action( 'after_setup_theme', 'furni_config', 0 );

// function furni_register_block_styles(){
//     wp_register_style( 'furni-block-style', get_template_directory_uri() . '/block-style.css' );
//     register_block_style(
//         'core/quote',
//         array(
//             'name'  => 'red-quote',
//             'label' => 'Red Quote',
//             'is_default'    => true,
//             //'inline_style'  => '.wp-block-quote.is-style-red-quote { border-left: 7px solid #ff0000; background: #f9f3f3; padding: 10px 20px; }',
//             'style_handle' => 'furni-block-style'
//         )
//     );
// }
// add_action( 'init', 'furni_register_block_styles' );

// add_action( 'widgets_init', 'furni_sidebars' );
// function furni_sidebars(){
//     register_sidebar(
//         array(
//             'name'  => esc_html__( 'Blog Sidebar', 'wp-devs' ),
//             'id'    => 'sidebar-blog',
//             'description'   => esc_html__( 'This is the Blog Sidebar. You can add your widgets here.', 'wp-devs' ),
//             'before_widget' => '<div class="widget-wrapper">',
//             'after_widget'  => '</div>',
//             'before_title'  => '<h4 class="widget-title">',
//             'after_title'   => '</h4>'
//         )
//     );
//     register_sidebar(
//         array(
//             'name'  => esc_html__( 'Service 1', 'wp-devs' ),
//             'id'    => 'services-1',
//             'description'   => esc_html__( 'First Service Area', 'wp-devs' ),
//             'before_widget' => '<div class="widget-wrapper">',
//             'after_widget'  => '</div>',
//             'before_title'  => '<h4 class="widget-title">',
//             'after_title'   => '</h4>'
//         )
//     );
//     register_sidebar(
//         array(
//             'name'  => esc_html__( 'Service 2', 'wp-devs' ),
//             'id'    => 'services-2',
//             'description'   => esc_html__( 'Second Service Area', 'wp-devs' ),
//             'before_widget' => '<div class="widget-wrapper">',
//             'after_widget'  => '</div>',
//             'before_title'  => '<h4 class="widget-title">',
//             'after_title'   => '</h4>'
//         )
//     );
//     register_sidebar(
//         array(
//             'name'  => esc_html__( 'Service 3', 'wp-devs' ),
//             'id'    => 'services-3',
//             'description'   => esc_html__( 'Third Service Area', 'wp-devs' ),
//             'before_widget' => '<div class="widget-wrapper">',
//             'after_widget'  => '</div>',
//             'before_title'  => '<h4 class="widget-title">',
//             'after_title'   => '</h4>'
//         )
//     );
// }

if ( ! function_exists( 'wp_body_open' ) ){
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// This theme is WooCommerce compatible, so we're adding support to WooCommerce
		add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 255,
			'single_image_width'    => 255,
	        'product_grid'          => array(
	            'default_rows'    => 4,
	            'min_rows'        => 4,
	            'max_rows'        => 4,
	            'default_columns' => 1,
	            'min_columns'     => 1,
	            'max_columns'     => 4,
	        ),
		) );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

// add_filter('woocommerce_get_price_html', 'custom_price_format', 10, 2);
// function custom_price_format($price, $product) {
//     return '<span class="product-price bg-danger">' . $price . '</span>';
// }
// add_filter('woocommerce_get_part', 'custom_part_format', 10, 2);
// function custom_part_format($price, $product) {
//     return '<span class="product-price bg-danger">' . $price . '</span>';
// }

