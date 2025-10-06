<footer class="site-footer">
    <div class="footer-container">
        <nav class="footer-navigation" role="navigation" aria-label="Footer Navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'menu_class'     => 'footer-menu',
                'container'      => false,
                'fallback_cb'    => false,
            ) );
            ?>
        </nav>

        <div class="site-info">
            <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
