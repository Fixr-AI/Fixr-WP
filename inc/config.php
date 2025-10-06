<?php
/**
 * Configuration settings for Fixr AI
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get Fixr AI configuration
 *
 * @return array Configuration array
 */
function fixr_ai_get_config() {
    return array(
        'brand_name' => 'Fixr AI',
        'site_url'   => 'https://mike08241cbe467-lpsbf.wpcomstaging.com',
        'logo_url'   => 'https://mike08241cbe467-lpsbf.wpcomstaging.com/wp-content/plugins/plugin-fixr-ai/assets/logo.png',
        'phone'      => '+1-856-830-5177',
        'same_as'    => array(
            // Add social profiles here when available
            // 'https://linkedin.com/company/fixr-ai',
            // 'https://twitter.com/fixrai',
            // 'https://facebook.com/fixrai',
        ),
    );
}
