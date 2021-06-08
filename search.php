<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package paynterlaw
 */

get_header();

wp_enqueue_style('search-page-style', get_template_directory_uri() . '/components/dist/search/search.css');
wp_enqueue_script('search-js', get_template_directory_uri() . '/components/dist/search/search.min.js');

global $wp_query;

if (isset($_GET['filter'])) {
    $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => $_GET['filter'],
        'paged' => $current_page,
        'posts_per_page' => 10,
        's' => $_GET['s'],
    );
    $wp_query = new WP_Query($args);
}
?>

<section id="primary" class="search">
    <main id="main" class="site-main">
        <div class="wrapper">

            <header class="search__header">
                <h1 class="search__title"><?php echo get_field('search_page_title', 'options') ?: 'Search'; ?></h1>
                <?php get_template_part('template-parts/search-page', 'form'); ?>
                <?php get_template_part('template-parts/filters', 'search'); ?>
            </header><!-- .page-header -->

            <div class="search__grid">
                <div>
                    <?php if (have_posts()) : ?>
                        <h2 class="search__results-header"><?php echo "{$wp_query->found_posts} search results for \"" . get_search_query(); ?>"</h2>

                        <?php
                        /* Start the Loop */
                        while (have_posts()) :
                            the_post();

                            get_template_part('template-parts/content', 'search');

                        endwhile;

                        abt_pagination($wp_query);

                    else :
                        get_template_part('template-parts/content', 'none-search');
                        ?>
                    <?php endif; ?>
                </div>

                <aside class="search__sidebar">
                    <?php get_template_part('template-parts/sidebars/sidebar', 'search') ?>
                </aside>
            </div>

            <div class="quick-actions">

                <?php if (have_rows('quick_actions_cards', 'options')) : while (have_rows('quick_actions_cards', 'options')) : the_row();
                        $link = get_sub_field('link');
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                ?>
                        <div class="action">
                            <?php if (!empty($link)) : ?> <a href="<?= $link ?>"> <?php endif; ?>
                                <h4 class="action-title"><?= $title ?></h4>
                                <div class="action-text"><?= $text ?></div>
                                <?php if (!empty($link)) : ?>
                                </a> <?php endif; ?>
                        </div>
                <?php endwhile;
                endif;
                wp_reset_query(); ?>
            </div>

        </div>
    </main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
