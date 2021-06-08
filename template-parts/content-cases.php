<?php

wp_enqueue_style('single-cases-styles', get_template_directory_uri() . '/components/dist/single-cases/single-cases.css');

get_template_part('template-parts/hero/default', 'hero');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('wrapper'); ?>>

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

</article>