<?php 

/**
 * Manage WooCommerce styles and scripts.
 */
add_action('wp_enqueue_scripts', function () {
    // Remove WooCommerce Gutenberg block-styles
    wp_dequeue_style('wc-block-style');
    // Remove the generator tag
    // remove_action('wp_head', array( $GLOBALS['woocommerce'], 'generator'));
    // wp_dequeue_style('woocommerce_frontend_styles');
    // wp_dequeue_style('woocommerce-general');
    // wp_dequeue_style('woocommerce-layout');
    // wp_dequeue_style('woocommerce-smallscreen');
    // wp_dequeue_style('woocommerce_fancybox_styles');
    // wp_dequeue_style('woocommerce_chosen_styles');
    // wp_dequeue_style('woocommerce_prettyPhoto_css');
    // wp_deregister_script('selectWoo');
    // wp_dequeue_script('wc-add-payment-method');
    // wp_dequeue_script('wc-lost-password');
    // wp_dequeue_script('wc_price_slider');
    // wp_dequeue_script('wc-single-product');
    // wp_dequeue_script('wc-add-to-cart');
    // wp_dequeue_script('wc-cart-fragments');
    // wp_dequeue_script('wc-credit-card-form');
    // wp_dequeue_script('wc-checkout');
    // wp_dequeue_script('wc-add-to-cart-variation');
    // wp_dequeue_script('wc-cart');
    // wp_dequeue_script('wc-chosen');
    // wp_dequeue_script('woocommerce');
    // wp_dequeue_script('prettyPhoto');
    // wp_dequeue_script('prettyPhoto-init');
    // wp_dequeue_script('jquery.blockUI');
    // wp_dequeue_script('jquery-placeholder');
    // wp_dequeue_script('jquery-payment');
    // wp_dequeue_script('fancybox');
    // wp_dequeue_script('jqueryui');
}, 99);
