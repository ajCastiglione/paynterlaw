<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package paynterlaw
 */

get_header();
wp_enqueue_style('single-our-team', get_template_directory_uri() . '/components/dist/single-our-team/single-our-team.css');
wp_enqueue_script('single-our-team-js', get_template_directory_uri() . '/components/dist/single-our-team/single-our-team.min.js');

?>


<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/content', get_post_type());

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
