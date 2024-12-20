<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>

<div <?php wc_product_class( 'col-12 col-md-4 col-lg-3 mb-5', $product ); ?>>
    <a class="product-item" href="<?php the_permalink(); ?>">
        <?php
        if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'woocommerce_thumbnail', array( 'class' => 'img-fluid product-thumbnail' ) );
        }
        ?>
        <h3 class="product-title"><?php the_title(); ?></h3>
        <strong class="product-price"><?php echo $product->get_price_html(); ?></strong>

        <span class="icon-cross">
            <img src="<?php echo get_template_directory_uri(); ?>/images/cross.svg" class="img-fluid">
        </span>
    </a>
</div>
