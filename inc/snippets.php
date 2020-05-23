<?php
/**
 * Snippets
 * 
 * Filters, actions and functions for this theme.
 *
 * @package strt
 */

set_post_thumbnail_size( 200, 200, true );

/**
 * Remove inline width from caption shortcode.
 */
add_filter('img_caption_shortcode_width', '__return_false');

/**
 * Disable Gutenberg editor.
 */
add_filter('use_block_editor_for_post', '__return_false');

/**
 * Remove the block styles file from wp_head().
 */
add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('wp-block-library'); // Gutenberg blocks CSS
});

/**
 * Add "… Continued" to the excerpt.
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Custom excerpt length.
 */

add_filter('excerpt_length', function ($length){
    return 30;
});