<?php 
function get_user_liked_products() {
    $liked_products = []; // Array to hold liked product details

    if (is_user_logged_in()) {
        $current_user_id = get_current_user_id();

        $liked_posts_query = new WP_Query(array(
            'author' => $current_user_id,
            'post_type' => 'like',
            'meta_query' => array(
                array(
                    'key' => 'liked_professor_id', // Adjust to match your meta key for products
                    'compare' => 'EXISTS'
                )
            )
        ));

        if ($liked_posts_query->have_posts()) {
            while ($liked_posts_query->have_posts()) {
                $liked_posts_query->the_post();

                $product_id = get_post_meta(get_the_ID(), 'liked_professor_id', true); // Get product ID
                if ($product_id) {
                    $product = wc_get_product($product_id); // Get WooCommerce product object
                    if ($product) {
                        // Get product categories
                        $categories = [];
                        $terms = get_the_terms($product_id, 'product_cat');
                        if ($terms && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                $categories[] = [
                                    'name' => $term->name,
                                    'link' => get_term_link($term->term_id, 'product_cat')
                                ];
                            }
                        }

                        $liked_products[] = [
                            'title' => $product->get_name(), // Product title
                            'image' => wp_get_attachment_url($product->get_image_id()), // Product image URL
                            'link' => get_permalink($product_id), // Product link
                            'price' => $product->get_price_html(), // Formatted product price
                            'categories' => $categories, // Array of categories with links
                        ];
                    }
                }
            }
            wp_reset_postdata();
        }
    }

    return $liked_products;
}
