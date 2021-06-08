<?php

/**
 * The blog template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paynterlaw
 */

get_header();

wp_enqueue_style('articles-style', get_template_directory_uri() . '/components/dist/blog/blog.css');

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php get_template_part('template-parts/hero/blog', 'hero'); ?>

        <div class="blog__grid">
            <?php get_template_part('template-parts/sidebars/sidebar', 'blog'); ?>

            <?php get_template_part('template-parts/content', 'blog'); ?>
        </div>

        <div class="blog__quick-actions">
            <div class="wrapper">
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
                endif; ?>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
