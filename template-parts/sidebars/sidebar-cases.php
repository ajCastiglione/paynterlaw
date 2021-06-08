<?php

$parent = $post->post_parent ?: $post->ID;

$args = array(
    'post_type' => 'cases',
    'posts_per_page' => -1,
    'post_parent' => $parent,
);

$query = new WP_Query($args);

?>

<aside class="sidebar">
    <h2 class="sidebar__title"><?= get_the_title($parent) ?></h2>
    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <a href="<?= get_permalink($query->post->ID) ?>" class="sidebar__subpage-title <?php echo is_single($query->post->ID) ? 'curpage' : ''; ?>">
                <?= get_the_title($query->post->ID) ?>
            </a>
    <?php endwhile;
    endif;
    wp_reset_query(); ?>
</aside>