<?php
/**
 * Fixr AI Theme Functions
 *
 * @package Fixr_AI
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define theme constants
define( 'FIXR_AI_VERSION', '2.1.1' );
define( 'FIXR_AI_THEME_DIR', get_template_directory() );
define( 'FIXR_AI_THEME_URL', get_template_directory_uri() );

// Require dependencies
require_once FIXR_AI_THEME_DIR . '/inc/config.php';
require_once FIXR_AI_THEME_DIR . '/inc/utils.php';
require_once FIXR_AI_THEME_DIR . '/inc/industry-content.php';
require_once FIXR_AI_THEME_DIR . '/inc/pages.php';
require_once FIXR_AI_THEME_DIR . '/inc/seo-schema.php';

/**
 * Theme setup
 */
function fixr_ai_setup() {
    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Main Menu', 'fixr-ai' ),
        'footer'  => __( 'Footer Menu', 'fixr-ai' ),
    ) );
}
add_action( 'after_setup_theme', 'fixr_ai_setup' );

/**
 * Create pages and menus on theme activation
 */
function fixr_ai_activate() {
    fixr_ai_create_pages();
    fixr_ai_setup_menus();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'fixr_ai_activate' );

/**
 * Initialize SEO and schema
 */
function fixr_ai_init() {
    // Hook SEO and schema into wp_head
    add_action( 'wp_head', 'fixr_ai_output_seo_meta', 1 );
    add_action( 'wp_head', 'fixr_ai_output_schema', 2 );
}
add_action( 'init', 'fixr_ai_init' );

/**
 * Enqueue styles and scripts
 */
function fixr_ai_enqueue_assets() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'fixr-ai-style', get_stylesheet_uri(), array(), FIXR_AI_VERSION );

    // Enqueue theme JavaScript
    wp_enqueue_script(
        'fixr-ai-theme',
        get_template_directory_uri() . '/js/theme.js',
        array(),
        FIXR_AI_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'fixr_ai_enqueue_assets' );

/**
 * Add admin menu for creating pages
 */
function fixr_ai_admin_menu() {
    add_theme_page(
        'Create Industry Pages',
        'Create Pages',
        'manage_options',
        'fixr-ai-create-pages',
        'fixr_ai_create_pages_admin_page'
    );
}
add_action( 'admin_menu', 'fixr_ai_admin_menu' );

/**
 * Admin page to create industry pages
 */
function fixr_ai_create_pages_admin_page() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( 'Unauthorized access' );
    }

    // Handle form submission
    if ( isset( $_POST['fixr_ai_create_pages'] ) && check_admin_referer( 'fixr_ai_create_pages' ) ) {
        $pages = fixr_ai_get_pages_config();
        $created = 0;
        $existing = 0;

        foreach ( $pages as $key => $page ) {
            if ( fixr_ai_page_exists( $page['slug'] ) ) {
                $existing++;
                continue;
            }

            $page_data = array(
                'post_title'   => sanitize_text_field( $page['title'] ),
                'post_name'    => sanitize_title( $page['slug'] ),
                'post_content' => wp_kses_post( $page['content'] ),
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_author'  => get_current_user_id(),
            );

            $page_id = wp_insert_post( $page_data );
            if ( $page_id ) {
                $created++;
            }
        }

        echo '<div class="notice notice-success"><p><strong>Success!</strong> Created ' . $created . ' new pages. ' . $existing . ' pages already existed.</p></div>';

        // Also setup menus
        fixr_ai_setup_menus();
        echo '<div class="notice notice-success"><p><strong>Menus updated!</strong> Pages have been added to navigation menus.</p></div>';
    }

    // Display the admin page
    ?>
    <div class="wrap">
        <h1>Create Fixr AI Industry Pages</h1>
        <p>Click the button below to create all industry-specific pages for your website.</p>

        <div class="card" style="max-width: 800px;">
            <h2>Industry Pages to Create:</h2>
            <ul style="list-style: disc; margin-left: 20px;">
                <li><strong>Real Estate</strong> - AI Automation for Real Estate Agents</li>
                <li><strong>HVAC</strong> - AI Automation for HVAC Contractors</li>
                <li><strong>Roofing</strong> - AI Automation for Roofing Companies</li>
                <li><strong>Painting</strong> - AI Automation for Painting Contractors</li>
                <li><strong>Kitchen & Bath</strong> - AI Automation for Kitchen & Bath Remodelers</li>
                <li><strong>Landscaping</strong> - AI Automation for Landscaping Businesses</li>
                <li><strong>Plumbing</strong> - AI Automation for Plumbing Companies</li>
                <li><strong>Commercial Cleaning</strong> - AI Automation for Commercial Cleaning Services</li>
                <li><strong>Pest Control</strong> - AI Automation for Pest Control Businesses</li>
            </ul>

            <p><strong>Note:</strong> This will also create all other pages (Home, About, Services, etc.) if they don't exist.</p>
        </div>

        <form method="post" action="">
            <?php wp_nonce_field( 'fixr_ai_create_pages' ); ?>
            <p>
                <button type="submit" name="fixr_ai_create_pages" class="button button-primary button-hero">
                    Create All Pages Now
                </button>
            </p>
        </form>

        <p><a href="<?php echo admin_url( 'edit.php?post_type=page' ); ?>" class="button">View All Pages</a></p>
    </div>
    <?php
}
