<?php
/**
 * Plugin Name: Why Choose Us Block
 * Description: A custom Gutenberg block to create a "Why Choose Us" section.
 * Version: 1.0.0
 * Author: Nehad Altimimi
 */

function why_choose_us_block() {
    // Enqueue the block's JavaScript file
    wp_register_script(
        'why-choose-us-block',
        plugins_url('build/index.js', __FILE__),
        array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n'),
        filemtime(plugin_dir_path(__FILE__) . 'build/index.js')
    );

    wp_localize_script('why-choose-us-block', 'pluginUrl', array(
        'url' => plugins_url('why-choose-us/')
    ));

    register_block_type('why-choose-us/why-choose-us', array(
        'editor_script' => 'why-choose-us-block',
    ));
}

add_action('init', 'why_choose_us_block');
