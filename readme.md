```
# WordPress Theme Development Plan: streamx23blog

## Overview
Create a modern, professional WordPress blog theme with a focus on user experience, performance, and SEO optimization.

## Theme Requirements Analysis

### Design Requirements
- [ ] Clean, professional, and modern design
- [ ] Custom front-page.php template (not default blog layout)
- [ ] Custom blog template with full functionality
- [ ] Blue, Black, and White color scheme only
- [ ] Dark Mode and Light Mode toggle
- [ ] Fully responsive (mobile, tablet, desktop)
- [ ] Customizable homepage using WordPress Customizer

### Functionality Requirements
- [ ] Featured image support
- [ ] Categories and tags support
- [ ] Search functionality
- [ ] Pagination
- [ ] Clean single post layout
- [ ] SEO-friendly code structure
- [ ] Fast-loading (optimized assets)

### WordPress Theme Structure
- [ ] style.css (Theme declaration and styles)
- [ ] functions.php (Enqueue scripts, register features)
- [ ] header.php (Header section)
- [ ] footer.php (Footer section)
- [ ] front-page.php (Custom homepage template)
- [ ] index.php (Main template fallback)
- [ ] single.php (Single post template)
- [ ] archive.php (Blog listing template)
- [ ] sidebar.php (Sidebar section)
- [ ] searchform.php (Custom search form)
- [ ] template-parts/ (Modular template parts)
  - [ ] content-none.php
  - [ ] content-search.php
  - [ ] content.php (Standard post format)
  - [ ] featured-post.php
  - [ ] post-card.php

## File Structure Plan

### Step 1: Core Theme Files
1. **style.css** - Theme declaration, basic styling, responsive design
2. **functions.php** - Enqueue scripts/styles, register features, customizer setup
3. **index.php** - Main template fallback

### Step 2: Header and Footer
1. **header.php** - HTML head, navigation, mobile menu, theme toggle
2. **footer.php** - Footer content, copyright, scripts

### Step 3: Custom Templates
1. **front-page.php** - Custom homepage with featured section, latest posts, categories
2. **single.php** - Single post with sidebar, author bio, related posts
3. **archive.php** - Category/tag/date archive listing

### Step 4: Template Parts
1. **template-parts/post-card.php** - Reusable post card component
2. **template-parts/featured-post.php** - Featured post display
3. **template-parts/content.php** - Standard post content
4. **template-parts/content-none.php** - No results found
5. **template-parts/content-search.php** - Search results content

### Step 5: Supporting Files
1. **searchform.php** - Custom search form with styling
2. **sidebar.php** - Sidebar with widgets
3. **screenshot.png** - Theme preview image (1200x900)

## Color Scheme Design

### Light Mode (Default)
- Primary Blue: #2563EB (Royal Blue)
- Secondary Black: #1F2937 (Dark Gray/Black)
- White: #FFFFFF (Pure White)
- Light Gray: #F3F4F6 (Background)
- Text Primary: #1F2937
- Text Secondary: #6B7280

### Dark Mode
- Primary Blue: #3B82F6 (Lighter Blue for contrast)
- Secondary Black: #111827 (Very Dark Gray)
- White: #F9FAFB (Off-white for reduced eye strain)
- Dark Gray: #1F2937 (Card backgrounds)
- Text Primary: #F9FAFB
- Text Secondary: #9CA3AF

## Implementation Phases

### Phase 1: Foundation
1. Create style.css with theme declaration
2. Create functions.php with basic setup
3. Create header.php with navigation and theme toggle
4. Create footer.php with basic structure

### Phase 2: Templates
1. Implement front-page.php with:
   - Hero section with welcome message
   - Featured posts grid
   - Latest posts section
   - Category display
2. Implement index.php as fallback template
3. Implement single.php with full post layout
4. Implement archive.php for listings

### Phase 3: Template Parts
1. Create reusable post card component
2. Create featured post component
3. Create content display components

### Phase 4: Features
1. Implement dark/light mode toggle with localStorage
2. Add pagination functionality
3. Add search form styling
4. Add responsive navigation menu

### Phase 5: Customizer Integration
1. Add homepage customization options
2. Add color scheme settings
3. Add layout options
4. Add typography settings

### Phase 6: SEO and Performance
1. Add proper semantic HTML structure
2. Add schema markup
3. Optimize CSS for performance
4. Add lazy loading for images

## Installation Instructions

1. Upload theme folder to `/wp-content/themes/`
2. Navigate to Appearance > Themes in WordPress admin
3. Activate "StreamX23 Blog" theme
4. Go to Appearance > Customize to configure settings
5. Create a front page: Settings > Reading > "A static page" > select "Home"

## Success Criteria
- [ ] Theme activates without errors
- [ ] Homepage displays custom template
- [ ] Dark/Light mode toggles correctly
- [ ] All blog features work properly
- [ ] Design is fully responsive
- [ ] Color scheme matches requirements
- [ ] SEO-friendly markup
- [ ] Fast loading performance

## Timeline
Estimated completion time: 6-8 hours for full implementation


--------------------------------------------------------------

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
