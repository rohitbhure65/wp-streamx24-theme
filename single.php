<?php
/**
 * The Template for displaying all single posts
 *
 * @package StreamX24
 * @since 1.0.0
 */

get_header();
?>

<main class="sx-main sx-blog-post-main">
    <!-- Breadcrumb -->
    <div class="sx-breadcrumb">
        <div class="sx-container">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'streamx24' ); ?></a>
            <span class="sx-breadcrumb-sep">/</span>
            <?php
            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                $first_cat = $categories[0];
                echo '<a href="' . esc_url( get_category_link( $first_cat->term_id ) ) . '">' . esc_html( $first_cat->name ) . '</a>';
                echo '<span class="sx-breadcrumb-sep">/</span>';
            }
            ?>
            <span class="sx-breadcrumb-current"><?php the_title(); ?></span>
        </div>
    </div>

    <article class="sx-blog-post">
        <div class="sx-container">
            <!-- Post Header -->
            <header class="sx-post-header">
                <div class="sx-post-meta-top">
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo '<span class="sx-post-category">';
                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                        echo '</span>';
                    }
                    ?>
                    <span class="sx-post-date">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
                    </span>
                    <span class="sx-post-reading-time">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <?php
                        $content = get_post_field( 'post_content', get_the_ID() );
                        $word_count = str_word_count( strip_tags( $content ) );
                        $reading_time = ceil( $word_count / 200 );
                        echo esc_html( $reading_time . ' ' . _n( 'min read', 'min read', $reading_time, 'streamx24' ) );
                        ?>
                    </span>
                </div>
                
                <h1 class="sx-post-title"><?php the_title(); ?></h1>
                
                <div class="sx-post-author">
                    <?php
                    $author_id = get_the_author_meta( 'ID' );
                    $author_avatar = get_avatar_url( $author_id, array( 'size' => 48 ) );
                    ?>
                    <img src="<?php echo esc_url( $author_avatar ); ?>" alt="<?php echo esc_attr( get_the_author() ); ?>" class="sx-author-avatar">
                    <div class="sx-author-info">
                        <span class="sx-author-name"><?php the_author_posts_link(); ?></span>
                        <span class="sx-author-role"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></span>
                    </div>
                </div>
            </header>

            <!-- Featured Image -->
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="sx-post-featured-image">
                    <?php the_post_thumbnail( 'large', array( 'class' => 'sx-featured-img' ) ); ?>
                </div>
            <?php endif; ?>

            <!-- Post Content Grid -->
            <div class="sx-post-grid">
                <!-- Main Content -->
                <div class="sx-post-content-wrapper">
                    <div class="sx-post-content">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            the_content();
                        endwhile;
                        ?>
                    </div>

                    <!-- Post Tags -->
                    <div class="sx-post-tags">
                        <span class="sx-tags-label"><?php esc_html_e( 'Tags:', 'streamx24' ); ?></span>
                        <div class="sx-tags-list">
                            <?php
                            $tags = get_the_tags();
                            if ( $tags ) {
                                foreach ( $tags as $tag ) {
                                    echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="sx-tag">' . esc_html( $tag->name ) . '</a>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Share Buttons -->
                    <div class="sx-post-share">
                        <span class="sx-share-label"><?php esc_html_e( 'Share this post:', 'streamx24' ); ?></span>
                        <div class="sx-share-buttons">
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo urlencode( get_the_title() ); ?>" target="_blank" rel="noopener noreferrer" class="sx-share-btn sx-share-twitter" aria-label="<?php esc_attr_e( 'Share on Twitter', 'streamx24' ); ?>">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer" class="sx-share-btn sx-share-facebook" aria-label="<?php esc_attr_e( 'Share on Facebook', 'streamx24' ); ?>">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode( get_permalink() ); ?>&title=<?php echo urlencode( get_the_title() ); ?>" target="_blank" rel="noopener noreferrer" class="sx-share-btn sx-share-linkedin" aria-label="<?php esc_attr_e( 'Share on LinkedIn', 'streamx24' ); ?>">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <a href="mailto:?subject=<?php echo urlencode( get_the_title() ); ?>&body=<?php echo urlencode( get_permalink() ); ?>" class="sx-share-btn sx-share-email" aria-label="<?php esc_attr_e( 'Share via Email', 'streamx24' ); ?>">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Author Bio -->
                    <div class="sx-author-box">
                        <div class="sx-author-box-inner">
                            <?php
                            $author_bio = get_the_author_meta( 'description' );
                            $author_avatar_large = get_avatar_url( $author_id, array( 'size' => 120 ) );
                            ?>
                            <img src="<?php echo esc_url( $author_avatar_large ); ?>" alt="<?php echo esc_attr( get_the_author() ); ?>" class="sx-author-box-avatar">
                            <div class="sx-author-box-content">
                                <h3 class="sx-author-box-title"><?php printf( esc_html__( 'About %s', 'streamx24' ), get_the_author() ); ?></h3>
                                <p class="sx-author-box-bio"><?php echo esc_html( $author_bio ? $author_bio : esc_html__( 'This author has not provided a bio yet.', 'streamx24' ) ); ?></p>
                                <a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>" class="sx-author-box-link">
                                    <?php esc_html_e( 'View all posts', 'streamx24' ); ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Related Posts -->
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        $category_ids = array();
                        foreach ( $categories as $category ) {
                            $category_ids[] = $category->term_id;
                        }
                        
                        $related_args = array(
                            'category__in' => $category_ids,
                            'post__not_in' => array( get_the_ID() ),
                            'posts_per_page' => 3,
                            'orderby' => 'rand',
                        );
                        
                        $related_query = new WP_Query( $related_args );
                        
                        if ( $related_query->have_posts() ) :
                            ?>
                            <section class="sx-related-posts">
                                <h2 class="sx-related-posts-title"><?php esc_html_e( 'Related Posts', 'streamx24' ); ?></h2>
                                <div class="sx-related-posts-grid">
                                    <?php
                                    while ( $related_query->have_posts() ) :
                                        $related_query->the_post();
                                        ?>
                                        <article class="sx-related-post">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <a href="<?php the_permalink(); ?>" class="sx-related-post-thumb">
                                                    <?php the_post_thumbnail( 'medium', array( 'class' => 'sx-related-img' ) ); ?>
                                                </a>
                                            <?php endif; ?>
                                            <div class="sx-related-post-content">
                                                <span class="sx-related-post-date"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></span>
                                                <h3 class="sx-related-post-title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h3>
                                                <a href="<?php the_permalink(); ?>" class="sx-related-post-link"><?php esc_html_e( 'Read More', 'streamx24' ); ?></a>
                                            </div>
                                        </article>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </section>
                            <?php
                        endif;
                    }
                    ?>

                    <!-- Comments Section -->
                    <section class="sx-comments-section">
                        <?php
                        // Check if comments are open or we have at least one comment being displayed
                        if ( comments_open() || get_comments_number() ) :
                            ?>
                            <div class="sx-comments-wrapper">
                                <h2 class="sx-comments-title">
                                    <?php
                                    $comments_number = get_comments_number();
                                    if ( $comments_number ) {
                                        printf(
                                            /* translators: %s = number of comments */
                                            _n( '%s Comment', '%s Comments', $comments_number, 'streamx24' ),
                                            number_format_i18n( $comments_number )
                                        );
                                    } else {
                                        esc_html_e( 'No Comments', 'streamx24' );
                                    }
                                    ?>
                                </h2>

                                <?php
                                comment_form(
                                    array(
                                        'title_reply' => '',
                                        'label_submit' => esc_html__( 'Post Comment', 'streamx24' ),
                                        'class_submit' => 'sx-btn sx-btn-primary sx-comment-submit',
                                        'comment_field' => '<textarea id="comment" name="comment" class="sx-comment-textarea" placeholder="' . esc_attr__( 'Write your comment...', 'streamx24' ) . '" rows="5" required></textarea>',
                                        'fields' => array(
                                            'author' => '<input type="text" id="author" name="author" class="sx-comment-input" placeholder="' . esc_attr__( 'Your Name *', 'streamx24' ) . '" required>',
                                            'email' => '<input type="email" id="email" name="email" class="sx-comment-input" placeholder="' . esc_attr__( 'Your Email *', 'streamx24' ) . '" required>',
                                            'url' => '',
                                        ),
                                    )
                                );
                                ?>

                                <?php
                                // Display the comments list
                                if ( have_comments() ) :
                                    ?>
                                    <ol class="sx-comment-list">
                                        <?php
                                        wp_list_comments(
                                            array(
                                                'style' => 'ol',
                                                'callback' => 'streamx24_comment_callback',
                                            )
                                        );
                                        ?>
                                    </ol>

                                    <?php
                                    // Display comment navigation if needed
                                    the_comments_navigation();
                                    ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </section>
                </div>

                <!-- Sidebar -->
                <aside class="sx-sidebar">
                    <!-- Search Widget -->
                    <div class="sx-widget sx-widget-search">
                        <h3 class="sx-widget-title"><?php esc_html_e( 'Search', 'streamx24' ); ?></h3>
                        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="sx-search-form">
                            <label for="sx-search-input" class="screen-reader-text"><?php esc_html_e( 'Search for:', 'streamx24' ); ?></label>
                            <input type="search" id="sx-search-input" name="s" placeholder="<?php esc_attr_e( 'Search posts...', 'streamx24' ); ?>" class="sx-search-input" required>
                            <button type="submit" class="sx-search-btn" aria-label="<?php esc_attr_e( 'Search', 'streamx24' ); ?>">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    <div class="sx-widget sx-widget-categories">
                        <h3 class="sx-widget-title"><?php esc_html_e( 'Categories', 'streamx24' ); ?></h3>
                        <ul class="sx-category-list">
                            <?php
                            $categories = get_categories(
                                array(
                                    'orderby' => 'count',
                                    'order' => 'DESC',
                                    'number' => 10,
                                    'hide_empty' => true,
                                )
                            );
                            
                            foreach ( $categories as $category ) {
                                echo '<li class="sx-category-item">';
                                echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">';
                                echo '<span class="sx-category-name">' . esc_html( $category->name ) . '</span>';
                                echo '<span class="sx-category-count">' . esc_html( $category->count ) . '</span>';
                                echo '</a>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>

                    <!-- Recent Posts Widget -->
                    <div class="sx-widget sx-widget-recent">
                        <h3 class="sx-widget-title"><?php esc_html_e( 'Recent Posts', 'streamx24' ); ?></h3>
                        <ul class="sx-recent-posts-list">
                            <?php
                            $recent_posts = wp_get_recent_posts(
                                array(
                                    'numberposts' => 5,
                                    'post_status' => 'publish',
                                )
                            );
                            
                            foreach ( $recent_posts as $post ) :
                                ?>
                                <li class="sx-recent-post-item">
                                    <?php if ( has_post_thumbnail( $post['ID'] ) ) : ?>
                                        <a href="<?php echo esc_url( get_permalink( $post['ID'] ) ); ?>" class="sx-recent-post-thumb">
                                            <?php echo get_the_post_thumbnail( $post['ID'], 'thumbnail', array( 'class' => 'sx-recent-img' ) ); ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="sx-recent-post-info">
                                        <span class="sx-recent-post-date"><?php echo esc_html( get_the_date( 'F j, Y', $post['ID'] ) ); ?></span>
                                        <h4 class="sx-recent-post-title">
                                            <a href="<?php echo esc_url( get_permalink( $post['ID'] ) ); ?>"><?php echo esc_html( $post['post_title'] ); ?></a>
                                        </h4>
                                    </div>
                                </li>
                                <?php
                            endforeach;
                            wp_reset_postdata();
                            ?>
                        </ul>
                    </div>

                    <!-- Newsletter Widget -->
                    <div class="sx-widget sx-widget-newsletter">
                        <h3 class="sx-widget-title"><?php esc_html_e( 'Newsletter', 'streamx24' ); ?></h3>
                        <p class="sx-newsletter-desc"><?php esc_html_e( 'Stay updated with our latest posts and news.', 'streamx24' ); ?></p>
                        <form class="sx-newsletter-form" action="#" method="post">
                            <?php wp_nonce_field( 'streamx24_newsletter', 'streamx24_newsletter_nonce' ); ?>
                            <input type="email" name="newsletter_email" class="sx-newsletter-input" placeholder="<?php esc_attr_e( 'Enter your email', 'streamx24' ); ?>" required>
                            <button type="submit" class="sx-btn sx-btn-primary sx-newsletter-btn"><?php esc_html_e( 'Subscribe', 'streamx24' ); ?></button>
                        </form>
                    </div>

                    <!-- Tags Widget -->
                    <div class="sx-widget sx-widget-tags">
                        <h3 class="sx-widget-title"><?php esc_html_e( 'Popular Tags', 'streamx24' ); ?></h3>
                        <div class="sx-tags-cloud">
                            <?php
                            $tags = get_tags(
                                array(
                                    'number' => 15,
                                    'orderby' => 'count',
                                    'order' => 'DESC',
                                    'hide_empty' => true,
                                )
                            );
                            
                            foreach ( $tags as $tag ) {
                                echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="sx-tag-cloud">' . esc_html( $tag->name ) . '</a>';
                            }
                            ?>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </article>
</main>

<?php
get_footer();

