<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paynterlaw
 */

if (!empty(get_field('search_result_excerpt'))) {
    $excerpt =  get_field('search_result_excerpt');
} elseif (!empty(get_field('nav_preview_short_description'))) {
    $excerpt = get_field('nav_preview_short_description');
} elseif (!empty(get_field('short_description'))) {
    $excerpt = get_field('short_description');
} else {
    $excerpt = null;
}

switch (get_post_type()) {
    case get_post_type() == 'post':
        $meta = 'Article';
        break;
    case get_post_type() == 'cases':
        $meta = 'Service';
        break;
    case get_post_type() == 'our-team':
        $meta = 'Team';
        break;
    default:
        $meta = get_post_type();
        break;
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search__result'); ?>>

    <header class="search__result-header">
        <h3 class="search__result-meta-title"><?php echo $meta ?></h3>
        <?php the_title(sprintf('<h2 class="search__result-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
    </header><!-- .entry-header -->

    <div class="search__result-summary">
        <?php echo $excerpt ?: ''; ?>
    </div><!-- .search__result-summary -->

</article>