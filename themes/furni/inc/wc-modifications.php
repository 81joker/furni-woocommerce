<?php

/**
 * Template Overrides for WooCommerce pages
 *
 * @link https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/#section-3
 *
 * @package Fancy Lab
 */

add_action('wp', 'fancy_lab_wc_modify');

if (! function_exists('fancy_lab_wc_modify')) :
	function fancy_lab_wc_modify()
	{
		/********* St Rmove the products columns-1 before col products ********/
		add_filter('woocommerce_product_loop_start', 'custom_woocommerce_product_loop_start');
		add_filter('woocommerce_product_loop_end', 'custom_woocommerce_product_loop_end');

		function custom_woocommerce_product_loop_start($start)
		{
			// Replace the default <ul> wrapper with a custom one, or remove it entirely.
			return ''; // Return empty to remove the <ul>.
		}
		function custom_woocommerce_product_loop_end($end)
		{
			// Replace the closing </ul> tag or remove it entirely.
			return ''; // Return empty to remove the </ul>.
		}
		/********* En Rmove the products columns-1 before col products ********/


		remove_action( 'woocommerce_after_single_product_summary' ,'woocommerce_output_related_products' ,20);
		add_action( 'woocommerce_after_single_product_summary', 'my_custom_related_products', 20 );

		function my_custom_related_products() {
			global $product;
		
			$related = wc_get_related_products( $product->get_id(), 4 );
		
			if ( sizeof( $related ) === 0 ) return;
		
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => 4,
				'post__in' => $related,
				'post_status' => 'publish',
				'orderby' => 'rand'
			);
		
			$related_query = new WP_Query( $args );
		
			if ( $related_query->have_posts() ) {
				echo '<div class="untree_co-section related products pt-5"><div class="container"><h2 class="pb-4">' . __( 'Related products', 'woocommerce' ) . '</h2>';
				echo '<div class="row">';
				while ( $related_query->have_posts() ) {
					$related_query->the_post();
					wc_get_template_part( 'content', 'product' );
				}
				echo '</div></div></div>';
				wp_reset_postdata();
			}
		}
		
	// cart page
	
	// remove_action('woocommerce_before_cart' , 'woocommerce_cross_sell_display');

// 	add_filter( 'woocommerce_locate_template', 'custom_override_woocommerce_template', 10, 3 );
// function custom_override_woocommerce_template( $template, $template_name, $template_path ) {
//     $basename = basename( $template );

//     // Check if we're trying to load the cart template
//     if ( 'cart.php' === $basename ) {
//         // Return the path to your custom template
//         return get_stylesheet_directory() . '/woocommerce/cart/cart.php';
//     }

//     return $template;
// }
// add_filter( 'woocommerce_locate_template', 'override_woocommerce_template', 10, 3 );
// function override_woocommerce_template( $template, $template_name, $template_path ) {
//     $basename = basename( $template );

//     // Check if we're trying to load the cart template
//     if ( 'cart.php' === $basename ) {
//         // Return the path to your custom template
//         return get_stylesheet_directory() . '/woocommerce/cart/cart.php';
//     }

//     return $template;
// }


		// add_action( 'woocommerce_before_main_content', 'furni_open_container_row' ,5 );
		// function furni_open_container_row() {
		// 	echo '
		// 	<div class="untree_co-section product-section before-footer-section">
		// 	  <div class="container bg-info">
		// 	      <div class="row">';
		// }
		// add_action( 'woocommerce_after_main_content', 'furni_close_container_row' ,5 );
		// function furni_close_container_row() {
		// 	echo '</div></div></div>';
		// }

		remove_action('woocommerce_sidebar' , 'woocommerce_get_sidebar');
	
		}
	endif;
