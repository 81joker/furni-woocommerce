<?php
echo "Custom cart template is being used.";
// Rest of your custom cart template code...
function custom_checkout_redirect() {
    global $wp;
    
    if (is_checkout() && !is_wc_endpoint_url('order-received')) {
        $product_id = 123; // Replace with the product ID you want to customize for.
        $product_in_cart = false;

        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            if ($cart_item['product_id'] === $product_id) {
                $product_in_cart = true;
                break;
            }
        }

        if (!$product_in_cart) {
            wp_safe_redirect(home_url());
        }
    }
}

add_action('template_redirect', 'custom_checkout_redirect');