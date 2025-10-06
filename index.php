<?php
/**
 * The main template file
 *
 * @package Fixr_AI
 */

get_header(); ?>

<main class="site-content">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
    else :
        ?>
        <p><?php esc_html_e( 'No content found.', 'fixr-ai' ); ?></p>
        <?php
    endif;
    ?>
</main>

<?php get_footer(); ?>
