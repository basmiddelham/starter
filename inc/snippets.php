<?php
/**
 * Snippets
 * 
 * Filters, actions and functions for this theme.
 *
 * @package strt
 */

/**
 * Set thumbnail size
 */
set_post_thumbnail_size( 200, 200, true );

/**
 * Add dropdown-icon to primary_navigation if menu item has children.
 */
add_filter('nav_menu_item_title', function ($title, $item, $args, $depth) {
    if ('primary_navigation' === $args->theme_location) {
        foreach ($item->classes as $value) {
            if ('menu-item-has-children' === $value || 'page_item_has_children' === $value) {
                $title = $title . '<svg xmlns="http://www.w3.org/2000/svg" width="8" height="5" aria-hidden="true" role="img" class="angleDown"><path fill="currentColor" d="M1 0l3 3 3-3 1 1-4 4-4-4z"/></svg>';
            }
        }
    }
    return $title;
}, 10, 4);

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
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'strt') . '</a>';
});

/**
 * Custom excerpt length.
 */

add_filter('excerpt_length', function ($length){
    return 30;
});