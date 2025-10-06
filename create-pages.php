<?php
/**
 * Standalone script to create industry pages
 * Upload this file to your WordPress root directory and access it via browser
 * URL: https://your-site.com/wp-content/themes/fixr-ai/create-pages.php
 */

// Load WordPress
require_once('../../../wp-load.php');

// Check if user is logged in and is admin
if (!is_user_logged_in() || !current_user_can('manage_options')) {
    wp_die('You must be logged in as an administrator to run this script.');
}

// Load theme functions
require_once(get_template_directory() . '/inc/config.php');
require_once(get_template_directory() . '/inc/utils.php');
require_once(get_template_directory() . '/inc/industry-content.php');
require_once(get_template_directory() . '/inc/pages.php');

echo '<html><head><title>Create Pages</title><style>
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
h1 { color: #0066FF; }
.success { background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin: 10px 0; }
.info { background: #d1ecf1; color: #0c5460; padding: 15px; border-radius: 8px; margin: 10px 0; }
.button { display: inline-block; background: linear-gradient(135deg, #0066FF, #6C5CE7); color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; margin: 10px 0; }
</style></head><body>';

echo '<h1>Fixr AI - Create Industry Pages</h1>';

// Run page creation
echo '<div class="info"><strong>Creating pages...</strong></div>';

$pages = fixr_ai_get_pages_config();
$created = 0;
$existing = 0;

foreach ($pages as $key => $page) {
    if (fixr_ai_page_exists($page['slug'])) {
        echo '<div class="info">Page already exists: <strong>' . esc_html($page['title']) . '</strong> (/' . esc_html($page['slug']) . ')</div>';
        $existing++;
        continue;
    }

    // Create the page
    $page_data = array(
        'post_title'   => sanitize_text_field($page['title']),
        'post_name'    => sanitize_title($page['slug']),
        'post_content' => wp_kses_post($page['content']),
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_author'  => get_current_user_id(),
    );

    $page_id = wp_insert_post($page_data);

    if ($page_id) {
        echo '<div class="success">✓ Created: <strong>' . esc_html($page['title']) . '</strong> (/' . esc_html($page['slug']) . ')</div>';
        $created++;
    }
}

echo '<h2>Summary</h2>';
echo '<div class="success">';
echo '<strong>Pages Created:</strong> ' . $created . '<br>';
echo '<strong>Already Existed:</strong> ' . $existing . '<br>';
echo '<strong>Total Pages:</strong> ' . count($pages);
echo '</div>';

echo '<div class="info"><strong>Next Steps:</strong><br>';
echo '1. Go to <a href="' . admin_url('edit.php?post_type=page') . '">Pages</a> to view all pages<br>';
echo '2. Go to <a href="' . admin_url('nav-menus.php') . '">Menus</a> to add pages to navigation<br>';
echo '3. Clear your browser cache (Ctrl + Shift + R)<br>';
echo '4. Delete this file for security: /wp-content/themes/fixr-ai/create-pages.php';
echo '</div>';

echo '<a href="' . admin_url('edit.php?post_type=page') . '" class="button">View All Pages</a>';
echo '<a href="' . home_url() . '" class="button">Visit Site</a>';

echo '</body></html>';
