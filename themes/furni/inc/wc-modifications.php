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


	
		}
	endif;
