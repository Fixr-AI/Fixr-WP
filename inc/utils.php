<?php
/**
 * Utility helper functions
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Check if a page exists by slug
 *
 * @param string $slug Page slug to check
 * @return bool True if page exists, false otherwise
 */
function fixr_ai_page_exists( $slug ) {
    $page = get_page_by_path( $slug, OBJECT, 'page' );
    return ! empty( $page );
}

/**
 * Get page ID by slug
 *
 * @param string $slug Page slug
 * @return int|null Page ID or null if not found
 */
function fixr_ai_get_page_id_by_slug( $slug ) {
    $page = get_page_by_path( $slug, OBJECT, 'page' );
    return $page ? $page->ID : null;
}

/**
 * Sanitize and output text safely
 *
 * @param string $text Text to output
 * @return void
 */
function fixr_ai_safe_echo( $text ) {
    echo esc_html( $text );
}

/**
 * Get current page slug
 *
 * @return string Current page slug or empty string
 */
function fixr_ai_get_current_page_slug() {
    global $post;
    return $post && isset( $post->post_name ) ? $post->post_name : '';
}

/**
 * Check if menu exists by name
 *
 * @param string $menu_name Menu name
 * @return bool True if menu exists, false otherwise
 */
function fixr_ai_menu_exists( $menu_name ) {
    return wp_get_nav_menu_object( $menu_name ) !== false;
}

/**
 * Get or create menu by name
 *
 * @param string $menu_name Menu name
 * @return int Menu ID
 */
function fixr_ai_get_or_create_menu( $menu_name ) {
    $menu = wp_get_nav_menu_object( $menu_name );

    if ( ! $menu ) {
        $menu_id = wp_create_nav_menu( $menu_name );
        return $menu_id;
    }

    return $menu->term_id;
}

/**
 * Check if page is already in menu
 *
 * @param int $menu_id Menu ID
 * @param int $page_id Page ID
 * @return bool True if page is in menu, false otherwise
 */
function fixr_ai_page_in_menu( $menu_id, $page_id ) {
    $menu_items = wp_get_nav_menu_items( $menu_id );

    if ( ! $menu_items ) {
        return false;
    }

    foreach ( $menu_items as $item ) {
        if ( $item->object_id == $page_id && $item->object === 'page' ) {
            return true;
        }
    }

    return false;
}

/**
 * Sanitize schema output
 *
 * @param string $json JSON string to sanitize
 * @return string Sanitized JSON
 */
function fixr_ai_sanitize_schema( $json ) {
    // Already sanitized via json_encode, but ensure proper escaping for HTML context
    return wp_kses( $json, array() );
}
