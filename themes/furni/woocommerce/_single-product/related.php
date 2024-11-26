<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.9.0
 */

defined( 'ABSPATH' ) || exit;

if ( $related_products ) : ?>

<section class="untree_co-section related products">

    <div class="container">
        <h2><?php esc_html_e( 'Related products Nehad', 'woocommerce' ); ?></h2>

        <?php woocommerce_product_loop_start(); ?>

        <div class="row">
            <?php foreach ( $related_products as $related_product ) : ?>

                <?php
                $post_object = get_post( $related_product->get_id() );
                setup_postdata( $GLOBALS['post'] =& $post_object );
                ?>

                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <?php wc_get_template_part( 'content', 'product' ); ?>
                </div>

            <?php endforeach; ?>
        </div>

        <?php woocommerce_product_loop_end(); ?>
    </div>

</section>

<?php
endif;

wp_reset_postdata();
