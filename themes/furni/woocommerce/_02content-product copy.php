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
  <?php
    $existStatus = 'no';
     $likeAutor = new WP_Query(array(
      'post_type' => 'like',
  ));
  $login_authors = [];
  if ($likeAutor->have_posts()) {
    while ($likeAutor->have_posts()) {
        $likeAutor->the_post();
         $login_authors[] = $likeAutor->post->post_author; 
    }
    wp_reset_postdata();

}

$likeCount = new WP_Query(array(
  'post_type' => 'like',
  'meta_query' => array(
    array(
      'key' => 'liked_professor_id',
      'compare' => '=',
      'value' => get_the_ID()
    )
  )
));
// foreach ($login_authors as $login) {
// }
// if(in_array(get_current_user_id() ,$login_authors )){
//   echo get_current_user_id();
// }

if (is_user_logged_in()) {
  foreach($login_authors as $login){
  if (get_current_user_id() == $login) {  
  // if(in_array(get_current_user_id() ,$login_authors )){
  $existQuery = new WP_Query(array(
    'author' => get_current_user_id(),
    'post_type' => 'like',
    'meta_query' => array(
      array(
        'key' => 'liked_professor_id',
        'compare' => '=',
        'value' => get_the_ID()
      )
    )
  ));
// var_dump($existQuery->found_posts);
  if ($existQuery->found_posts) {
    $existStatus = 'yes';
  }         

} }
}
  // $post_author_id = get_post_field('post_author',get_the_ID());

  // echo "<pre>";
  // var_dump($likeAutor);
  // echo "</pre>";
?>
<div <?php wc_product_class( 'col-12 col-md-4 col-lg-3 mb-5', $product ); ?>>
    <!-- St Lieke -->
    <span class="like-box" data-like="<?php echo $existQuery->posts[0]->ID; ?>" data-professor="<?php the_ID(); ?>" data-exists="<?php echo $existStatus; ?>">
                <i class="fa fa-heart-o" aria-hidden="true"></i>
                <i class="fa fa-heart" aria-hidden="true"></i>
                <span class="like-count"><?php echo $likeCount->found_posts; ?></span>
              </span>
    <!-- En Lieke -->
     <br><br>
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
