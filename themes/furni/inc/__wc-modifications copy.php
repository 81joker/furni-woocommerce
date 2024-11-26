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


		/** 
		 * Modify WooCommerce opening and closing HTML tags
		 * We need Bootstrap-like opening/closing HTML tags
		 */
		// add_action('woocommerce_before_main_content', 'fancy_lab_open_container_row', 5);
		// function fancy_lab_open_container_row()
		// {
?>
			<!-- <div class="container shop-content bg-secondary nehad">
				<div class="row"> -->
				<?php
			// }
			// add_action('woocommerce_after_main_content', 'fancy_lab_close_container_row', 5);
			// function fancy_lab_close_container_row()
			// {
			// 	?>
			// 	</div>
			// </div>
			<?php
			// }

			/** 
			 * Remove the main WC sidebar from its original position
			 * We'll be including it somewhere else later on
			 */
			remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');


			// WooCommerce main sidebar will display only on Shop pages
			/*
		if( is_shop() ){
			
			add_action( 'woocommerce_before_main_content', 'fancy_lab_add_sidebar_tags', 6 );
			function fancy_lab_add_sidebar_tags(){
				?>
					<div class="sidebar-shop col-lg-3 col-md-4 order-2 order-md-1">
				<?php
			}
			// Put the main WC sidebar back, but using other action hook and on a different position
			add_action( 'woocommerce_before_main_content', 'woocommerce_get_sidebar', 7 ); 

			add_action( 'woocommerce_before_main_content', 'fancy_lab_close_sidebar_tags', 8 );
			function fancy_lab_close_sidebar_tags(){
				?>
					</div>
				<?php
			}	
	
		}
		*/

			// Include product description in every page which displays products, except for the frontpage
			if (! is_front_page()) {
				add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt', 1);
			}

			// Modify HTML tags on a shop page. We also want Bootstrap-like markup here (.primary div)
			add_action('woocommerce_before_main_content', 'fancy_lab_add_shop_tags', 9);
			function fancy_lab_add_shop_tags()
			{
				if (is_shop()) {
			?>
				<div class="main-content col-lg-9 col-md-8 order-1 order-md-2">
				<?php
				} else {
				?>
					<div class="col">
					<?php
				}
			}
			add_action('woocommerce_after_main_content', 'fancy_lab_close_shop_tags', 4);
			function fancy_lab_close_shop_tags()
			{
					?>
					</div>
		<?php
			}
		}
	endif;
