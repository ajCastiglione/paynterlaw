<?php
wp_enqueue_style('single-post-style', get_template_directory_uri() . '/components/dist/content-post/content-post.css');
?>

<article class="entry-content ">
    <div class="single__content wrapper">
        <?php the_content() ?>
    </div>
</article>