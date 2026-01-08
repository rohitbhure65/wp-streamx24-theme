<?php
/**
 * Template Name: Blog Template
 *
 * Displays a blog listing page with posts.
 *
 * @package StreamX24
 * @since 1.0.0
 */

get_header();
?>

<main class="sx-main">
    <div class="sx-container">
        <header class="sx-page-header sx-page-hero">
            <?php if ( is_archive() ) : ?>
                <h1 class="sx-page-title">
                    <?php the_archive_title(); ?>
                </h1>
                <?php if ( get_the_archive_description() ) : ?>
                    <p class="sx-page-hero-desc">
                        <?php echo wp_kses_post( get_the_archive_description() ); ?>
                    </p>
                <?php endif; ?>
            <?php elseif ( is_search() ) : ?>
                <h1 class="sx-page-title">
                    <?php
                    printf(
                        /* translators: %s = search query */
                        esc_html__( 'Search Results for: %s', 'streamx24' ),
                        '<span>' . esc_html( get_search_query() ) . '</span>'
                    );
                    ?>
                </h1>
            <?php else : ?>
                <h1 class="sx-page-title"><?php esc_html_e( 'Our Blog', 'streamx24' ); ?></h1>
                <p class="sx-page-hero-desc">
                    <?php esc_html_e( 'Latest news, updates, and insights from StreamX24.', 'streamx24' ); ?>
                </p>
            <?php endif; ?>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="sx-blog-grid sx-blog-page-grid">
                <?php
                // Start the Loop
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'sx-blog-card' ); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" class="sx-blog-card-thumb">
                                <?php the_post_thumbnail( 'medium_large', array( 'class' => 'sx-blog-img' ) ); ?>
                            </a>
                        <?php endif; ?>

                        <div class="sx-blog-card-content">
                            <div class="sx-blog-meta">
                                <span class="sx-blog-date">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    <?php echo esc_html( get_the_date() ); ?>
                                </span>
                                <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) :
                                    ?>
                                    <span class="sx-blog-category">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                                        </svg>
                                        <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
                                            <?php echo esc_html( $categories[0]->name ); ?>
                                        </a>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <h2 class="sx-blog-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <div class="sx-blog-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <div class="sx-blog-footer">
                                <a href="<?php the_permalink(); ?>" class="sx-blog-read-more">
                                    <?php esc_html_e( 'Read More', 'streamx24' ); ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                                <span class="sx-blog-reading-time">
                                    <?php
                                    $content = get_post_field( 'post_content', get_the_ID() );
                                    $word_count = str_word_count( strip_tags( $content ) );
                                    $reading_time = ceil( $word_count / 200 );
                                    echo esc_html( $reading_time . ' ' . _n( 'min read', 'min read', $reading_time, 'streamx24' ) );
                                    ?>
                                </span>
                            </div>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <?php
            // Pagination
            the_posts_pagination( array(
                'prev_text' => '<span class="sx-pagination-prev">' . esc_html__( 'Previous', 'streamx24' ) . '</span>',
                'next_text' => '<span class="sx-pagination-next">' . esc_html__( 'Next', 'streamx24' ) . '</span>',
                'before_page_number' => '<span class="sx-pagination-number">',
                'after_page_number' => '</span>',
            ) );
            ?>

        <?php else : ?>
            <div class="sx-no-posts">
                <div class="sx-no-posts-icon">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                </div>
                <h2><?php esc_html_e( 'Nothing Found', 'streamx24' ); ?></h2>
                <p>
                    <?php
                    if ( is_search() ) {
                        esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'streamx24' );
                    } else {
                        esc_html_e( 'It looks like nothing was found at this location. Perhaps try searching?', 'streamx24' );
                    }
                    ?>
                </p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();

