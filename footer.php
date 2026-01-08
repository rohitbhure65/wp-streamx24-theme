<?php
/**
 * The Footer template for our theme
 *
 * @package StreamX24
 * @since 1.0.0
 */
?>

    <footer class="sx-footer">
        <div class="sx-container sx-footer-inner">
            <div>
                <p class="sx-footer-logo">StreamX24</p>
                <p class="sx-footer-text">
                    <?php esc_html_e( 'Digital marketplace for premium plugins, themes, source code, and scripts.', 'streamx24' ); ?>
                </p>
            </div>
            
            <div class="sx-footer-links">
                <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Us', 'streamx24' ); ?></a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'streamx24' ); ?></a>
                <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'streamx24' ); ?></a>
                <a href="<?php echo esc_url( home_url( '/terms-conditions/' ) ); ?>"><?php esc_html_e( 'Terms &amp; Conditions', 'streamx24' ); ?></a>
            </div>
            
            <p class="sx-footer-copy">
                <?php 
                printf(
                    /* translators: Copyright year and site name */
                    esc_html__( '&copy; %s StreamX24. All rights reserved.', 'streamx24' ),
                    '<span id="year">' . esc_html( gmdate( 'Y' ) ) . '</span>'
                );
                ?>
            </p>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>

