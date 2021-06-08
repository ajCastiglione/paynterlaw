<?php

/**
 * Template part for displaying page content in page-home.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paynterlaw
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('wrapper'); ?>>

    <?php paynterlaw_post_thumbnail(); ?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->