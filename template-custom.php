<?php
/**
 * Template Name: Custom Template
 *
 * @package StreamX24
 * @since 1.0.0
 */

get_header();
?>

<section class="sx-hero">
    <div class="sx-container sx-hero-grid">
        <div class="sx-hero-content">
            <p class="sx-pill"><?php esc_html_e( 'Digital Product Marketplace', 'streamx24' ); ?></p>
            <h1>
                <?php
                printf(
                    /* translators: %s: highlighted text */
                    esc_html__( 'Premium %1$s &amp; Source Code', 'streamx24' ),
                    '<span>' . esc_html__( 'Plugins, Themes, Scripts', 'streamx24' ) . '</span>'
                );
                ?>
            </h1>
            <p class="sx-hero-subtitle">
                <?php esc_html_e( 'StreamX24 is your one-stop marketplace for high-quality digital products. Ship faster with production-ready plugins, themes, source code, and automation scripts.', 'streamx24' ); ?>
            </p>
            <div class="sx-hero-actions">
                <a href="#products" class="sx-btn sx-btn-primary">
                    <?php esc_html_e( 'Browse Products', 'streamx24' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="sx-btn sx-btn-ghost">
                    <?php esc_html_e( 'Request a Custom Build', 'streamx24' ); ?>
                </a>
            </div>
            <div class="sx-trust-strip">
                <span><?php esc_html_e( 'Fast Delivery', 'streamx24' ); ?></span>
                <span><?php esc_html_e( 'Secure Payments via WhatsApp', 'streamx24' ); ?></span>
                <span><?php esc_html_e( '24/7 Support', 'streamx24' ); ?></span>
            </div>
        </div>
        <div class="sx-hero-preview">
            <div class="sx-card-glass">
                <div class="sx-card-row">
                    <span class="sx-chip sx-chip-blue"><?php esc_html_e( 'Trending', 'streamx24' ); ?></span>
                    <span class="sx-chip"><?php esc_html_e( 'Top Rated', 'streamx24' ); ?></span>
                </div>
                <div class="sx-metrics">
                    <div>
                        <p class="sx-metric-label"><?php esc_html_e( 'Downloads', 'streamx24' ); ?></p>
                        <p class="sx-metric-value"><?php esc_html_e( '12k+', 'streamx24' ); ?></p>
                    </div>
                    <div>
                        <p class="sx-metric-label"><?php esc_html_e( 'Products', 'streamx24' ); ?></p>
                        <p class="sx-metric-value"><?php esc_html_e( '240+', 'streamx24' ); ?></p>
                    </div>
                    <div>
                        <p class="sx-metric-label"><?php esc_html_e( 'Countries', 'streamx24' ); ?></p>
                        <p class="sx-metric-value"><?php esc_html_e( '35+', 'streamx24' ); ?></p>
                    </div>
                </div>
                <div class="sx-card-product-preview">
                    <h3>
                        <a href="<?php echo esc_url( home_url( '/products/full-stack-starter-kit/' ) ); ?>">
                            <?php esc_html_e( 'Full-Stack eCommerce Starter Kit', 'streamx24' ); ?>
                        </a>
                    </h3>
                    <p>
                        <?php esc_html_e( 'Full-Stack Application – deploy a complete store in hours, not weeks.', 'streamx24' ); ?>
                    </p>
                    <p class="sx-price-tag"><?php esc_html_e( '₹11,999', 'streamx24' ); ?></p>
                    <div class="sx-card-actions">
                        <a href="<?php echo esc_url( home_url( '/products/full-stack-starter-kit/' ) ); ?>" class="sx-btn sx-btn-ghost" aria-label="<?php esc_attr_e( 'View details for Full-Stack eCommerce Starter Kit', 'streamx24' ); ?>">
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <path d="M12 5C7 5 3.3 8.1 2 12c1.3 3.9 5 7 10 7s8.7-3.1 10-7c-1.3-3.9-5-7-10-7zm0 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"></path>
                                <circle cx="12" cy="12" r="2.3"></circle>
                            </svg>
                        </a>
                        <button class="sx-btn sx-btn-primary sx-buy-btn"
                                data-product="<?php esc_attr_e( 'Full-Stack eCommerce Starter Kit', 'streamx24' ); ?>"
                                aria-label="<?php esc_attr_e( 'Buy Full-Stack eCommerce Starter Kit now on WhatsApp', 'streamx24' ); ?>">
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <path d="M7 4h-.8a1 1 0 0 0 0 2H8l1.1 8.2A2.5 2.5 0 0 0 11.6 16h6.2a1 1 0 0 0 0-2h-6.2l-.2-1.5h7.2a1.5 1.5 0 0 0 1.4-1.1l1-4A1 1 0 0 0 20 6H9.2L9 4.8A1.5 1.5 0 0 0 7.5 4H7z"></path>
                                <circle cx="10" cy="19" r="1.4"></circle>
                                <circle cx="17" cy="19" r="1.4"></circle>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sx-section" id="products">
    <div class="sx-container">
        <div class="sx-section-header">
            <h2><?php esc_html_e( 'Featured Digital Products', 'streamx24' ); ?></h2>
            <p>
                <?php esc_html_e( 'Curated, battle-tested tools for developers, designers, and creators. Instantly delivered, lifetime usage.', 'streamx24' ); ?>
            </p>
            <div class="sx-offer-banner">
                <span class="sx-offer-banner-label"><?php esc_html_e( 'Limited-time offer', 'streamx24' ); ?></span>
                <span class="sx-offer-banner-text"><?php esc_html_e( 'Special launch pricing ends in', 'streamx24' ); ?></span>
                <span class="sx-offer-timer sx-offer-banner-timer" data-duration-hours="9">--h --m --s</span>
            </div>
        </div>

        <div class="sx-product-grid" id="product-grid">
            <!-- Product 1 -->
            <article class="sx-product-card">
                <div class="sx-product-tag"><?php esc_html_e( 'Full-Stack', 'streamx24' ); ?></div>
                <h3 class="sx-product-name">
                    <a href="<?php echo esc_url( home_url( '/products/full-stack-starter-kit/' ) ); ?>">
                        <?php esc_html_e( 'Full-Stack eCommerce Starter Kit', 'streamx24' ); ?>
                    </a>
                </h3>
                <p class="sx-product-desc">
                    <?php esc_html_e( 'Full-Stack Application – deploy a complete store in hours, not weeks.', 'streamx24' ); ?>
                </p>
                <div class="sx-product-meta">
                    <div>
                        <div class="sx-price-row">
                            <span class="sx-price-old"><?php esc_html_e( '₹14,999', 'streamx24' ); ?></span>
                            <span class="sx-price sx-price-new"><?php esc_html_e( '₹11,999', 'streamx24' ); ?></span>
                            <span class="sx-price-badge"><?php esc_html_e( '25% OFF', 'streamx24' ); ?></span>
                        </div>
                    </div>
                    <div style="display: flex; gap: 0.5rem;">
                        <a href="<?php echo esc_url( home_url( '/products/full-stack-starter-kit/' ) ); ?>" class="sx-btn sx-btn-ghost" aria-label="<?php esc_attr_e( 'View details for Full-Stack eCommerce Starter Kit', 'streamx24' ); ?>">
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <path d="M12 5C7 5 3.3 8.1 2 12c1.3 3.9 5 7 10 7s8.7-3.1 10-7c-1.3-3.9-5-7-10-7zm0 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"></path>
                                <circle cx="12" cy="12" r="2.3"></circle>
                            </svg>
                        </a>
                        <button class="sx-btn sx-btn-primary sx-buy-btn"
                                data-product="<?php esc_attr_e( 'Full-Stack eCommerce Starter Kit', 'streamx24' ); ?>"
                                aria-label="<?php esc_attr_e( 'Buy Full-Stack eCommerce Starter Kit now', 'streamx24' ); ?>">
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <path d="M7 4h-.8a1 1 0 0 0 0 2H8l1.1 8.2A2.5 2.5 0 0 0 11.6 16h6.2a1 1 0 0 0 0-2h-6.2l-.2-1.5h7.2a1.5 1.5 0 0 0 1.4-1.1l1-4A1 1 0 0 0 20 6H9.2L9 4.8A1.5 1.5 0 0 0 7.5 4H7z"></path>
                                <circle cx="10" cy="19" r="1.4"></circle>
                                <circle cx="17" cy="19" r="1.4"></circle>
                            </svg>
                        </button>
                    </div>
                </div>
            </article>

            <!-- Product 2 -->
            <article class="sx-product-card">
                <div class="sx-product-tag"><?php esc_html_e( 'Plugin', 'streamx24' ); ?></div>
                <h3 class="sx-product-name">
                    <a href="<?php echo esc_url( home_url( '/products/adsense-eligibility-checker/' ) ); ?>">
                        <?php esc_html_e( 'Adsense Eligibility Checker – WordPress Plugin', 'streamx24' ); ?>
                    </a>
                </h3>
                <p class="sx-product-desc">
                    <?php esc_html_e( 'A lightweight WordPress plugin that checks whether your website meets basic Google AdSense eligibility requirements. It analyzes essential on-page SEO factors, content structure, and common approval criteria to help reduce AdSense rejection chances.', 'streamx24' ); ?>
                </p>
                <div class="sx-product-meta">
                    <div>
                        <div class="sx-price-row">
                            <span class="sx-price-old"><?php esc_html_e( '₹199', 'streamx24' ); ?></span>
                            <span class="sx-price sx-price-new"><?php esc_html_e( '₹50', 'streamx24' ); ?></span>
                            <span class="sx-price-badge"><?php esc_html_e( '75% OFF', 'streamx24' ); ?></span>
                        </div>
                    </div>
                    <div style="display: flex; gap: 0.5rem;">
                        <a href="<?php echo esc_url( home_url( '/products/adsense-eligibility-checker/' ) ); ?>" class="sx-btn sx-btn-ghost" aria-label="<?php esc_attr_e( 'View details for Adsense Eligibility Checker – WordPress Plugin', 'streamx24' ); ?>">
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <path d="M12 5C7 5 3.3 8.1 2 12c1.3 3.9 5 7 10 7s8.7-3.1 10-7c-1.3-3.9-5-7-10-7zm0 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"></path>
                                <circle cx="12" cy="12" r="2.3"></circle>
                            </svg>
                        </a>
                        <button class="sx-btn sx-btn-primary sx-buy-btn"
                                data-product="<?php esc_attr_e( 'Adsense Eligibility Checker – WordPress Plugin', 'streamx24' ); ?>"
                                aria-label="<?php esc_attr_e( 'Buy Adsense Eligibility Checker – WordPress Plugin now', 'streamx24' ); ?>">
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <path d="M7 4h-.8a1 1 0 0 0 0 2H8l1.1 8.2A2.5 2.5 0 0 0 11.6 16h6.2a1 1 0 0 0 0-2h-6.2l-.2-1.5h7.2a1.5 1.5 0 0 0 1.4-1.1l1-4A1 1 0 0 0 20 6H9.2L9 4.8A1.5 1.5 0 0 0 7.5 4H7z"></path>
                                <circle cx="10" cy="19" r="1.4"></circle>
                                <circle cx="17" cy="19" r="1.4"></circle>
                            </svg>
                        </button>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="sx-section sx-section-alt">
    <div class="sx-container sx-grid-2">
        <div>
            <h2><?php esc_html_e( 'Why Creators Trust StreamX24', 'streamx24' ); ?></h2>
            <p>
                <?php esc_html_e( 'Every product listed on StreamX24 is hand-reviewed for quality, performance, and documentation. We focus on real-world use cases so you can integrate faster and ship with confidence.', 'streamx24' ); ?>
            </p>
            <ul class="sx-list">
                <li><?php esc_html_e( 'Clean, developer-friendly source code', 'streamx24' ); ?></li>
                <li><?php esc_html_e( 'One-time purchase with lifetime usage', 'streamx24' ); ?></li>
                <li><?php esc_html_e( 'Dedicated WhatsApp support for buyers', 'streamx24' ); ?></li>
            </ul>
        </div>
        <div class="sx-highlight-card">
            <h3><?php esc_html_e( 'Need something custom?', 'streamx24' ); ?></h3>
            <p>
                <?php esc_html_e( 'We also build fully custom plugins, SaaS dashboards, scripts, and automations tailored to your workflow.', 'streamx24' ); ?>
            </p>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="sx-btn sx-btn-primary sx-btn-block">
                <?php esc_html_e( 'Talk to Us on WhatsApp', 'streamx24' ); ?>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();

