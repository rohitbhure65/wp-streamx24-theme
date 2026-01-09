```
my-theme/
│
├── style.css
│   ├─ Required file for every theme
│   ├─ Contains theme metadata (Theme Name, Author, Version)
│   └─ Also holds global CSS styles
│
├── index.php
│   ├─ Final fallback template in WP hierarchy
│   ├─ Used when no other template matches
│   └─ Usually loads header, loop, and footer
│
├── functions.php
│   ├─ Loads when theme activates
│   ├─ Registers menus, widgets, thumbnails
│   ├─ Enqueues CSS and JS files
│   ├─ Adds theme supports (title-tag, custom-logo)
│   └─ Can include files from /inc folder
│
├── screenshot.png
│   ├─ Theme preview image in dashboard
│   └─ Recommended size: 1200x900 px
│
├── header.php
│   ├─ Starts HTML document
│   ├─ Contains <head> tag, meta, CSS links
│   ├─ Site logo and navigation menu
│   └─ Must contain wp_head() before </head>
│
├── footer.php
│   ├─ Closes main layout wrappers
│   ├─ Footer widgets, copyright
│   ├─ JS files loaded here by WP
│   └─ Must contain wp_footer() before </body>
│
├── sidebar.php
│   ├─ Sidebar layout
│   ├─ Displays widgets (ads, recent posts)
│   └─ Uses dynamic_sidebar() function
│
├── front-page.php
│   ├─ Used only if "Static Homepage" is set
│   ├─ Best place for landing page design
│   └─ Overrides home.php and page.php
│
├── home.php
│   ├─ Blog listing page
│   ├─ Shows latest posts
│   └─ Used when blog is homepage
│
├── page.php
│   ├─ Template for all normal pages
│   ├─ About, Contact, Privacy Policy
│   └─ Uses WordPress Loop to show content
│
├── single.php
│   ├─ Template for single blog post
│   ├─ Shows title, content, comments
│   └─ Can be split using template-parts
│
├── archive.php
│   ├─ Handles all archive types
│   ├─ Category, tag, author, date
│   └─ Used if category.php / tag.php not found
│
├── category.php
│   ├─ Only for category archive pages
│   └─ Allows different layout for categories
│
├── tag.php
│   ├─ Only for tag archive pages
│   └─ Custom design for tag listings
│
├── author.php
│   ├─ Author profile + posts by author
│   └─ Used for multi-author blogs
│
├── search.php
│   ├─ Shows search results
│   └─ Triggered when user searches site
│
├── 404.php
│   ├─ Error page when URL not found
│   ├─ Should guide user back to site
│   └─ Important for UX and SEO
│
├── comments.php
│   ├─ Comment list layout
│   ├─ Comment form HTML
│   └─ Controlled by WP comment settings
│
├── template-parts/
│   │
│   ├── content.php
│   │   ├─ Default post layout
│   │   └─ Used inside loops
│   │
│   ├── content-page.php
│   │   ├─ Page content layout
│   │   └─ Used by page.php
│   │
│   ├── content-single.php
│   │   ├─ Single post body design
│   │   └─ Used by single.php
│   │
│   └── content-none.php
│       ├─ Shown when no posts found
│       └─ Used in search and archives
│
├── assets/
│   │
│   ├── css/
│   │   ├─ home.css → homepage styling
│   │   ├─ blog.css → blog layouts
│   │   └─ responsive.css → media queries
│   │
│   ├── js/
│   │   ├─ main.js → common scripts
│   │   ├─ slider.js → carousel logic
│   │   └─ form.js → contact forms
│   │
│   └── images/
│       ├─ logo.png
│       ├─ hero-bg.jpg
│       └─ icons/
│           └─ svg icons
│
├── inc/
│   │
│   ├── theme-setup.php
│   │   ├─ add_theme_support()
│   │   ├─ register_nav_menus()
│   │   └─ image sizes
│   │
│   ├── enqueue.php
│   │   ├─ All wp_enqueue_style()
│   │   └─ wp_enqueue_script() calls
│   │
│   ├── widgets.php
│   │   ├─ Sidebar registration
│   │   └─ Footer widgets
│   │
│   ├── custom-post-types.php
│   │   ├─ Services, Products, Portfolio
│   │   └─ register_post_type()
│   │
│   └── custom-taxonomies.php
│       ├─ Service Categories
│       └─ Product Tags
│
├── templates/
│   │
│   ├── template-fullwidth.php
│   │   ├─ No sidebar layout
│   │   └─ Selectable from page editor
│   │
│   └── template-landing.php
│       ├─ Marketing landing page
│       └─ No header/footer optional
│
├── languages/
│   ├── my-theme.pot
│   ├── my-theme-en_US.po
│   └── my-theme-hi_IN.po
│   └─ Used for multilingual translation
│
└── README.md
    ├─ Theme documentation
    ├─ Installation steps
    └─ Developer notes































----------------------------------------------------------------------

<?php
/**
 * Theme Functions File
 * Author: Rohit Bhure
 * Description: Core setup for WordPress theme
 */

/* ---------------------------------------
   1. THEME SETUP
----------------------------------------*/
function mytheme_setup() {

    // Let WP handle <title>
    add_theme_support('title-tag');

    // Featured images
    add_theme_support('post-thumbnails');

    // Custom logo
    add_theme_support('custom-logo', [
        'height' => 80,
        'width'  => 250,
        'flex-width' => true,
    ]);

    // HTML5 support
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ]);

    // Gutenberg features
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');

    // Menus
    register_nav_menus([
        'primary' => 'Primary Menu',
        'footer'  => 'Footer Menu',
    ]);

    // Translation
    load_theme_textdomain('my-theme', get_template_directory() . '/languages');

}
add_action('after_setup_theme', 'mytheme_setup');


/* ---------------------------------------
   2. ENQUEUE CSS & JS
----------------------------------------*/
function mytheme_assets() {

    // Main stylesheet
    wp_enqueue_style(
        'mytheme-style',
        get_stylesheet_uri(),
        [],
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    // Extra CSS
    wp_enqueue_style(
        'mytheme-main-css',
        get_template_directory_uri() . '/assets/css/main.css',
        ['mytheme-style'],
        '1.0'
    );

    // JS
    wp_enqueue_script(
        'mytheme-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        '1.0',
        true
    );

    // Pass PHP data to JS
    wp_localize_script('mytheme-main-js', 'themeData', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'homeUrl' => home_url('/')
    ]);

}
add_action('wp_enqueue_scripts', 'mytheme_assets');


/* ---------------------------------------
   3. SIDEBARS & WIDGETS
----------------------------------------*/
function mytheme_widgets() {

    register_sidebar([
        'name' => 'Main Sidebar',
        'id' => 'main-sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ]);

    register_sidebar([
        'name' => 'Footer Widgets',
        'id' => 'footer-widgets',
    ]);

}
add_action('widgets_init', 'mytheme_widgets');


/* ---------------------------------------
   4. CUSTOM POST TYPES
----------------------------------------*/
function mytheme_custom_post_types() {

    register_post_type('service', [
        'label' => 'Services',
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'services'],
    ]);

}
add_action('init', 'mytheme_custom_post_types');


/* ---------------------------------------
   5. CUSTOM TAXONOMIES
----------------------------------------*/
function mytheme_taxonomies() {

    register_taxonomy('service_category', 'service', [
        'label' => 'Service Categories',
        'hierarchical' => true,
        'rewrite' => ['slug' => 'service-category'],
    ]);

}
add_action('init', 'mytheme_taxonomies');


/* ---------------------------------------
   6. EXCERPT CONTROL
----------------------------------------*/
function mytheme_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'mytheme_excerpt_length');

function mytheme_excerpt_more() {
    return '...';
}
add_filter('excerpt_more', 'mytheme_excerpt_more');


/* ---------------------------------------
   7. SECURITY ESCAPING HELPERS
----------------------------------------*/
function mytheme_safe_text($text) {
    return esc_html($text);
}

function mytheme_safe_url($url) {
    return esc_url($url);
}


/* ---------------------------------------
   8. BODY CLASS FILTER
----------------------------------------*/
function mytheme_body_classes($classes) {

    if (is_front_page()) {
        $classes[] = 'is-home';
    }

    if (is_user_logged_in()) {
        $classes[] = 'user-logged-in';
    }

    return $classes;
}
add_filter('body_class', 'mytheme_body_classes');


/* ---------------------------------------
   9. REMOVE UNWANTED WP STUFF (PERFORMANCE)
----------------------------------------*/
remove_action('wp_head', 'wp_generator'); // hide WP version


/* ---------------------------------------
   10. CUSTOM IMAGE SIZES
----------------------------------------*/
function mytheme_images() {
    add_image_size('service-thumb', 400, 300, true);
}
add_action('after_setup_theme', 'mytheme_images');


/* ---------------------------------------
   11. COMMENTS STYLING CALLBACK
----------------------------------------*/
function mytheme_comment_layout($comment, $args, $depth) {
?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-body">
            <h4><?php comment_author(); ?></h4>
            <?php comment_text(); ?>
        </div>
<?php
}


/* ---------------------------------------
   12. LOGIN & LOGOUT URL HELPERS
----------------------------------------*/
function mytheme_login_url() {
    return wp_login_url();
}

function mytheme_logout_url() {
    return wp_logout_url(home_url());
}


/* ---------------------------------------
   13. SHORTCODE EXAMPLE
----------------------------------------*/
function mytheme_year_shortcode() {
    return date('Y');
}
add_shortcode('year', 'mytheme_year_shortcode');


/* ---------------------------------------
   14. AJAX SAMPLE (FRONTEND)
----------------------------------------*/
function mytheme_ajax_demo() {
    echo 'AJAX Working!';
    wp_die();
}
add_action('wp_ajax_mytheme_test', 'mytheme_ajax_demo');
add_action('wp_ajax_nopriv_mytheme_test', 'mytheme_ajax_demo');
```
