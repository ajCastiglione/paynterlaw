<?php
$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$category = $wp_query->get_queried_object();
$per_page = 10;
$offset_start = 1;
$offset = ($current_page - 1) * $per_page + $offset_start;
$args = array(
    'post_type' => 'post',
    'posts_per_page' => $per_page,
    'paged' => $current_page,
    'offset' => $offset,
    'order' => 'DESC',
    'orderby' => 'date',
    'cat' => $category->term_id
);

$query = new WP_Query($args);

$query->found_posts = $query->found_posts - 1;

$query->max_num_pages = ceil($query->found_posts / $per_page);

$title = $category->name ? "Articles in {$category->name}" : get_field('articles_section_title', get_option('page_for_posts'));

wp_enqueue_style('content-blog-style', get_template_directory_uri() . '/components/dist/content-blog/content-blog.css');

?>
<article class="articles">

    <h2 class="articles__title"><?php echo $title ?></h2>

    <div class="articles__posts">
        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                $post = $query->post;
                $feat_img = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/assets/Default_Article_Image.jpg';
                $post_title = get_the_title($post->ID);
                $post_link = get_permalink($post->ID);
                $categories = count(get_the_category($post->ID)) > 3 ? array_slice(get_the_category($post->ID), 0, 3) : get_the_category($post->ID);

                $date = get_the_date('M d, Y', $post->ID);
        ?>

                <section class="articles__post">
                    <a href="<?php echo $post_link ?>" class="post-img-link">
                        <img src="<?php echo $feat_img ?>" class="post-img" alt="<?php echo $post_title ?>">
                    </a>
                    <div class="articles__info">
                        <a href="<?php echo $post_link ?>">
                            <h3 class="post-title"><?php echo $post_title ?></h3>
                            <span class="post-date"><?php echo $date ?></span>
                        </a>
                    </div>
                </section>

            <?php endwhile;
            wp_reset_query();
        else :
            ?>
            <h3>There are no articles in this category.</h3>
        <?php endif; ?>
    </div>

    <?php abt_pagination($query); ?>
</article>