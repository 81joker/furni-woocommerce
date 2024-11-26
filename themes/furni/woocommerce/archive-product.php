<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

do_action('woocommerce_before_main_content');

?>

<div class="untree_co-section product-section">
    <div class="container">
        <div class="row">

            <?php if (woocommerce_product_loop()) : ?>

                <?php
                woocommerce_product_loop_start();

                if (wc_get_loop_prop('total')) {
                    while (have_posts()) {
                        the_post();

                        /**
                         * Hook: woocommerce_shop_loop.
                         */
                        do_action('woocommerce_shop_loop');

                        wc_get_template_part('content', 'product');
                    }
                }

                woocommerce_product_loop_end();
                ?>

            <?php else : ?>

                <?php
                /**
                 * Hook: woocommerce_no_products_found.
                 */
                do_action('woocommerce_no_products_found');
                ?>

            <?php endif; ?>

        </div>
            <?php
/**
* Hook: woocommerce_after_shop_loop.
*
* @hooked woocommerce_pagination - 10
*/
do_action('woocommerce_after_shop_loop');

?>
    </div>
</div>


<?php
do_action('woocommerce_after_main_content');
get_footer('shop');
