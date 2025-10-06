<?php
/**
 * Template Name: Industry Page
 * Template for industry-specific pages
 *
 * @package Fixr_AI
 */

get_header(); ?>

<main id="main" class="site-main industry-page">
    <?php
    while ( have_posts() ) :
        the_post();

        // Get industry-specific data from post meta
        $industry_name = get_post_meta( get_the_ID(), '_industry_name', true );
        $hero_image = get_post_meta( get_the_ID(), '_hero_image', true );
        $pain_point = get_post_meta( get_the_ID(), '_pain_point', true );
        $solution = get_post_meta( get_the_ID(), '_solution', true );
        ?>

        <!-- Hero Section -->
        <section class="industry-hero" style="background-image: linear-gradient(rgba(0, 102, 255, 0.85), rgba(108, 92, 231, 0.85)), url('<?php echo esc_url( $hero_image ); ?>');">
            <div class="hero-content">
                <h1 class="hero-title"><?php the_title(); ?></h1>
                <p class="hero-subtitle">AI-Powered Automation for <?php echo esc_html( $industry_name ); ?> Businesses</p>
            </div>
        </section>

        <!-- Pain Point Section -->
        <?php if ( $pain_point ) : ?>
        <section class="pain-point-section">
            <div class="content-wrapper">
                <h2>The Challenge</h2>
                <div class="pain-point-content">
                    <?php echo wp_kses_post( $pain_point ); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Solution Section -->
        <?php if ( $solution ) : ?>
        <section class="solution-section">
            <div class="content-wrapper">
                <h2>Our Solution</h2>
                <div class="solution-content">
                    <?php echo wp_kses_post( $solution ); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Main Content -->
        <div class="site-content">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        </div>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="content-wrapper">
                <h2>Ready to Transform Your <?php echo esc_html( $industry_name ); ?> Business?</h2>
                <p>Let's discuss how Fixr AI can help you automate operations, generate more leads, and grow your business.</p>
                <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="btn btn-primary">Get Started Today</a>
            </div>
        </section>

        <?php
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
