<?php

$cats = get_categories(['hide_empty' => false]);
$title = get_field('articles_section_title', get_option('page_for_posts'));

wp_enqueue_style('articles-sidebar-styles', get_template_directory_uri() . '/components/dist/sidebar-blog/sidebar-blog.css');

?>

<aside class="sidebar">
    <h2 class="sidebar__title"><a href="<?php echo get_permalink(get_option('page_for_posts')) ?>"><?php echo $title ?></a></h2>
    <div class="sidebar__categories">

        <?php foreach ($cats as $cat) : ?>
            <h3 class="cat-name">
                <a href="<?php echo get_category_link($cat->cat_ID); ?>"><?php echo $cat->name ?></a>
            </h3>
        <?php endforeach; ?>

    </div>
</aside>