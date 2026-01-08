<?php
/**
 * The Header template for our theme
 *
 * @package StreamX24
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="pIdUf78HWKtrgPmzr_FOpnMWA6qo92jlktnSLYscCKs" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="sx-header">
        <div class="sx-container sx-header-inner">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sx-logo">
                <span class="sx-logo-mark">SX</span>
                <span class="sx-logo-text">StreamX24</span>
            </a>

            <button class="sx-nav-toggle" aria-label="<?php esc_attr_e( 'Toggle navigation', 'streamx24' ); ?>">
                <span></span>
                <span></span>
            </button>

            <nav class="sx-nav" role="navigation" aria-label="<?php esc_attr_e( 'Header Menu', 'streamx24' ); ?>">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'header-menu',
                    'menu_class'     => 'navv',
                    'container'      => false,
                    'fallback_cb'    => 'streamx24_menu_fallback',
                    'depth'          => 3,
                ) );
                ?>
            </nav>
        </div>
    </header>

