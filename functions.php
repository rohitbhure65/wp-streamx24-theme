<?php
/**
 * StreamX24 Theme Functions
 *
 * @package StreamX24
 * @since 1.0.0
 */

/**
 * Theme setup - runs after theme activation
 */
function streamx24_theme_setup() {
    // Load text domain for translations
    load_theme_textdomain( 'streamx24', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Enable title tag (required for WordPress 4.1+)
    add_theme_support( 'title-tag' );

    // Enable featured images for posts
    add_theme_support( 'post-thumbnails' );

    // Enable selective refresh for widgets (WordPress 4.5+)
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Enable custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // Register navigation menus - use consistent slug names
    register_nav_menus( array(
        'header-menu' => __( 'Header Menu', 'streamx24' ),
        'footer-menu' => __( 'Footer Menu', 'streamx24' ),
    ) );

    // Add support for HTML5 markup
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add support for block editor styles
    add_theme_support( 'wp-block-styles' );

    // Align wide and full width images in Gutenberg
    add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'streamx24_theme_setup' );

/**
 * Enqueue scripts and styles
 */
function streamx24_scripts() {
    // Main stylesheet
    wp_enqueue_style(
        'streamx24-style',
        get_stylesheet_uri(),
        array(),
        '1.0.0'
    );

    // Main JavaScript file
    wp_enqueue_script(
        'streamx24-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array( 'jquery' ),
        '1.0.0',
        true
    );

    // Localize script for AJAX and dynamic data
    wp_localize_script( 'streamx24-main', 'streamx24_vars', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'streamx24_nonce' ),
        'whatsapp_number' => '918839178090',
    ) );

    // Google Analytics - enqueue properly
    wp_enqueue_script(
        'google-analytics',
        'https://www.googletagmanager.com/gtag/js?id=G-P1G1G7PLGC',
        array(),
        '1.0.0',
        true
    );

    // Inline Google Analytics configuration
    wp_add_inline_script( 'google-analytics', '
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag("js", new Date());
        gtag("config", "G-P1G1G7PLGC");
    ' );

    // Comment reply script for threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'streamx24_scripts' );

/**
 * Add body classes for better styling
 *
 * @param array $classes Body classes.
 * @return array
 */
function streamx24_body_classes( $classes ) {
    // Add class for sidebar presence
    if ( is_active_sidebar( 'sidebar-1' ) && ! is_page_template( 'template-custom.php' ) ) {
        $classes[] = 'has-sidebar';
    }

    // Add class for custom logo
    if ( has_custom_logo() ) {
        $classes[] = 'has-custom-logo';
    }

    return $classes;
}
add_filter( 'body_class', 'streamx24_body_classes' );

/**
 * Comment callback function for custom comment styling
 *
 * @param object $comment Comment object.
 * @param array  $args    Comment arguments.
 * @param int    $depth   Comment depth.
 */
function streamx24_comment_callback( $comment, $args, $depth ) {
    ?>
    <li <?php comment_class( 'sx-comment' ); ?> id="comment-<?php comment_ID(); ?>">
        <div class="sx-comment-body">
            <?php echo get_avatar( $comment, 48, '', esc_attr( get_comment_author() ), array( 'class' => 'sx-comment-avatar' ) ); ?>
            <div class="sx-comment-content">
                <div class="sx-comment-meta">
                    <span class="sx-comment-author">
                        <?php comment_author(); ?>
                    </span>
                    <span class="sx-comment-date">
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                            <?php printf( esc_html__( '%1$s at %2$s', 'streamx24' ), get_comment_date(), get_comment_time() ); ?>
                        </a>
                    </span>
                </div>
                <div class="sx-comment-text">
                    <?php comment_text(); ?>
                </div>
                <div class="sx-comment-reply-link">
                    <?php
                    comment_reply_link(
                        array_merge(
                            $args,
                            array(
                                'depth'     => $depth,
                                'max_depth' => $args['max_depth'],
                            )
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
    <?php
}

/**
 * Filter the excerpt length
 *
 * @param int $length Excerpt length.
 * @return int
 */
function streamx24_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'streamx24_excerpt_length' );

/**
 * Filter the excerpt "more" text
 *
 * @param string $more More text.
 * @return string
 */
function streamx24_excerpt_more( $more ) {
    return ' &hellip; ';
}
add_filter( 'excerpt_more', 'streamx24_excerpt_more' );

/**
 * Register sidebar area (widgets)
 */
function streamx24_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'streamx24' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in the main sidebar.', 'streamx24' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 1', 'streamx24' ),
        'id'            => 'footer-1',
        'description'   => __( 'First footer column widgets.', 'streamx24' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 2', 'streamx24' ),
        'id'            => 'footer-2',
        'description'   => __( 'Second footer column widgets.', 'streamx24' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'streamx24_widgets_init' );

/**
 * Sanitize output for security
 *
 * @param string $string Input string.
 * @return string
 */
function streamx24_sanitize( $string ) {
    return wp_kses_post( $string );
}

/**
 * Custom fallback for wp_nav_menu
 *
 * @param array $args Menu arguments.
 * @return string
 */
function streamx24_menu_fallback( $args ) {
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        return '';
    }

    $output = '<ul class="navv">';
    $output .= '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Add a menu', 'streamx24' ) . '</a></li>';
    $output .= '</ul>';

    return $output;
}

