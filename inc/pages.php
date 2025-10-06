<?php
/**
 * Page creation and menu management
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Define all pages to create
 *
 * @return array Pages configuration
 */
function fixr_ai_get_pages_config() {
    return array(
        'home' => array(
            'title'   => 'Home',
            'slug'    => 'home',
            'content' => '<p>Welcome to Fixr AI - Your partner in AI-powered automation and optimization for healthcare businesses.</p><p>We help med spas and private clinics leverage cutting-edge AI technology to streamline operations, enhance patient experiences, and grow their practice.</p>',
            'menu'    => 'main',
        ),
        'about' => array(
            'title'   => 'About',
            'slug'    => 'about',
            'content' => '<p>Fixr AI specializes in bringing enterprise-grade AI automation to healthcare businesses. Our team combines deep expertise in artificial intelligence, healthcare operations, and digital marketing to deliver transformative results.</p><p>We understand the unique challenges facing med spas and private medical clinics in today\'s competitive landscape.</p>',
            'menu'    => 'main',
        ),
        'services' => array(
            'title'   => 'Services',
            'slug'    => 'services',
            'content' => '<p>Fixr AI offers comprehensive AI automation and optimization services tailored for healthcare businesses:</p><ul><li>AI-powered workflow automation</li><li>Patient engagement optimization</li><li>Digital presence enhancement</li><li>Revenue optimization systems</li></ul>',
            'menu'    => 'main',
        ),
        'automation' => array(
            'title'   => 'Automation',
            'slug'    => 'automation',
            'content' => '<p>Transform your practice with intelligent automation solutions designed specifically for med spas and private clinics.</p><p>Our automation services include appointment scheduling, patient communications, follow-up workflows, review management, and administrative task optimization.</p><p>Reduce staff workload while improving patient satisfaction and retention.</p>',
            'menu'    => 'main',
        ),
        'llmo' => array(
            'title'   => 'LLMO for Med Spas & Private Clinics',
            'slug'    => 'llmo',
            'content' => '<h1>Large Language Model Optimization (LLMO) for Med Spas & Clinics</h1>

<h2>What is LLMO?</h2>
<p>Large Language Model Optimization (LLMO) is the practice of optimizing your business to be discoverable, accurately represented, and recommended by AI systems like ChatGPT, Perplexity, Gemini, Google AI, and other large language models.</p>

<p>As patients increasingly turn to AI assistants for healthcare recommendations, appearing in AI-generated results is becoming as critical as traditional search engine optimization.</p>

<h2>How LLMs Choose Healthcare Providers</h2>
<p>AI systems rely on multiple signals and data sources to recommend med spas and private clinics:</p>
<ul>
<li><strong>Structured data and knowledge graphs:</strong> Clear entity definitions for your clinic, services, providers, and locations</li>
<li><strong>Authoritative sources:</strong> Medical directories, review platforms, citations, and verified databases</li>
<li><strong>Content quality:</strong> Concise, answer-first information that matches patient queries</li>
<li><strong>Reputation signals:</strong> Reviews, ratings, provider credentials, and E-E-A-T markers</li>
<li><strong>Service clarity:</strong> Well-defined treatment offerings, pricing transparency, and specializations</li>
</ul>

<h2>Fixr AI LLMO Playbook for Med Spas & Clinics</h2>
<p>Our comprehensive LLMO service includes:</p>

<ul>
<li><strong>Entity & Knowledge Graph Optimization:</strong> Structure your clinic, brand, services (Botox, fillers, laser treatments, aesthetic procedures), providers, and locations for AI comprehension</li>

<li><strong>Structured Data & Source Management:</strong> Ensure consistent NAP (Name, Address, Phone), implement medical service schema markup, manage citations across authoritative directories, and create FAQ content</li>

<li><strong>LLM-Ready Content Creation:</strong> Develop concise, answer-first pages and FAQs optimized for how AI systems parse and present information</li>

<li><strong>First-Party Data Connectors:</strong> Integrate your reviews, service menus, price ranges, availability calendars, and intake workflows so AI systems can provide accurate, current information</li>

<li><strong>Policy & Compliance Guardrails:</strong> Implement PHI-safe language, proper medical disclaimers, and compliance messaging that protects your practice while maintaining AI visibility</li>

<li><strong>Prompt & Answer Optimization:</strong> Create canonical brand answers for common patient questions about your services, providers, pricing, and differentiators</li>

<li><strong>Reputation Signal Enhancement:</strong> Systematically build review velocity, provider expertise markers, and E-E-A-T (Experience, Expertise, Authoritativeness, Trustworthiness) signals</li>

<li><strong>LLM Share-of-Voice Tracking:</strong> Monitor your visibility in AI-generated recommendations versus local competitors, track assistant queries, and measure conversion from AI-referred patients</li>
</ul>

<h2>Compliance & Safe Answers</h2>
<p>Healthcare marketing requires special consideration. Our LLMO implementation ensures:</p>
<ul>
<li>HIPAA-compliant language and data handling</li>
<li>Appropriate medical disclaimers and disclosures</li>
<li>Accurate representation of services and outcomes</li>
<li>Compliance with state and federal healthcare advertising regulations</li>
</ul>

<h2>Is LLMO the Same as Traditional SEO?</h2>
<p>While LLMO shares some principles with SEO, it\'s fundamentally different:</p>
<ul>
<li><strong>Traditional SEO</strong> optimizes for search engine rankings and click-through rates</li>
<li><strong>LLMO</strong> optimizes for AI recommendation and accurate representation within conversational responses</li>
</ul>
<p>LLMs don\'t use traditional ranking signals like backlinks. Instead, they prioritize authoritative sources, structured data, entity clarity, and content that directly answers questions. Both strategies are essential for comprehensive digital visibility.</p>

<h2>Measuring LLMO Results</h2>
<p>We track specific metrics to demonstrate LLMO impact:</p>
<ul>
<li><strong>LLM Share-of-Voice:</strong> How often your clinic appears in AI recommendations versus competitors for key service queries</li>
<li><strong>Assistant Query Volume:</strong> Frequency of your practice being referenced in AI conversations</li>
<li><strong>Recommendation Accuracy:</strong> Quality and correctness of AI-generated information about your services</li>
<li><strong>Conversion Attribution:</strong> Patients who discovered your practice through AI assistants</li>
<li><strong>Entity Strength:</strong> How well AI systems understand and represent your clinic, services, and providers</li>
</ul>

<h2>Ready to Get Started?</h2>
<p><strong>Request an LLMO Assessment</strong> - We\'ll analyze your current AI visibility, identify optimization opportunities, and create a custom roadmap for dominating AI-powered recommendations in your market.</p>

<p>Contact Fixr AI today to ensure your med spa or private clinic is positioned to win in the age of AI-assisted patient decision-making.</p>',
            'menu'    => 'main',
        ),
        'seo' => array(
            'title'   => 'SEO',
            'slug'    => 'seo',
            'content' => '<p>Dominate local search results with SEO strategies designed specifically for med spas and private medical clinics.</p><p>Our data-driven approach combines technical SEO, content optimization, and local search dominance to attract high-intent patients actively searching for your services.</p>',
            'menu'    => 'main',
        ),
        'meta-ads' => array(
            'title'   => 'Meta Ads',
            'slug'    => 'meta-ads',
            'content' => '<p>Reach your ideal patients on Facebook and Instagram with precision-targeted Meta advertising campaigns.</p><p>We create compelling ad creative, optimize targeting to reach demographics most likely to convert, and manage campaigns to maximize your return on ad spend.</p>',
            'menu'    => 'main',
        ),
        'google-ads' => array(
            'title'   => 'Google Ads',
            'slug'    => 'google-ads',
            'content' => '<p>Capture high-intent patients at the moment they\'re searching for your services with strategic Google Ads campaigns.</p><p>Our approach focuses on local service ads, search campaigns, and remarketing to drive qualified leads while maintaining profitable cost-per-acquisition.</p>',
            'menu'    => 'main',
        ),
        'affiliates' => array(
            'title'   => 'Affiliates',
            'slug'    => 'affiliates',
            'content' => '<p>Partner with Fixr AI to offer cutting-edge AI automation and marketing solutions to your clients.</p><p>Our affiliate program provides competitive commissions, dedicated support, and co-marketing opportunities for agencies and consultants serving the healthcare industry.</p>',
            'menu'    => 'main',
        ),
        'results' => array(
            'title'   => 'Results',
            'slug'    => 'results',
            'content' => '<p>See the measurable impact Fixr AI delivers for med spas and private clinics.</p><p>Our clients consistently experience increased patient bookings, improved operational efficiency, higher patient satisfaction scores, and significant ROI from AI-powered automation and marketing solutions.</p>',
            'menu'    => 'main',
        ),
        'privacy-policy' => array(
            'title'   => 'Privacy Policy',
            'slug'    => 'privacy-policy',
            'content' => '<h1>Privacy Policy</h1><p>Last updated: ' . date( 'F j, Y' ) . '</p><p>Fixr AI ("we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website.</p><h2>Information We Collect</h2><p>We may collect information about you in a variety of ways, including information you provide directly to us, information we collect automatically, and information from third-party sources.</p><h2>Use of Your Information</h2><p>We use the information we collect to provide, maintain, and improve our services, communicate with you, and comply with legal obligations.</p><h2>Contact Us</h2><p>If you have questions about this Privacy Policy, please contact us at: <a href="tel:+18568305177">(856) 830-5177</a></p>',
            'menu'    => 'footer',
        ),
        'terms-conditions' => array(
            'title'   => 'Terms & Conditions',
            'slug'    => 'terms-conditions',
            'content' => '<h1>Terms & Conditions</h1><p>Last updated: ' . date( 'F j, Y' ) . '</p><p>Please read these Terms and Conditions ("Terms") carefully before using Fixr AI\'s services.</p><h2>Agreement to Terms</h2><p>By accessing or using our services, you agree to be bound by these Terms. If you disagree with any part of the terms, you may not access our services.</p><h2>Services</h2><p>Fixr AI provides AI automation and digital marketing services for healthcare businesses. We reserve the right to modify or discontinue services at any time without notice.</p><h2>Limitation of Liability</h2><p>Fixr AI shall not be liable for any indirect, incidental, special, consequential, or punitive damages resulting from your use of or inability to use our services.</p><h2>Contact Information</h2><p>For questions about these Terms, please contact us at: <a href="tel:+18568305177">(856) 830-5177</a></p>',
            'menu'    => 'footer',
        ),
        // Industry-specific pages
        'real-estate' => array(
            'title'   => 'AI Automation for Real Estate Agents',
            'slug'    => 'real-estate-ai-automation',
            'content' => fixr_ai_get_real_estate_content(),
            'menu'    => 'main',
        ),
        'hvac' => array(
            'title'   => 'AI Automation for HVAC Contractors',
            'slug'    => 'hvac-ai-automation',
            'content' => fixr_ai_get_hvac_content(),
            'menu'    => 'main',
        ),
        'roofing' => array(
            'title'   => 'AI Automation for Roofing Companies',
            'slug'    => 'roofing-ai-automation',
            'content' => fixr_ai_get_roofing_content(),
            'menu'    => 'main',
        ),
        'painting' => array(
            'title'   => 'AI Automation for Painting Contractors',
            'slug'    => 'painting-ai-automation',
            'content' => fixr_ai_get_painting_content(),
            'menu'    => 'main',
        ),
        'kitchen-bath' => array(
            'title'   => 'AI Automation for Kitchen & Bath Remodelers',
            'slug'    => 'kitchen-bath-remodeling-ai-automation',
            'content' => fixr_ai_get_kitchen_bath_content(),
            'menu'    => 'main',
        ),
        'landscaping' => array(
            'title'   => 'AI Automation for Landscaping Businesses',
            'slug'    => 'landscaping-ai-automation',
            'content' => fixr_ai_get_landscaping_content(),
            'menu'    => 'main',
        ),
        'plumbing' => array(
            'title'   => 'AI Automation for Plumbing Companies',
            'slug'    => 'plumbing-ai-automation',
            'content' => fixr_ai_get_plumbing_content(),
            'menu'    => 'main',
        ),
        'commercial-cleaning' => array(
            'title'   => 'AI Automation for Commercial Cleaning Services',
            'slug'    => 'commercial-cleaning-ai-automation',
            'content' => fixr_ai_get_commercial_cleaning_content(),
            'menu'    => 'main',
        ),
        'pest-control' => array(
            'title'   => 'AI Automation for Pest Control Businesses',
            'slug'    => 'pest-control-ai-automation',
            'content' => fixr_ai_get_pest_control_content(),
            'menu'    => 'main',
        ),
    );
}

/**
 * Create all pages (idempotent)
 */
function fixr_ai_create_pages() {
    $pages = fixr_ai_get_pages_config();

    foreach ( $pages as $key => $page ) {
        // Skip if page already exists
        if ( fixr_ai_page_exists( $page['slug'] ) ) {
            continue;
        }

        // Create the page
        $page_data = array(
            'post_title'   => sanitize_text_field( $page['title'] ),
            'post_name'    => sanitize_title( $page['slug'] ),
            'post_content' => wp_kses_post( $page['content'] ),
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_author'  => 1,
        );

        wp_insert_post( $page_data );
    }
}

/**
 * Setup menus and assign pages (idempotent)
 */
function fixr_ai_setup_menus() {
    $pages = fixr_ai_get_pages_config();

    // Create or get menus
    $main_menu_id   = fixr_ai_get_or_create_menu( 'Main Menu' );
    $footer_menu_id = fixr_ai_get_or_create_menu( 'Footer Menu' );

    // Assign menu locations if theme supports them
    $locations = get_theme_mod( 'nav_menu_locations' );
    if ( ! isset( $locations['primary'] ) ) {
        $locations['primary'] = $main_menu_id;
    }
    if ( ! isset( $locations['footer'] ) ) {
        $locations['footer'] = $footer_menu_id;
    }
    set_theme_mod( 'nav_menu_locations', $locations );

    // Add pages to menus
    $menu_order = 1;

    foreach ( $pages as $key => $page ) {
        $page_id = fixr_ai_get_page_id_by_slug( $page['slug'] );

        if ( ! $page_id ) {
            continue;
        }

        // Determine which menu
        $menu_id = ( $page['menu'] === 'footer' ) ? $footer_menu_id : $main_menu_id;

        // Skip if already in menu
        if ( fixr_ai_page_in_menu( $menu_id, $page_id ) ) {
            continue;
        }

        // Add to menu
        wp_update_nav_menu_item(
            $menu_id,
            0,
            array(
                'menu-item-title'     => sanitize_text_field( $page['title'] ),
                'menu-item-object'    => 'page',
                'menu-item-object-id' => $page_id,
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
                'menu-item-position'  => $menu_order++,
            )
        );
    }
}
