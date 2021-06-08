<?php

/**
 * Template Name: Team Member Page Template
 * Style: our-team
 */

get_header();

?>

<?= get_template_part('template-parts/hero/default', 'hero') ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/content', 'team');

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
