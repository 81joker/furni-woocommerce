<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 1.6.4
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

?>
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            <?php
            while ( have_posts() ) :
                the_post();
                global $product;
            ?>
            <div class="col-12 col-md-8 col-lg-6 mb-5">
                <div class="product-item">
                    <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'woocommerce_single', array( 'class' => 'img-fluid product-thumbnail' ) );
                    }
                    ?>
                    <h3 class="product-title"><?php the_title(); ?></h3>
                    <strong class="product-price"><?php echo $product->get_price_html(); ?></strong>

                    <span class="icon-cross">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/cross.svg" class="img-fluid">
                    </span>

                    <?php
                    /**
                     * Hook: woocommerce_single_product_summary.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     * @hooked WC_Structured_Data::generate_product_data() - 60
                     */
                    do_action( 'woocommerce_single_product_summary' );
                    ?>
                </div>
            </div>
            <?php endwhile; // end of the loop. ?>
        </div>
    </div>
</div>
<?php
get_footer( 'shop' );
?>
