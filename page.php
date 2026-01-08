<?php
/**
 * The Template for displaying all pages
 *
 * @package StreamX24
 * @since 1.0.0
 */

get_header();
?>

<main class="sx-main sx-page-main">
    <div class="sx-container">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'sx-page-content' ); ?>>
                <header class="sx-page-header">
                    <?php the_title( '<h1 class="sx-page-title">', '</h1>' ); ?>
                </header>

                <div class="sx-page-body">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="sx-page-featured-image">
                            <?php the_post_thumbnail( 'large', array( 'class' => 'sx-featured-img' ) ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="sx-page-text">
                        <?php the_content(); ?>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();

