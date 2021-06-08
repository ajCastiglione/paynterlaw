<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package paynterlaw
 */

wp_enqueue_style('404-style', get_template_directory_uri() . '/components/dist/404/404.css');


get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <section class="error-404 not-found">
            <div class="wrapper">

                <header class="page-header">
                    <h2 class="err-title">404</h2>
                    <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'paynterlaw'); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php esc_html_e('It looks like nothing was found at this location. Please try searching for another topic.', 'paynterlaw'); ?></p>

                    
                    <?php get_template_part('template-parts/search', 'page-form') ?>

                </div><!-- .page-content -->

            </div>
        </section><!-- .error-404 -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
