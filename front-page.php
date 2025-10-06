<?php
/**
 * The front page template
 *
 * @package Fixr_AI
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">AI-Powered Automation for Healthcare</h1>
            <p class="hero-description">
                Transform your med spa or private clinic with cutting-edge AI automation,
                LLMO optimization, and digital marketing solutions that drive real results.
            </p>
            <div class="hero-cta">
                <a href="<?php echo esc_url( home_url( '/automation' ) ); ?>" class="btn btn-primary">
                    Explore Solutions
                </a>
                <a href="<?php echo esc_url( home_url( '/llmo' ) ); ?>" class="btn btn-secondary">
                    Learn About LLMO
                </a>
            </div>
        </div>
    </section>

    <!-- Home Page Content -->
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <div class="site-content">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        </div>
        <?php
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
