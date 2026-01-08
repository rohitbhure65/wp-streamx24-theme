<?php
/**
 * The main template file
 *
 * @package StreamX24
 * @since 1.0.0
 */

get_header();
?>

<main class="sx-main">
    <div class="sx-container">
        <?php if ( have_posts() ) : ?>
            <?php if ( is_home() && ! is_front_page() ) : ?>
                <header class="sx-page-header">
                    <h1 class="sx-page-title"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; ?>

            <div class="sx-blog-grid">
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
                                <span class="sx-blog-date"><?php echo esc_html( get_the_date() ); ?></span>
                                <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) :
                                    ?>
                                    <span class="sx-blog-category">
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

                            <a href="<?php the_permalink(); ?>" class="sx-blog-read-more">
                                <?php esc_html_e( 'Read More', 'streamx24' ); ?>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
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
                <h2><?php esc_html_e( 'Nothing Found', 'streamx24' ); ?></h2>
                <p><?php esc_html_e( 'It looks like nothing was found at this location.', 'streamx24' ); ?></p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();

