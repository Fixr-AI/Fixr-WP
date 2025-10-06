<?php
/**
 * SEO meta tags and JSON-LD schema output
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Output SEO meta tags
 */
function fixr_ai_output_seo_meta() {
    if ( ! is_singular( 'page' ) && ! is_front_page() ) {
        return;
    }

    $config = fixr_ai_get_config();
    $meta   = fixr_ai_get_page_meta();

    if ( empty( $meta ) ) {
        return;
    }

    // Title
    echo '<title>' . esc_html( $meta['title'] ) . '</title>' . "\n";

    // Meta description
    echo '<meta name="description" content="' . esc_attr( $meta['description'] ) . '">' . "\n";

    // Canonical URL
    echo '<link rel="canonical" href="' . esc_url( $meta['url'] ) . '">' . "\n";

    // Open Graph
    echo '<meta property="og:title" content="' . esc_attr( $meta['title'] ) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr( $meta['description'] ) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url( $meta['url'] ) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr( $config['brand_name'] ) . '">' . "\n";

    // Twitter Card
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr( $meta['title'] ) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr( $meta['description'] ) . '">' . "\n";
}

/**
 * Output JSON-LD schema
 */
function fixr_ai_output_schema() {
    if ( ! is_singular( 'page' ) && ! is_front_page() ) {
        return;
    }

    $config = fixr_ai_get_config();
    $slug   = fixr_ai_get_current_page_slug();

    // Always output Organization and WebSite schemas
    fixr_ai_output_organization_schema( $config );
    fixr_ai_output_website_schema( $config );

    // Output breadcrumbs for non-home pages
    if ( ! is_front_page() && $slug !== 'home' ) {
        fixr_ai_output_breadcrumb_schema();
    }

    // Page-specific schemas
    switch ( $slug ) {
        case 'about':
            fixr_ai_output_about_page_schema( $config );
            break;

        case 'services':
        case 'automation':
        case 'seo':
        case 'meta-ads':
        case 'google-ads':
            fixr_ai_output_service_schema( $config, $slug );
            break;

        case 'llmo':
            fixr_ai_output_llmo_schema( $config );
            fixr_ai_output_llmo_faq_schema( $config );
            break;

        case 'affiliates':
            fixr_ai_output_webpage_schema( $config, $slug );
            break;

        case 'results':
            fixr_ai_output_collection_page_schema( $config );
            break;

        case 'privacy-policy':
            fixr_ai_output_privacy_policy_schema( $config );
            break;

        case 'terms-conditions':
            fixr_ai_output_terms_schema( $config );
            break;
    }
}

/**
 * Get page meta data (title, description, URL)
 *
 * @return array|null Page meta or null
 */
function fixr_ai_get_page_meta() {
    global $post;

    if ( ! $post ) {
        return null;
    }

    $slug = fixr_ai_get_current_page_slug();
    $meta = fixr_ai_get_page_meta_config();

    if ( isset( $meta[ $slug ] ) ) {
        return array(
            'title'       => $meta[ $slug ]['title'],
            'description' => $meta[ $slug ]['description'],
            'url'         => get_permalink( $post->ID ),
        );
    }

    // Fallback
    return array(
        'title'       => get_the_title() . ' | Fixr AI',
        'description' => wp_trim_words( get_the_excerpt(), 30, '...' ),
        'url'         => get_permalink( $post->ID ),
    );
}

/**
 * Page meta configuration
 *
 * @return array Meta config
 */
function fixr_ai_get_page_meta_config() {
    return array(
        'home'              => array(
            'title'       => 'Fixr AI | AI Automation & Marketing for Med Spas & Private Clinics',
            'description' => 'Transform your med spa or private clinic with AI-powered automation, LLMO, SEO, and digital marketing solutions. Increase bookings, streamline operations, and dominate local search.',
        ),
        'about'             => array(
            'title'       => 'About Fixr AI | AI Experts for Healthcare Businesses',
            'description' => 'Learn how Fixr AI combines artificial intelligence expertise with healthcare marketing to deliver transformative results for med spas and private medical clinics.',
        ),
        'services'          => array(
            'title'       => 'Services | AI Automation & Marketing Solutions | Fixr AI',
            'description' => 'Comprehensive AI automation and digital marketing services for med spas and clinics: workflow automation, patient engagement, SEO, paid ads, and LLMO.',
        ),
        'automation'        => array(
            'title'       => 'AI Automation for Med Spas & Clinics | Fixr AI',
            'description' => 'Intelligent automation solutions for appointment scheduling, patient communications, review management, and administrative workflows. Reduce workload while improving patient satisfaction.',
        ),
        'llmo'              => array(
            'title'       => 'LLMO for Med Spas & Private Clinics | Large Language Model Optimization | Fixr AI',
            'description' => 'Boost visibility inside ChatGPT, Perplexity, Gemini, and Google AI. Fixr AI structures your services, FAQs, and reviews so LLMs recommend your med spa or clinic and drive more bookings.',
        ),
        'seo'               => array(
            'title'       => 'SEO for Med Spas & Clinics | Local Search Optimization | Fixr AI',
            'description' => 'Dominate local search results with SEO strategies designed for med spas and private clinics. Technical optimization, content strategy, and local search dominance.',
        ),
        'meta-ads'          => array(
            'title'       => 'Meta Ads for Med Spas | Facebook & Instagram Advertising | Fixr AI',
            'description' => 'Precision-targeted Meta advertising campaigns for med spas and clinics. Reach ideal patients on Facebook and Instagram with optimized ad creative and targeting.',
        ),
        'google-ads'        => array(
            'title'       => 'Google Ads for Med Spas & Clinics | PPC Management | Fixr AI',
            'description' => 'Capture high-intent patients with strategic Google Ads campaigns. Local service ads, search campaigns, and remarketing optimized for profitable cost-per-acquisition.',
        ),
        'affiliates'        => array(
            'title'       => 'Affiliate Program | Partner with Fixr AI',
            'description' => 'Join the Fixr AI affiliate program. Earn competitive commissions offering AI automation and marketing solutions to healthcare businesses.',
        ),
        'results'           => array(
            'title'       => 'Results & Case Studies | Fixr AI Client Success Stories',
            'description' => 'See measurable results: increased patient bookings, improved efficiency, higher satisfaction scores, and significant ROI from Fixr AI solutions.',
        ),
        'privacy-policy'    => array(
            'title'       => 'Privacy Policy | Fixr AI',
            'description' => 'Fixr AI privacy policy: how we collect, use, and protect your information when you visit our website or use our services.',
        ),
        'terms-conditions'  => array(
            'title'       => 'Terms & Conditions | Fixr AI',
            'description' => 'Fixr AI terms and conditions governing your use of our AI automation and digital marketing services.',
        ),
    );
}

/**
 * Output Organization schema
 */
function fixr_ai_output_organization_schema( $config ) {
    $schema = array(
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        'name'     => $config['brand_name'],
        'url'      => $config['site_url'],
        'logo'     => $config['logo_url'],
        'telephone' => $config['phone'],
    );

    if ( ! empty( $config['same_as'] ) ) {
        $schema['sameAs'] = $config['same_as'];
    }

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
    echo "\n" . '</script>' . "\n";
}

/**
 * Output WebSite schema with SearchAction
 */
function fixr_ai_output_website_schema( $config ) {
    $schema = array(
        '@context'        => 'https://schema.org',
        '@type'           => 'WebSite',
        'name'            => $config['brand_name'],
        'url'             => $config['site_url'],
        'potentialAction' => array(
            '@type'       => 'SearchAction',
            'target'      => array(
                '@type'       => 'EntryPoint',
                'urlTemplate' => $config['site_url'] . '/?s={search_term_string}',
            ),
            'query-input' => 'required name=search_term_string',
        ),
    );

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
    echo "\n" . '</script>' . "\n";
}

/**
 * Output Breadcrumb schema
 */
function fixr_ai_output_breadcrumb_schema() {
    global $post;

    if ( ! $post ) {
        return;
    }

    $config = fixr_ai_get_config();

    $schema = array(
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => array(
            array(
                '@type'    => 'ListItem',
                'position' => 1,
                'name'     => 'Home',
                'item'     => $config['site_url'],
            ),
            array(
                '@type'    => 'ListItem',
                'position' => 2,
                'name'     => get_the_title(),
                'item'     => get_permalink( $post->ID ),
            ),
        ),
    );

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
    echo "\n" . '</script>' . "\n";
}

/**
 * Output AboutPage schema
 */
function fixr_ai_output_about_page_schema( $config ) {
    global $post;

    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'AboutPage',
        'name'        => get_the_title(),
        'url'         => get_permalink( $post->ID ),
        'description' => 'Learn about Fixr AI and our mission to bring AI automation to healthcare businesses.',
    );

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
    echo "\n" . '</script>' . "\n";
}

/**
 * Output Service schema
 */
function fixr_ai_output_service_schema( $config, $slug ) {
    global $post;

    $service_names = array(
        'services'   => 'AI Automation & Marketing Services',
        'automation' => 'AI Automation for Healthcare',
        'seo'        => 'SEO Services for Med Spas & Clinics',
        'meta-ads'   => 'Meta Ads Management',
        'google-ads' => 'Google Ads Management',
    );

    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Service',
        'name'        => isset( $service_names[ $slug ] ) ? $service_names[ $slug ] : get_the_title(),
        'provider'    => array(
            '@type' => 'Organization',
            'name'  => $config['brand_name'],
            'url'   => $config['site_url'],
        ),
        'serviceType' => 'Marketing / SEO / AI Automation',
        'url'         => get_permalink( $post->ID ),
    );

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
    echo "\n" . '</script>' . "\n";
}

/**
 * Output LLMO Service schema
 */
function fixr_ai_output_llmo_schema( $config ) {
    global $post;

    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Service',
        'name'        => 'Large Language Model Optimization (LLMO)',
        'provider'    => array(
            '@type' => 'Organization',
            'name'  => $config['brand_name'],
            'url'   => $config['site_url'],
        ),
        'serviceType' => 'Marketing / SEO / AI Optimization',
        'description' => 'Optimize your business to be discoverable and recommended inside AI systems like ChatGPT, Perplexity, Gemini, and Google AI.',
        'areaServed'  => 'United States',
        'url'         => get_permalink( $post->ID ),
    );

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
    echo "\n" . '</script>' . "\n";
}

/**
 * Output LLMO FAQ schema
 */
function fixr_ai_output_llmo_faq_schema( $config ) {
    $schema = array(
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array(
            array(
                '@type'          => 'Question',
                'name'           => 'What is LLMO?',
                'acceptedAnswer' => array(
                    '@type' => 'Answer',
                    'text'  => 'LLMO (Large Language Model Optimization) is the practice of optimizing your business to be discoverable, accurately represented, and recommended by AI systems like ChatGPT, Perplexity, Gemini, Google AI, and other large language models. As patients increasingly turn to AI assistants for healthcare recommendations, appearing in AI-generated results is becoming as critical as traditional search engine optimization.',
                ),
            ),
            array(
                '@type'          => 'Question',
                'name'           => 'How does LLMO help med spas and clinics?',
                'acceptedAnswer' => array(
                    '@type' => 'Answer',
                    'text'  => 'LLMO helps med spas and private clinics by ensuring they appear in AI-generated recommendations when potential patients ask AI assistants for healthcare provider suggestions. By optimizing structured data, entity definitions, reviews, and content for AI comprehension, clinics increase their visibility in this rapidly growing discovery channel, leading to more patient inquiries and bookings from AI-referred sources.',
                ),
            ),
            array(
                '@type'          => 'Question',
                'name'           => 'What does Fixr AI\'s LLMO include?',
                'acceptedAnswer' => array(
                    '@type' => 'Answer',
                    'text'  => 'Fixr AI\'s LLMO service includes: entity and knowledge graph optimization for your clinic, services, and providers; structured data and medical service schema markup; LLM-ready content creation with answer-first formatting; first-party data connectors for reviews, services, and availability; compliance guardrails for HIPAA and healthcare regulations; prompt and answer optimization for common patient questions; reputation signal enhancement; and LLM share-of-voice tracking versus local competitors.',
                ),
            ),
            array(
                '@type'          => 'Question',
                'name'           => 'Is this the same as traditional SEO?',
                'acceptedAnswer' => array(
                    '@type' => 'Answer',
                    'text'  => 'No, LLMO is fundamentally different from traditional SEO. While traditional SEO optimizes for search engine rankings and click-through rates, LLMO optimizes for AI recommendation and accurate representation within conversational AI responses. LLMs don\'t use traditional ranking signals like backlinks. Instead, they prioritize authoritative sources, structured data, entity clarity, and content that directly answers questions. Both strategies are essential for comprehensive digital visibility.',
                ),
            ),
            array(
                '@type'          => 'Question',
                'name'           => 'How do you measure LLMO results?',
                'acceptedAnswer' => array(
                    '@type' => 'Answer',
                    'text'  => 'We measure LLMO impact through several key metrics: LLM share-of-voice (how often your clinic appears in AI recommendations versus competitors for key service queries), assistant query volume (frequency of your practice being referenced in AI conversations), recommendation accuracy (quality and correctness of AI-generated information about your services), conversion attribution (patients who discovered your practice through AI assistants), and entity strength (how well AI systems understand and represent your clinic, services, and providers).',
                ),
            ),
        ),
    );

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
    echo "\n" . '</script>' . "\n";
}

/**
 * Output WebPage schema
 */
function fixr_ai_output_webpage_schema( $config, $slug ) {
    global $post;

    $schema = array(
        '@context' => 'https://schema.org',
        '@type'    => 'WebPage',
        'name'     => get_the_title(),
        'url'      => get_permalink( $post->ID ),
    );

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
    echo "\n" . '</script>' . "\n";
}

/**
 * Output CollectionPage schema
 */
function fixr_ai_output_collection_page_schema( $config ) {
    global $post;

    $schema = array(
        '@context' => 'https://schema.org',
        '@type'    => 'CollectionPage',
        'name'     => get_the_title(),
        'url'      => get_permalink( $post->ID ),
    );

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
    echo "\n" . '</script>' . "\n";
}

/**
 * Output PrivacyPolicy schema
 */
function fixr_ai_output_privacy_policy_schema( $config ) {
    global $post;

    $schema = array(
        '@context' => 'https://schema.org',
        '@type'    => 'WebPage',
        'name'     => 'Privacy Policy',
        'url'      => get_permalink( $post->ID ),
    );

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
    echo "\n" . '</script>' . "\n";
}

/**
 * Output TermsOfService schema
 */
function fixr_ai_output_terms_schema( $config ) {
    global $post;

    $schema = array(
        '@context' => 'https://schema.org',
        '@type'    => 'WebPage',
        'name'     => 'Terms & Conditions',
        'url'      => get_permalink( $post->ID ),
    );

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
    echo "\n" . '</script>' . "\n";
}
